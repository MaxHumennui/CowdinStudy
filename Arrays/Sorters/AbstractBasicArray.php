<?php

namespace Arrays\Sorters;

abstract class AbstractBasicArray
{
    use ArrayGenerateTrait;

    public string $name = "";
    public array $array = [];

    function __construct($height, $width)
    {
        $this->array = $this->generateArray($height, $width);
    }

    abstract public function arraySort();
}