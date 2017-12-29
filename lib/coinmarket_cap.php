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
		R::setup( 
			'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS 
		);
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
	* Process the data recieved from the API
	* 
	* @param array $tickerData
	**/
	protected function _processData( $tickerData ) 
	{
		if (is_array( $tickerData )) {
			foreach ( $tickerData as $tickerElement ) {
				$this->_checkUnit( $tickerElement );
			}
		}
	}

	/**
	* Check for a coin in the database if it doesn't exist 
	* add it to the coins table
	*
	* @param object $tickerElement
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