<?php

namespace Arrays\Sorters;

enum ArrayTypes: string
{
    case DIAGONAL = "diagonal";
    case HORIZONTAL = "horizontal";
    case SNAIL = "snail";
    case SNAKE = "snake";
    case VERTICAL = "vertical";
}