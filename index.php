<?php

header("Access-Control-Allow-Origin: http://localhost:3000");

require_once __DIR__ . '/vendor/autoload.php';

use Arrays\DatabaseGateway;
use Arrays\Sorters\ArraySorterFactory;
use Arrays\Writers\DbWriter;
use Arrays\Writers\FileWriter;
use Arrays\Writers\PageWriter;

$request = json_decode($_POST["request"], true);
$arraysFactory = new ArraySorterFactory();

if($request["actionType"] == "pageWrite"){
    $pageWriter = new PageWriter();

    try {
        $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
        $array->arraySort();
        $pageWriter->write($array->name, $array->array);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

if($request["actionType"] == "downloadFile"){
    $fileWriter = new FileWriter();

    try {
        $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
        $array->arraySort();
        $fileWriter->write($array->name, $array->array);
        $attachmentLocation = __DIR__ . "/output/" . $array->name . ".txt";
        echo 'http://localhost:8001/download.php?file=' . $array->name . '.txt&urlFile=' . $attachmentLocation;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

if($request["actionType"] == "writeDB"){
    $dbGateway = new DatabaseGateway();
    $dbWriter = new DbWriter($dbGateway);

    try {
        $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
        $array->arraySort();
        $dbWriter->write($array->name, $array->array);
        echo "Success!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

