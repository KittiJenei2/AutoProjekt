<?php
require_once('csv-tools.php');
ini_set('memory-limit', '-1');

$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);

$arr = array ('first' => 'a', 'second' => 'b',);
$key = array_search ('a', $arr);

$header = $csvData[0];
$keyMaker = array_search('make', $csvData[0]);