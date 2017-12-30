<?php 
/**
* Application route deifinitions for Klien Framework
*/
$klein->respond('GET', '/update', function () 
{
	$cryptoApp = new \marketCap\marketData();
	$cryptoApp->getTicker();		

	$apiResp = array(
						'data' => 'Market data successfully updated.', 
						'error' => null
					);
    return json_encode($apiResp);
});

/**
* Route to get the latest market data on the top 10 currencies
*/
$klein->respond('GET', '/top-ten', function () 
{
	$cryptoApp = new \marketCap\marketData();
	$marketData = $cryptoApp->getTopTen();		

	$apiResp = array(
						'data' => $marketData, 
						'error' => null
					);
    return json_encode($apiResp);
});

/**
* Route to get the bigggest winners of a given time frame
*/
$klein->respond('/daily-winners/', function ($request) {
	$cryptoApp = new \marketCap\marketData();
	return $cryptoApp->getBiggestMovers(1);	
});

$klein->respond('/daily-winners/[:period]', function ($request) {
	$cryptoApp = new \marketCap\marketData();
	return $cryptoApp->getBiggestMovers(1, $request->period);	
});

/**
* Route to get the bigggest losers of the last 24 hours
*/
$klein->respond('/daily-losers/', function ($request) {
	$cryptoApp = new \marketCap\marketData();
	return $cryptoApp->getBiggestMovers(0);	
});

$klein->respond('/daily-losers/[:period]', function ($request) {
	$cryptoApp = new \marketCap\marketData();
	return $cryptoApp->getBiggestMovers(0, $request->period);	
});

/**
* Get the data for a currency by its ticker symbol
*
*/
$klein->respond('/currency/[:symbol]', function ($request) {

	$cryptoApp = new \marketCap\marketData();

	return $cryptoApp->getCryptoBySymbol(strtoupper($request->symbol));	
});

$klein->dispatch();
die();