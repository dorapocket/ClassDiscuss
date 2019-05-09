<?php 
    $eancrykey='EzblrbNS';
	$userdata = array(
		'session_id' => '91cad2e5ecdb766cc06bf3ea9ff4753f',
		'ip_address' => '112.10.180.236',
		'user_agent' => 'PostmanRuntime/7.6.1',
		'user_data' => '$path=1',
	);

	$cookiedata = serialize($userdata);
	$cookiedata = $cookiedata.md5($eancrykey.$cookiedata);
	echo $cookiedata;
?>
