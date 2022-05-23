<?php

namespace Arrays;

class HorizontalArray extends AbstractBasicArray
{
    use ArraySortTrait;
    use ArrayGenerateTrait;

    function __construct($height, $width)
    {
        $this->arr = $this->generateArray($height, $width);
    }

    public function arraySort()
    {
        $this->name = "Horizontal";
        $this->sortInputArray($this->arr);
    }
}