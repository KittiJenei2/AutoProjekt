<?php
require_once('csv-tools.php');
ini_set('memory-limit', '-1');

$fileName = 'car-db.csv';
$csvData = getCsvData($fileName);
if (empty($csvData)) {
    echo "Nem található adat a csv fájlban.";
    return false;
}

$makers = GetMakers([]);
print_r($makers);

foreach ($makers as $maker) {
    $mysqli->query("INSERT INTO cars (name) VALUES ('$maker')");
    echo "$maker\n";
}
$mysqli->close();


