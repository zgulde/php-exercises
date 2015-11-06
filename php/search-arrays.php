<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

function is_value_present($val, $array)
{
    return (array_search($val, $array) !== false) ? true : false;
}

function get_num_in_common($array1, $array2)
{
    $num = 0;
    foreach ($array1 as $val) {
        if (is_value_present($val, $array2)) {
            $num++;
        }
    }
    return $num;
}

echo get_num_in_common($names, $compare) . PHP_EOL;