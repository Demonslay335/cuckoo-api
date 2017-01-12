<?php
require_once '../vendors/autoload.php';
$apiKey = 'secret';
$file = new Malwr\File($apiKey);
$resourceObj = $file->add('foo.txt');
var_dump($resourceObj);
// Get status
var_dump($file->status($resourceObj['uuid']));