<?php

require_once('csv-tools.php');
require_once('CarDBTools.php');
require_once('MakersDbTools.php');
ini_set('memory_limit', '-1');

$filename = "car-db.csv";
$csvData = getCsvData($filename);
if (empty($csvData)) {
    echo 'A fájl nem található';
    return false;
}

$makersDbTool = new MakersDbTool();


$makers = getMakers($csvData);

$errors = [];
foreach ($makers as $maker)
{
    $result = $makersDbTool->createMaker($maker);
    if (!$result)
    {
        $errors[] = $maker;
    }
    echo "$maker\n";

}
