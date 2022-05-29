<?php

namespace Arrays\Sorters;

class ArraySorterFactory
{
    public function getSorter($height, $width, $arrayType): AbstractBasicArray
    {
        switch($arrayType){
            case "DIAGONAL":
                return new DiagonalArray($height, $width);
            case "HORIZONTAL":
                return new HorizontalArray($height, $width);
            case "SNAIL":
                return new SnailArray($height, $width);
            case "SNAKE":
                return new SnakeArray($height, $width);
            case "VERTICAL":
                return new VerticalArray($height, $width);
        }

        throw new \Exception("Not existing array type");
    }
}