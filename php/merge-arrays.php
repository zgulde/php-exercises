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

//for the purposes of this exercise, we are assuming the arrays have the same
//length and if they have elements that are identical they will be at the 
//same index
function combine_arrays($array1, $array2)
{
    $array_length = count($array1);
    $combined_array = [];
    
    for ($i=0; $i < $array_length; $i++) { 
        $element1 = array_shift($array1);
        $element2 = array_shift($array2);

        if ($element1 === $element2) {
            array_push($combined_array, $element1);
        } else {
            array_push($combined_array, $element1);
            array_push($combined_array, $element2);
        }
    }
    return $combined_array;
}


// function combine_arrays($array1, $array2)
// {
//     foreach ($array2 as $element) {
//         if ( !(is_value_present($element, $array1)) ){
//             array_push($array1, $element);
//         }
//     }
//     return $array1;
// }

print_r( combine_arrays($names, $compare) );

echo PHP_EOL;