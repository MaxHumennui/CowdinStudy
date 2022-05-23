<?php

namespace Arrays;

class VerticalArray extends AbstractBasicArray
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
        $this->name = "Vertical";

        $output = $this->arr;
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $output[$i][$j] =  $this->arr[$j][$i];
            }
        }
        $this->arr = $output;
    }
}