<?php

	class API {
		function helloworld() {
			return "Hello, Airen!<br>";
		}
		
		function addition ($a, $b) {
			return $a+$b;
		}
		
		function getData() {
			mysql_connect('localhost','root','');
			mysql_select_db('perkuliahan');
			$result = mysql_query('SELECT* FROM siswa');
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				foreach ($row as $coloumn) {
					$var = $coloumn;
				}
			}
			return $var;
		}
	}
	
	$opt = array('uri' => 'http://localhost/');
	$server = new SoapServer(NULL, $opt);
	$server -> setClass('API');
	$server -> handle();
?>
