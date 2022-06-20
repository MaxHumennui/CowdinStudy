<?php

namespace App\Http\Controllers;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Exception;
use Illuminate\Http\Request;
use App\Arrays\Sorters\ArraySorterFactory;
use App\Arrays\Writers\DbWriter;
use App\Arrays\Writers\FileWriter;
use Illuminate\Http\Response;

class ArraysController extends Controller
{
    public function formSubmit(Request $request): Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $arraysFactory = new ArraySorterFactory();
        $request = json_decode($request['request'], true);
        if($request['actionType'] == "pageWrite"){
            try {

                $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
                $array->arraySort();
                return response('"' . json_encode($array->array) . '"');

            } catch (Exception $e) {
                return response("Error: " . $e->getMessage() . "\n");
            }
        }

        if($request['actionType'] == "downloadFile"){
            $fileWriter = new FileWriter();
            try {

                $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
                $array->arraySort();
                $fileWriter->write($array->name, $array->array);
                $attachmentLocation = __DIR__ . "/../../../public/output/" . $array->name . ".txt";
                return response('http://localhost:8001/download.php?file=' . $array->name . '.txt&urlFile=' . $attachmentLocation);

            } catch (Exception $e) {
                return response("Error: " . $e->getMessage() . "\n");
            }
        }

        if($request['actionType'] == "writeDB"){
            $dbWriter = new DbWriter();

            try {

                $array = $arraysFactory->getSorter($request["height"], $request["width"], $request["arrayType"]);
                $array->arraySort();
                $dbWriter->write($array->name, $array->array);
                return response("Success!");

            } catch (Exception $e) {
                return response("Error: " . $e->getMessage() . "\n");
            }
        }
        return response("Action not found");
    }
}
