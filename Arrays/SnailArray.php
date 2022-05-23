<?php

namespace Arrays;

class SnailArray extends AbstractBasicArray
{
    use ArraySortTrait;
    use ArrayGenerateTrait;

    function __construct($height, $width)
    {
        $this->arr = $this->generateArray($height, $width);
    }

    function arraySort()
    {
        $this->sortInputArray($this->arr);
        $this->name = "Snail";
        $stepsCount = count($this->arr) + count($this->arr[0]) - 1;
        $c = 0;
        $i = 0;
        $j = 0;
        $sortedI = 0;
        $sortedJ = 0;
        $step = count($this->arr[0]) - 1;
        $output = $this->arr;
        $incrementI = 0;
        $incrementJ = 1;

        while ($c < $stepsCount){
            for($s = 0; $s < $step; $s++){
                $output[$sortedI][$sortedJ] = $this->arr[$i][$j];
                $sortedI += $incrementI;
                $sortedJ += $incrementJ;
                $j++;
                if($j == count($this->arr[0])){
                    $j = 0;
                    $i++;
                }
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
        $output[ceil((count($this->arr) - 1) / 2)][ceil((count($this->arr[0]) - 1) / 2)] = $this->arr[count($this->arr) - 1][count($this->arr[0]) - 1];
        $this->arr = $output;
    }
}