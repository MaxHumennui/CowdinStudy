<?php

namespace Arrays\Writers;

class PageWriter implements WriterInterface
{
    public function write($name, $array)
    {
        echo $name . ": <br>";
        for($i = 0; $i < count($array); $i++) {
            for($j = 0; $j < count($array[$i]); $j++) {
                echo $array[$i][$j] . " ";
            }
            echo "<br>";
        }
        echo "<br>";
    }
}