<?php

namespace Arrays;

class SnakeArray extends AbstractBasicArray
{
    use ArraySortTrait;
    use ArrayGenerateTrait;

    function __construct($height, $width)
    {
        $this->arr = $this->generateArray($height, $width);
    }

    public function arraySort()
    {
        $this->sortInputArray($this->arr);
        $this->name = "Snake";
        $output = $this->arr;
        $cnt = 0;
        $incr = 1;
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $output[$i][$j] = $this->arr[$i][$cnt];
                $cnt += $incr;
            }
            $incr *= -1;
            if($incr < 0){
                $cnt--;
            }else{
                $cnt++;
            }
            $this->arr = $output;
        }
    }
}