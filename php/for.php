<?php

$start_number = 0;
$end_number = 0;
$increment = 0;

if ($argc === 2 && $argv[1] === 'help'){
	echo " ____________________________________________________________________ \n";
	echo "|                                                                    |\n";
	echo "|---INFO ------------------------------------------------------------|\n";
	echo "| This is a command line tool to illustrate the parameters of a for  |\n";
	echo "| loop. Either you can pass it three arguments that correspond to the|\n";
	echo "| parameters of a for loop in the command line or just call the file |\n";
	echo "| and it will prompt you for the parameters.                         |\n";
	echo "|---SYNTAX ----------------------------------------------------------|\n";
	echo "| /pathtofile \$ php for.php \"start_number\" \"end_number\" \"incrementor\"|\n";
	echo "|---USING -----------------------------------------------------------|\n";
	echo "| 1) All numbers must be integers.                                   |\n";
	echo "| 2) The starting number can be anything you like, including         |\n";
	echo "|    negative numbers.                                               |\n";
	echo "| 3) The ending number must be greater than the starting number.     |\n";
	echo "| 4) The incrementor repeatedly added to the starting number must    |\n";
	echo "|    eventually get the starting number to the end number i.e. the   |\n";
	echo "|    end number cannot be skipped.                                   |\n";
	echo "|____________________________________________________________________|\n";
	echo PHP_EOL;
	exit(0);
}

if ($argc === 4) {
	$start_number = trim($argv[1]);
	$end_number = trim($argv[2]);
	$increment = trim($argv[3]);
} else {
	fwrite(STDOUT,'Enter a starting number: ');
	$start_number = trim(fgets(STDIN) );
	fwrite(STDOUT,'Enter an ending number: ');
	$end_number = trim(fgets(STDIN) );	
	fwrite(STDOUT,'Enter an increment number: ');
	$increment = trim(fgets(STDIN) );
}



if (!is_numeric($start_number)) {
	echo "\nError in \$start_number input.\n";
	echo "Expecting an int > 0\n";
	echo "defaulting to 1....\n";
	$start_number = 1;
} else {
	$start_number = (int) $start_number;
}

if (!is_numeric($end_number) || ( (int) $end_number <= $start_number) ) {
	echo "\nError in \$end_number input.\n";
	echo "Expecting an int > 0 AND > \$start_number\n";
	echo "defaulting to \$start_number + 1...\n";
	$end_number = $start_number + 1;
} else {
	$end_number = (int) $end_number;
}

$isValidIncrementor = (($end_number - $start_number) % $increment === 0);

if (!is_numeric($increment) || ( (int) $increment < 1 || !$isValidIncrementor) ) {
	echo "\nError in \$increment input.\n";
	echo "Expecting an int > 0 and a number such that \$start_number\n";
	echo "incremented by it will eventually equal \$end_number\n";
	echo "defaulting to 1...\n";
	$increment = 1;
} else {
	$increment = (int) $increment;
}

echo "|================================\n";
echo "| Starting at $start_number\n";
echo "| Ending at $end_number\n";
echo "| Incrementing by $increment\n";
echo "|================================\n";

for($i = $start_number; $i <= $end_number; $i += $increment){
	echo "| $i" . PHP_EOL;
}

echo "|================================\n";

echo PHP_EOL;