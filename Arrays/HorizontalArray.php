<?php

namespace Arrays;

class HorizontalArray extends BasicArray
{
    function __construct($n, $m)
    {
        parent::__construct($n, $m);
    }

    public function arraySort()
    {
        parent::arraySort();

        $this->sortInputArray();
    }
}