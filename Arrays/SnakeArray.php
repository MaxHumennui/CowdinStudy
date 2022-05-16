<?php

namespace Arrays;

use mysql_xdevapi\Exception;

class SnakeArray extends BasicArray
{
    function arraySort()
    {
        parent::arraySort();

        $this->sortInputArray();
        $output = $this->arr;
        $cnt = 0;
        $incr = 1;
        for($i = 0; $i < count($this->arr); $i++) {
            for($j = 0; $j < count($this->arr[$i]); $j++) {
                $output[$i][$j] = $this->arr[$i][$cnt];
                $cnt += $incr;
            }
            $incr *= -1;
            if($incr < 0){
                $cnt--;
            }else{
                $cnt++;
            }
            $this->arr = $output;
        }
    }
}