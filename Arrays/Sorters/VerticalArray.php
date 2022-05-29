<?php

namespace Arrays\Sorters;

class VerticalArray extends AbstractBasicArray
{
    public function arraySort()
    {
        $this->name = "Vertical";
        $index = 0;

        $sortedArray = $this->array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        $output = $this->array;
        for($i = 0; $i < count($this->array); $i++) {
            for($j = 0; $j < count($this->array[$i]); $j++) {
                $output[$j][$i] =  $sortedArray[$index];
                $index++;
            }
        }
        $this->array = $output;
    }
}