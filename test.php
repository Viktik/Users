<?php

$fruits = array("fruits" => array("a" => "апельсин",
    "b" => "банан",
    "c" => "яблоко"
),
    "numbers" => array(1,
        2,
        3,
        4,
        5,
        6
    ),
    "holes" => array("первая",
        5 => "вторая",
        "третья"
    )
);
$sorting = function ($item, $key) {
    if ($key == 'a') {
        return true;
    }
};

$arr = array_filter($fruits, $sorting, ARRAY_FILTER_USE_BOTH);
print_r($arr);


