<?php
echo PHP_EOL;
$user_guess = 0;
$min = 1;
$max = 100;

//validate and set $min and $max from command line inputs
	if( ($argc === 2) && ( (int) $argv[1] > 0) ){
		$max = (int) $argv[1];
	} elseif ($argc === 2) {
		fwrite(STDOUT, "Error: invalid argument \"\$min\"\n");
		fwrite(STDOUT, "Expected: int \$min > 0\n");
		fwrite(STDOUT, "Starting game with default values...\n\n");
	}
	if($argc === 3 && ( (int) $argv[1] < (int) $argv[2]) ){
		$min = (int) $argv[1];
		$max = (int) $argv[2];
	} elseif ($argc === 3) {
		fwrite(STDOUT,"Error: invalid arguments \"\$min\", \"\$max\"\n");
		fwrite(STDOUT,"Expected: int \$min < int \$max\n");
		fwrite(STDOUT, "Starting game with default values...\n\n");
	}

$the_number = mt_rand($min, $max);

fwrite(STDOUT,"~~~~~~~~ High-Low Game ~~~~~~~~\n\n");

while($user_guess !== $the_number){
	$user_guess = $min - 1;

	while( ($user_guess < $min) || ($user_guess > $max) ){
		fwrite(STDOUT,"Guess (between $min and $max) : ");
		$user_guess = (int) fgets(STDIN);
	}

	fwrite(STDOUT,"===============================\n");

	if($user_guess < $the_number){
		fwrite(STDOUT,"----------- too low -----------\n");
	} elseif ($user_guess > $the_number) {
		fwrite(STDOUT,"----------- too high ----------\n");
	} else {
		fwrite(STDOUT,"----------- You Win! ----------\n");
	}

	fwrite(STDOUT,"===============================\n");

}

echo PHP_EOL;
?>