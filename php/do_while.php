<?php
echo PHP_EOL;

echo "counting by 2's starting with 0 and ending at 100\n";
echo PHP_EOL;
$i = 0;
do{
	$i += 2;
	echo "$i\n";
} while ($i < 100);
echo PHP_EOL;


echo "count backwards by 5's from 100 to -10\n";
echo PHP_EOL;
$i = 100;
do{
	echo "$i\n";
	$i -= 5;
}while($i >= -10);
echo PHP_EOL;

echo "starts at 2, and displays the result \$a * \$a on each line while \$a is less than 1,000,000\n";
$i = 2;
do{
	echo ($i * $i);
	echo PHP_EOL;
	$i *= $i;
}while($i < 1000000);	

echo PHP_EOL;
?>