<?php

namespace Arrays;

trait ArraySortTrait
{
    protected function sortInputArray(&$array)
    {
        $sortedArray = $array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        $cnt = 0;
        for($i = 0; $i < count($array); $i++) {
            for($j = 0; $j < count($array[$i]); $j++) {
                $array[$i][$j] = $sortedArray[$cnt];
                $cnt++;
            }
        }
    }
}