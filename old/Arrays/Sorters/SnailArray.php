<?php

namespace Arrays\Sorters;

class SnailArray extends AbstractBasicArray
{
    function arraySort()
    {
        $this->name = "Snail";
        $stepsCount = count($this->array) + count($this->array[0]) - 1;
        $c = 0;
        $index = 0;
        $sortedI = 0;
        $sortedJ = 0;
        $step = count($this->array[0]) - 1;
        $output = $this->array;
        $incrementI = 0;
        $incrementJ = 1;

        $sortedArray = $this->array;
        $sortedArray = array_reduce($sortedArray, "array_merge", []);
        sort($sortedArray);

        while ($c < $stepsCount){
            for($s = 0; $s < $step; $s++){
                $output[$sortedI][$sortedJ] = $sortedArray[$index];
                $sortedI += $incrementI;
                $sortedJ += $incrementJ;
                $index++;
            }
            list($incrementI, $incrementJ) = [$incrementJ, $incrementI];
            $c++;
            if($c % 2 == 0){
                $incrementI *= -1;
                $incrementJ *= -1;
            }elseif($c <= 3){
                if($c % 3 == 0){
                    $step--;
                }
                continue;
            }
            if($c % 2 != 0){
                $step--;
            }
        }
        $output[ceil((count($this->array) - 1) / 2)][ceil((count($this->array[0]) - 1) / 2)] = $sortedArray[count($sortedArray) - 1];
        $this->array = $output;
    }
}