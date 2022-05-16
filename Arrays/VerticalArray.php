<?php

namespace Arrays;

class VerticalArray extends BasicArray
{
    function __construct($n, $m)
    {
        parent::__construct($n, $m);
    }

    public function arraySort()
    {
        parent::arraySort();

        $this->sortInputArray();

        $output = $this->arr;
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $output[$i][$j] =  $this->arr[$j][$i];
            }
        }
        $this->arr = $output;
    }
}