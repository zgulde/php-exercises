<?php
echo PHP_EOL;

for($i = 1; $i <= 100; $i++){
	$message = '';

	if ( ($i % 3) == 0)	$message .= 'fizz';
	if ( ($i % 5) == 0)	$message .= 'buzz';

	echo ($message != '') ? $message : $i;

	echo PHP_EOL;
}

echo PHP_EOL;
?>