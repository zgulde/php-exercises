<?php

require_once 'Deck.php';

function getHandTotal($hand) {
    $total = 0;
    foreach ($hand as $card) {
        $total += $card->getBlackjackValue();
    }
    return $total;
}

function echoHand($hand, $name, $hidden = false) {
    
    $total = getHandTotal($hand);
    $firstCard = array_shift($hand);

    echo "$name:";
    if ($hidden) {
        $total = '??';
        echo " [???] ";
    } else {
        echo ' ' . $firstCard->toString() . ' ';
    }

    foreach ($hand as $card) {
        usleep(300000);
        echo ' ' . $card->toString() . ' ';
    }

    usleep(300000);
    echo "Total: $total";
    echo PHP_EOL;
    usleep(1000000);
}

$userAction = '';

$deck = new Deck();
$dealer = [];
$player = [];

$deck->shuffle();
array_push($dealer, $deck->draw(), $deck->draw());
array_push($player, $deck->draw(), $deck->draw());

echoHand($dealer, 'Dealer', true);
echoHand($player, 'Player');
echo '---------------------------' .PHP_EOL;

// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while ($userAction != 'S' && $userAction != 's') {
    if (getHandTotal($player) > 21) break;
    echo 'Cards Remaining: ' . $deck->getCardsRemaining() . PHP_EOL;
    echo '(H)it or (S)tay > ';
    $userAction = trim(fgets(STDIN));
    if ($userAction == 's' || $userAction == 'S') break;
    $player[] = $deck->draw();
    echoHand($player, 'Player');
}

echoHand($dealer, 'Dealer');
echoHand($player, 'Player');

if (getHandTotal($player) > 21) {
    echo 'BUST!!!' . PHP_EOL;
    exit();
} elseif (getHandTotal($player) == 21) {
    echo 'Blackjack!' . PHP_EOL;
    echo 'You Win!!!' . PHP_EOL;
    exit();
}

while (getHandTotal($dealer) < 17 || (getHandTotal($dealer) < getHandTotal($player)) ){
    echo 'Dealer Hits...' . PHP_EOL;
    $dealer[] = $deck->draw();
    echoHand($dealer, 'Dealer');
}

if (getHandTotal($dealer) > 21) {
    echo 'Dealer Busts!!!' . PHP_EOL;
    echo 'You Win!!!' . PHP_EOL;
} elseif (getHandTotal($dealer) < getHandTotal($player)) {
    echo 'You Win!!!' . PHP_EOL;
} else {
    echo 'You Lose!!!' . PHP_EOL;
}
