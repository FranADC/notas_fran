<?php
$registros = loadCsvData('poblacion_pontevedra.csv');

include 'views/templates/header.php';
include 'views/csv.view.php';
include 'views/templates/footer.php';

function loadCsvData(string $fileName) : array{
    $csvFile = file($fileName);
    $data = [];
    foreach ($csvFile as $line) {
        $data[] = str_getcsv($line, ';');
    }
    return $data;
}