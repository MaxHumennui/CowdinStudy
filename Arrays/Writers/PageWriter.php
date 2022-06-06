<?php

namespace Arrays\Writers;

class PageWriter implements WriterInterface
{
    public function write($name, $array)
    {
        $arrayString = "";
        for($i = 0; $i < count($array); $i++) {
            for($j = 0; $j < count($array[$i]); $j++) {
                $arrayString .= $array[$i][$j] . " ";
            }
            $arrayString .= "\n";
        }

        echo json_encode($array);
    }
}