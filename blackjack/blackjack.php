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

echo PHP_EOL;
echoHand($dealer, 'Dealer', true);
echo PHP_EOL;
echoHand($player, 'Player');
echo '---------------------------' .PHP_EOL;

// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while ($userAction != 'S' && $userAction != 's') {
    if (getHandTotal($player) > 21) break;
    echo PHP_EOL;
    echo '(H)it or (S)tay? Cards Remaining: ' . $deck->getCardsRemaining() . PHP_EOL;
    echo PHP_EOL;
    echo ' > ';
    $userAction = trim(fgets(STDIN));
    if ($userAction == 's' || $userAction == 'S') break;
    echo PHP_EOL;
    $player[] = $deck->draw();
    echoHand($player, 'Player');
}

echo PHP_EOL;
echoHand($dealer, 'Dealer');
echo PHP_EOL;
echoHand($player, 'Player');
echo PHP_EOL;

if (getHandTotal($player) > 21) {
    echo PHP_EOL;
    echo 'BUST!!!' . PHP_EOL;
    echo PHP_EOL;
    exit();
} elseif (getHandTotal($player) == 21) {
    echo PHP_EOL;
    echo 'Blackjack!' . PHP_EOL;
    echo 'You Win!!!' . PHP_EOL;
    echo PHP_EOL;
    exit();
}

while (getHandTotal($dealer) < 17 || (getHandTotal($dealer) < getHandTotal($player)) ){
    echo PHP_EOL;
    echo 'Dealer Hits...' . PHP_EOL;
    echo PHP_EOL;
    $dealer[] = $deck->draw();
    echoHand($dealer, 'Dealer');
    echo PHP_EOL;
}

if (getHandTotal($dealer) > 21) {
    echo PHP_EOL;
    echo 'Dealer Busts!!!' . PHP_EOL;
    echo 'You Win!!!' . PHP_EOL;
} elseif (getHandTotal($dealer) < getHandTotal($player)) {
    echo 'You Win!!!' . PHP_EOL;
} else {
    echo 'You Lose!!!' . PHP_EOL;
}

echo PHP_EOL;

// show the dealer's hand (all cards)
// todo

// todo (all comments below)

// at this point, if the player has more than 21, tell them they busted
// otherwise, if they have 21, tell them they won (regardless of dealer hand)

// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
// show the dealer hand each time they draw a card

// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
// if player and dealer tie, it is a "push"
// if dealer has more than player, dealer wins, otherwise, player wins
