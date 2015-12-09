<?php 

// return call_user_func(function()
// {
//     $pony = 'foo';
//     $bar = 'pony';
//     $foo = 'baz';
//     $bar .= $foo;

//     return $bar;
// });


$myArray = [1,2,3,4,5,6,7];

$evens = array_filter($myArray, function($x){
    return ($x % 2 == 0);
});

$addOne = array_map(function($x){
    return $x + 1;
}, $myArray);

var_dump($addOne);

// var_dump($evens);
