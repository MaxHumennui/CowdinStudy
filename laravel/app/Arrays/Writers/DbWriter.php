<?php

namespace App\Arrays\Writers;

use App\Models\arrays;

class DbWriter implements WriterInterface
{
    public function write($name, $array)
    {
        $jsonArray = json_encode($array);
        $arrayModel = new arrays();
        $arrayModel->name = $name;
        $arrayModel->array = $jsonArray;
        $arrayModel->save();
    }
}
