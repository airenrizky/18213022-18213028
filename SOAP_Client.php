<?php

	$opt = array('location' => 'http://localhost/SOAP-Server.php', 'uri' => 'http://localhost/');
	
	$api = new SoapClient(NULL, $opt);
	echo $api -> helloworld();
	echo $api -> addition(12,10);
	echo ("<br>");
	echo ("<h1>Data yang diambil dari tabel siswa pada database perkuliahan</h1>");
	echo $api -> getData();
?>

