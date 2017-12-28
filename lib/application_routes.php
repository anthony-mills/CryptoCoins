<?php 
/**
* Application route deifinitions for Klien Framework
**/
$klein->respond('GET', '/update-all', function () 
{
	$cryptoApp = new \marketCap\marketData();
	$apiResp = $cryptoApp->updateAll();		

    return json_encode($apiResp);
});