<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

function is_value_present($val, $array)
{
    return (array_search($val, $array) !== false);
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

function combine_arrays($array1, $array2)
{
    foreach ($array2 as $element) {
        if ( !(is_value_present($element, $array1)) ){
            array_push($array1, $element);
        }
    }
    return $array1;
}

print_r(combine_arrays($names, $compare));