<?php
echo PHP_EOL;

echo "show all the even numbers between 1 and 100 using continue\n\n";
for ($i = 1; $i <= 100; $i++) { 
	if( $i % 2 === 1 ){
		continue;
	}
	echo "{$i}\n";
}

echo "=============================================================\n";

echo "count from 1- 100 but stop after 10 using break\n";
for($i = 1; $i <= 100; $i++){
	echo "{$i}\n";
	if ($i === 10) {
		break;
	}
}

echo PHP_EOL;



