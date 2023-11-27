<?php
require_once('csv-tools.php');
ini_set('memory-limit', '-1');

$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);
if (empty($csvData)) {
    echo "Nem található adat a csv fájlban.";
    return false;
}

$header = $csvData[0];

$keyMaker = array_search('make', $header);
$keyModel = array_search('model', $header);
$result = [];
$maker = '';
$model = '';
$isHeader = true;

for ($i = 1; count($csvData); $i++) {

}
foreach ($csvData as $data) {
    if ($isHeader) {
        $isHeader = false;
        continue;
    }
    if ($maker != $data[$keyMaker]) {
        $maker = $data[$keyMaker];
    }
    if ($model != $data[$keyModel]) {
        $model = $data[$keyModel];
        $result[$maker][] = $model;
    }
}
print_r($result);

$arr = array ('first' => 'a', 'second' => 'b',);
$key = array_search ('a', $arr);


