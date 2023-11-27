<?php
function getCsvData ($fileName) {
    if (!file_exists($fileName)) {
        echo "$fileName nem található";
        return false;
    }
    $csvFile = fopen($fileName, 'r');
    $header = fgetcsv($csvFile);
    if ($withHeader) {
        $lines[] = $header;
    }
    else {
        $lines = [];
    }
    while (! feof($csvFile)) {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);

    return $lines;
}