<?php 
/**
* Application route deifinitions for Klien Framework
**/
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

$klein->dispatch();
die();