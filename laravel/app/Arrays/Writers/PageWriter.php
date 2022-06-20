<?php

namespace App\Arrays\Writers;

class PageWriter implements WriterInterface
{
    public function write($name, $array)
    {
        return '"' . json_encode($array) . '"';
    }
}
