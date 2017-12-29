<?php 
/**
* Application route deifinitions for Klien Framework
**/
$klein->respond('GET', '/update', function () 
{
	$cryptoApp = new \marketCap\marketData();
	$apiResp = $cryptoApp->getTicker();		

    return $apiResp;
});

$klein->dispatch();