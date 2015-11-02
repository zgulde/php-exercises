<?php

$users = 
[
	'person1' => 
	[
		'first_name' => 'John',
		'last_name' => 'Doe'
	],
	'person2' => 
	[
		'first_name' => 'Jane',
		'last_name' => 'Doe'
	],
	'person3' =>
	[
		'first_name' => 'Philip',
		'last_name' => 'Fry'
	]
];

$name = &$users['person1']['first_name'];

$users['person1']['first_name'] = 'Joe';

echo $name;

echo PHP_EOL;

?>