<?php
namespace marketCap;

use \RedBeanPHP\R;

use \Exception as Exception;

class marketData {
	
	protected $_apiUrl = 'https://api.coinmarketcap.com/v1';

	/**
	* Open a mysql connection on instantiation
	*/
	public function __construct()
	{
		if(!R::testConnection())
		{
			R::setup( 
				'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS 
			);
		}
	}

	/**
	* Close the mysql connection on tear down
	*/
	public function __destruct()
	{
		R::close();
	}

	/**
	* Request the latest crypto ticker data  	
	*
	* @return array $apiResp 	
	*/
	public function getTicker() 
	{
		$requestUrl = '/ticker';

		$apiResp = $this->_apiRequest( $requestUrl );

		$tickerData = $this->_parseJSON( $apiResp );

		$this->_processData( $tickerData );
	
		return $apiResp;
	} 

	/** 
	* Get the latest market data for the top ten crypto coins
	*
	*/
	public function getTopTen() {

		$coinPrice = R::getAll(  
			'SELECT coins.*,pricedata.* FROM coins
		    INNER JOIN pricedata ON coins.id = pricedata.coin_id
		    WHERE pricedata.market_rank < 11 
		    ORDER BY pricedata.timestamp DESC LIMIT 10'
		);

		if ($coinPrice) {
			return $coinPrice;
		}
	}

	/**
	* Process the data recieved from the API
	* 
	* @param array $tickerData
	**/
	protected function _processData( $tickerData ) 
	{
		if (is_array( $tickerData )) {
			foreach ( $tickerData as $tickerElement ) {
				$coinId = $this->_checkUnit( $tickerElement );
				$this->_storePrice( $coinId, $tickerElement );
			}
		}
	}

	/**
	* Store the price and volume data for a coin
	*
	* @param integer $coinId
	* @param object $marketData
	*/
	protected function _storePrice( $coinId, $marketData )
	{
		if (is_numeric($coinId) && is_object($marketData)) {
			$marketObj = R::dispense("pricedata");
			$marketObj->coin_id = $coinId;		
			$marketObj->market_rank = $marketData->rank;
			$marketObj->price_usd = $marketData->price_usd;
			$marketObj->price_btc = $marketData->price_btc;
			$marketObj->daily_volume = $marketData->{'24h_volume_usd'};
			$marketObj->usd_marketcap = $marketData->market_cap_usd;
			$marketObj->current_supply = $marketData->available_supply;
			$marketObj->total_supply = $marketData->total_supply;
			$marketObj->max_supply = $marketData->max_supply;
			$marketObj->percent_change_1h = $marketData->percent_change_1h;
			$marketObj->percent_change_24h = $marketData->percent_change_24h;
			$marketObj->percent_change_7d = $marketData->percent_change_7d;

			$marketObj->timestamp = time();

			R::store( $marketObj );

			return $marketObj->export();
		}			
	}

	/**
	* Check for a coin in the database if it doesn't exist 
	* add it to the coins table
	*
	* @param object $tickerElement
	* @return integer 
	*/ 
	protected function _checkUnit( $tickerElement ) 
	{
		$cryptoCoin = R::findOne('coins',
				       ' coinmarket_id = :targetUnit', 
				            array( 
				                ':targetUnit' => $tickerElement->id,
				            )
		               );

		if (empty($cryptoCoin)) {
			$coinObj = R::dispense("coins");
			$coinObj->name = $tickerElement->name;
			$coinObj->coinmarket_id = $tickerElement->id;
			$coinObj->symbol = $tickerElement->symbol;
			$coinObj->added = time();

			R::store( $coinObj );

			return $coinObj->export();						
		}

		return $cryptoCoin->id;
	}

	/**
	* Make a request to the coinmarketcap API 
	* API documentation can be found at https://coinmarketcap.com/api/
	* 
	* @param string $requestUrl
	*
	* @return object $apiResp
	*/
	protected function _apiRequest( $requestUrl ) 
	{
		$curlHandle = curl_init();
		$requestUrl = $this->_apiUrl . $requestUrl;

		//die($requestUrl);

		curl_setopt_array($curlHandle, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_FOLLOWLOCATION => 1,
		    CURLOPT_URL => $requestUrl,
		));

		$apiResp = curl_exec($curlHandle);
		curl_close($curlHandle);

		return $apiResp;
	}

	/**
	* Convert a JSON response into an object
	*
	* @param string $jsonStr
	*
	* @return object $jsonResp
	*/
	protected function _parseJson( $jsonStr )
	{
		$jsonObj = json_decode( $jsonStr );

		if (json_last_error()) {
			throw new Exception('Invalid JSON response');
		}

		return $jsonObj;
	}	
}