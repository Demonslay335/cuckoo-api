<?php
require_once '../vendors/autoload.php';
$apiUrl = 'https://your-sandbox.com/api';

// Scan a file
$file = new Cuckoo\File($apiKey);
$return = $file->scan('foo.txt');
var_dump($return);

// Rescan a file
$rescan_result = $file->rescan($return['id']);

// Search for a report by hash
$hash = hash_file('sha256', 'foo.txt');
$report = $file->searchReport($hash);
var_dump($report);