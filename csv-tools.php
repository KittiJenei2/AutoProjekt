<?php
function getCsvData ($fileName) {
    if (!file_exists($fileName)) {
        echo "$fileName nem található";
        return false;
    }
    $csvFile = fopen($fileName, 'r');
    $lines = [];
    while (! feof($csvFile)) {
        $line = fgetcsv($csvFile);
        $lines[] = $line;
    }
    fclose($csvFile);

    return $lines;
}

function GetMakers(){
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
            $makers[] = $maker;
        }
        /*if ($model != $data[$keyModel]) {
            $model = $data[$keyModel];
            $result[$maker][] = $model;
        }
        */
    }
    return $makers;

    }

function updateMaker($mysqli, $data)
{
    $makerName = $data['name'];

    $result = $mysqli->query("UPDATE makers SET name=$makerName");

    if (!$result)
    {
        echo "Hiba történt a $makerName beszúrása közben";
        return $result;
    }
    $maker = getMakerByName($mysqli, $makerName);

    return $maker;
}

function getMakerByName()
{}

function getMaker($mysqli, $id)
{
    $result = $mysqli->query("SELECT * FROM makers WHERE id=$id");
    $maker = $result->fetch_assoc();

    return $maker;
}

function delMaker()