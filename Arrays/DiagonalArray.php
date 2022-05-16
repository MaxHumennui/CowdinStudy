<?php

namespace Arrays;

class DiagonalArray extends BasicArray
{
    function __construct($n, $m)
    {
        parent::__construct($n, $m);
    }

    public function arraySort()
    {
        parent::arraySort();

        $this->sortInputArray();
        $output = $this->arr;
        $cnt = 0;
        $column = 0;
        $row = 0;
        for($i = 0; $i < count($this->arr); $i++){
            for($j = 0; $j < count($this->arr[$i]); $j++){

                for($q = count($this->arr) - 1; $q >= 0; $q--) {
                    for($x = 0; $x < count($this->arr[$i]); $x++) {
                        if($q + $x == $cnt){
                            $output[$q][$x] = $this->arr[$column][$row];
                            $row++;
                            if($row == count($this->arr[$i])){
                                $row = 0;
                                $column++;
                            }
                        }
                    }
                }
                $cnt++;
            }
        }
        $this->arr = $output;
    }
}