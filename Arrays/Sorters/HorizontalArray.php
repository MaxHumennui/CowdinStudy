<?php

namespace Arrays\Sorters;

class HorizontalArray extends AbstractBasicArray
{
    public function arraySort()
    {
        $this->name = "Horizontal";
        $sortedArray = $this->array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        $cnt = 0;
        for($i = 0; $i < count($this->array); $i++) {
            for($j = 0; $j < count($this->array[$i]); $j++) {
                $this->array[$i][$j] = $sortedArray[$cnt];
                $cnt++;
            }
        }
    }
}