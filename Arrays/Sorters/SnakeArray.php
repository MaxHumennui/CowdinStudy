<?php

namespace Arrays\Sorters;

class SnakeArray extends AbstractBasicArray
{
    public function arraySort()
    {
        $this->name = "Snake";
        $output = $this->array;
        $cnt = 0;
        $incr = 1;
        $index = 0;

        $sortedArray = $this->array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        for($i = 0; $i < count($this->array); $i++) {
            for($j = 0; $j < count($this->array[$i]); $j++) {
                $output[$i][$cnt] = $sortedArray[$index];
                $index++;
                $cnt += $incr;
            }
            $incr *= -1;
            if($incr < 0){
                $cnt--;
            }else{
                $cnt++;
            }
            $this->array = $output;
        }
    }
}