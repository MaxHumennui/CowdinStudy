<?php

namespace App\Arrays\Sorters;

class DiagonalArray extends AbstractBasicArray
{
    public function arraySort()
    {
        $this->name = "Diagonal";
        $output = $this->array;
        $cnt = 0;
        $index = 0;

        $sortedArray = $this->array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        for($i = 0; $i < count($this->array); $i++){
            for($j = 0; $j < count($this->array[$i]); $j++){

                for($q = count($this->array) - 1; $q >= 0; $q--) {
                    for($x = 0; $x < count($this->array[$i]); $x++) {
                        if($q + $x == $cnt){
                            $output[$q][$x] = $sortedArray[$index];
                            $index++;
                        }
                    }
                }
                $cnt++;
            }
        }
        $this->array = $output;
    }
}
