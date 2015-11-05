<?php
echo PHP_EOL;

$things = array(
	'Sgt. Pepper',
	 "11",
	 null,
	 array(1,2,3),
	 3.14,
	 "12 + 7",
	 false,
	 (string) 11
 );

foreach($things as $element){
	if (is_int($element)) {
		echo "\nThis element has a type of int!\n";
	}
	if (is_float($element)) {
		echo "\nThis element has a type of float!\n";
	}
	if (is_bool($element)) {
		echo "\nThis element has a type of bool!\n";
	}
	if (is_array($element)) {
		echo "\nThis element has a type of array!\n";
		foreach ($element as $inner_e) {
			echo "    value: $inner_e\n";
		}
	}
	if (is_null($element)) {
		echo "\nThis element has a type of null!\n";
	}
	if (is_string($element)) {
		echo "\nThis element has a type of string!\n";
	}
	if (is_scalar($element)) {
		echo "The value of this element is $element\n";
	}
	
}

echo PHP_EOL;