<?php

$fruits = array("fruits" => array(
                                "a" => "апельсин",
                                "b" => "банан",
                                "cola" => array(
                                                "яблоко" => "good",
                                                "cola" => "bad")
                                ),
                "numbers" => array(
                                    1,
                                    2,
                                    3,
                                    4,
                                    5,
                                    6
                ),
                "holes" => array(
                                "первая",
                                5 => "вторая",
                                "третья"
                )
);
$sorting = function ($item, $key) {
    if ($key == 'яблоко') {
        return true;
    }
};

$arr = array_filter($fruits, $sorting, ARRAY_FILTER_USE_BOTH);
print_r($arr);


