<?php

$arr = ['granny', 'grandpa', 2 => ['daughter', 'son', 2 => ['grandson']]];
function sortggg($item, $key)
{
    if ($item[$key]==2){
        echo $item[2];
    }
}

array_walk_recursive($arr, 'sortggg');


