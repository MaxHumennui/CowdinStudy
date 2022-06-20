<?php

namespace App\Arrays\Writers;

use Exception;

class FileWriter implements WriterInterface
{
    public function write($name, $array)
    {
        if(! file_exists(__DIR__ . "/../../../public/output/")){
            throw new Exception("Output directory does not exist.");
        }

        $arrayString = "";
        for($i = 0; $i < count($array); $i++) {
            for($j = 0; $j < count($array[$i]); $j++) {
                $arrayString .= $array[$i][$j] . " ";
            }
            $arrayString .= "\n";
        }
        $filename = __DIR__ . "/../../../public/output/" . $name . ".txt";
        $fileContent = $name . ":\n" . "$arrayString";
        file_put_contents($filename, $fileContent, LOCK_EX);
    }
}
