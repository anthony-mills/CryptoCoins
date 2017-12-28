<?php
namespace marketCap;

use \Exception as Exception;

class marketData {
	
	protected $_apiUrl = 'https://api.coinmarketcap.com/v1';

	/**
	* Request the latest crypto ticker data  	
	*
	* @return array $apiResp 	
	*/
	public function getTicker() 
	{
		$requestUrl = '/ticker';

		$apiResp = $this->_apiRequest( $requestUrl );

		return $apiResp;
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

		curl_setopt_array($curlHandle, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $this->_apiBase . $requestUrl,
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
	public function parseJson( $jsonStr )
	{
		$jsonObj = json_decode( $jsonStr );

		if (json_last_error()) {
			throw new Exception('Invalid JSON response');
		}

		return $jsonObj;
	}	
}