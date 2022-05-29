<?php

namespace Arrays\Sorters;

use Exception;

trait ArrayGenerateTrait
{
    protected function generateArray($height, $width): array
    {
        $array = [];

        if($height < 1 || $width < 1){
            throw new Exception("Dimension array less than 1x1");
        }

        for ($i = 0; $i < $height; $i++) {
            $array[$i] = [];
            for ($j = 0; $j < $width; $j++) {
                $array[$i][$j] = rand(0, 9999);
            }
        }

        return $array;
    }
}