<?php
/*
Written by Mr Hery

PHP CLI
*/

if(!isset($argv[1])){
	die("Parameter error. Usage: \nphp dns-info.php <domain here>");
}

$domain = $argv[1];
$record = dns_get_record($domain);	

print_r($record);

