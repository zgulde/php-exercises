<?php
echo PHP_EOL;
$user_guess = 0;
$min = 1;
$max = 100;
if( ($argc === 2) && ( (int) $argv[1] > 0) ){
	$max = (int) $argv[1];
}
if($argc === 3 && ( (int) $argv[1] < (int) $argv[2]) ){
	$min = (int) $argv[1];
	$max = (int) $argv[2];
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