<?php
/*
Written by Mr Hery

PHP CLI
*/

if(!isset($argv[1]) || !isset($argv[2])){
	die("Parameter error. Usage: \nphp dns-enum.php <domain here> <wordlist path>");
}

if(!file_exists($argv[2])){
	die("Wordlist: " . $argv[2] . " is not exists");
}

$f = fopen($argv[2], "rb");
$domain = $argv[1];

if($f){
	while(!feof($f)){
		$sub = fgets($f);
		$hostname = trim($sub) . "." . $domain;
		
		$check = gethostbyname($hostname);
		
		if($check != $hostname){
			echo $hostname . " - " . $check . "\n";   
		}
	}

	fclose($f);
}