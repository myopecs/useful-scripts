<?php
/*Written by SampabBuruk */

$dir = 'C:\Users\ariff\Desktop\HeryTech\data\datas\converted';
$email_regex = '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/';
$emails = [];
foreach(glob("$dir/*.html") as $file) {
    $content = file_get_contents($file);
    preg_match_all($email_regex, $content, $matches);
    $emails = array_merge($emails, $matches[0]);
}
$emails = array_unique($emails);
file_put_contents('C:\Users\ariff\Desktop\HeryTech\data\datas\emails.txt', implode(PHP_EOL, $emails));
echo 'Email addresses extracted and saved to file.';
