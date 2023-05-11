<?php
/*
Written by mrhery

PHP CLI
*/

if(!isset($argv[1])){
	die("Usage: php email-miner.php <url> <limit: 1-10>");
}

$url = $argv[1];

if(isset($argv[2])){
	$ls = explode("-", $argv[2]);
	
	$start = null;
	$end = $ls[0];
	
	if(isset($ls[1])){
		$end = $ls[1];
		$start = $ls[0];
	}
	
	if(is_null($start)){
		$start = 0;
	}
	
	$emails = [];
	
	for($i = $start; $i <= $end; $i++){
		echo "Downloadind: " . $url . $i;
		$html = file_get_contents($url . $i);
		
		echo " - processing emails ";
		$email_regex = '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/';
		preg_match_all($email_regex, $html, $matches);
		$emails = array_merge($emails, $matches[0]);
		
		echo "Done!\n";
	}
	
	$emails = array_unique($emails);
	
	$txt = implode("\n", $emails);
	
	$f = fopen("emails.txt", "w+");
	fwrite($f, $txt);
	fclose($f);
}else{
	$emails = [];
	echo "Downloadind: " . $url;
	$html = file_get_contents($url);
	
	echo " - processing emails ";
	$email_regex = '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/';
	preg_match_all($email_regex, $html, $matches);
	$emails = array_merge($emails, $matches[0]);
	
	echo "Done!\n";
	
	$emails = array_unique($emails);
	
	$txt = implode("\n", $emails);
	
	$f = fopen("emails.txt", "w+");
	fwrite($f, $txt);
	fclose($f);
}


