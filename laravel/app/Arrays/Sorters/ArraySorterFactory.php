<?php

namespace App\Arrays\Sorters;

use Exception;

class ArraySorterFactory
{
    public function getSorter($height, $width, $arrayType): AbstractBasicArray
    {
        switch($arrayType){
            case "diagonal":
                return new DiagonalArray($height, $width);
            case "horizontal":
                return new HorizontalArray($height, $width);
            case "snail":
                return new SnailArray($height, $width);
            case "snake":
                return new SnakeArray($height, $width);
            case "vertical":
                return new VerticalArray($height, $width);
        }

        throw new Exception("Not existing array type");
    }
}
