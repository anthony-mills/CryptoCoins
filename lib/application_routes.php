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

$klein->dispatch();
die();