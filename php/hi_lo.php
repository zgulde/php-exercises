<?php
echo PHP_EOL;
$user_guess = 0;
$the_number = mt_rand(1,100);

fwrite(STDOUT,"~~~~~~~~ High-Low Game ~~~~~~~~\n\n");

while($user_guess !== $the_number){
	$user_guess = 0;

	while( ($user_guess <= 0) || ($user_guess > 100) ){
		fwrite(STDOUT,"Enter an integer number between 1 and 100: ");
		$user_guess = fgets(STDIN);
		$user_guess = (int) $user_guess;
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