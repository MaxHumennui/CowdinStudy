<?php

namespace Arrays;

use mysql_xdevapi\Exception;

class BasicArray
{
    function __construct($n, $m)
    {
        if($n < 1 || $m < 1){
            throw new Exception("Dimension array less than 1x1");
        }

        for ($i = 0; $i < $n; $i++) {
            $this->arr[$i] = [];
            for ($j = 0; $j < $m; $j++) {
                $this->arr[$i][$j] = rand(0, 9999);
            }
        }
    }

    public function printArray()
    {
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                echo $this->arr[$i][$j] . " ";
            }
            echo "<br>";
        }
    }

    public function printArrayInFile()
    {
        if(!file_exists(__DIR__."/../output/")){
            throw new Exception("Output directory does not exist.");
        }

        $arrayString = "";
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $arrayString .= $this->arr[$i][$j] . " ";
            }
            $arrayString .= "\n";
        }
        $filename = __DIR__."/../output/arrays.txt";
        $fileContent = "\nNext array:\n" . "$arrayString";
        file_put_contents($filename, $fileContent, FILE_APPEND|LOCK_EX);
    }

    public function arraySort()
    {
    }

    protected $arr = [];

    protected function sortInputArray()
    {
        $sortedArray = $this->arr;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        $cnt = 0;
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $this->arr[$i][$j] = $sortedArray[$cnt];
                $cnt++;
            }
        }
    }
}