<?php

namespace Arrays\Writers;

class PageWriter implements WriterInterface
{
    public function write($name, $array)
    {
        echo '"' . json_encode($array) . '"';
    }
}