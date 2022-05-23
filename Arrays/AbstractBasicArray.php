<?php

namespace Arrays;

abstract class AbstractBasicArray
{
    public $name = "";
    public $arr = [];

    abstract public function arraySort();
}