<?php

namespace Arrays\Writers;

use Exception;

class FileWriter implements WriterInterface
{
    public function write($name, $array)
    {
        if(! file_exists(__DIR__."/../../output/")){
            throw new Exception("Output directory does not exist.");
        }

        $arrayString = "";
        for($i = 0; $i < count($array); $i++) {
            for($j = 0; $j < count($array[$i]); $j++) {
                $arrayString .= $array[$i][$j] . " ";
            }
            $arrayString .= "\n";
        }
        $filename = __DIR__ . "/../output/" . $name . ".txt";
        $fileContent = "\n" . $name . ":\n" . "$arrayString";
        file_put_contents($filename, $fileContent, LOCK_EX);
    }
}