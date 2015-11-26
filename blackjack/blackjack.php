<?php

require_once 'Deck.php';

// create an array for suits
$suits = ['C', 'H', 'S', 'D'];

// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it
function buildDeck($suits, $cards) {
    $deck = [];
    foreach ($suits as $suit) {
        foreach ($cards as $card) {
            $deck[] = $card . ' ' . $suit;
        }
    }
    shuffle($deck);
    return $deck;
}

// determine if a card is an ace
// return true for ace, false for anything else
function isCardAce($card) {
    return (strpos($card, 'A') !== false) ? true: false;
}

// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card) {
    $value = explode(' ', $card);
    $value = $value[0];

    if (is_numeric($value)) {
        return (int) $value;
    } elseif ($value == 'A') {
        return 11;
    } else {
        return 10;
    }
}

// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
function getHandTotal($hand) {
    $total = 0;
    foreach ($hand as $card) {
        $total += getCardValue($card);
    }
    return $total;
}

// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand, &$deck) {
    $hand[] = array_pop($deck);
}

// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false) {
    
    $total = getHandTotal($hand);
    $firstCard = array_shift($hand);

    echo "$name:";
    if ($hidden) {
        $total = '??';
        echo " [???] ";
    } else {
        echo " [$firstCard] ";
    }

    foreach ($hand as $card) {
        usleep(300000);
        echo " [$card] ";
    }

    usleep(300000);
    echo "Total: $total";
    echo PHP_EOL;
    usleep(1000000);
}

// build the deck of cards
$deck = buildDeck($suits, $cards);

// initialize a dealer and player hand
$dealer = [];
$player = [];
$userAction = '';

drawCard($player,$deck);
drawCard($player,$deck);
drawCard($dealer,$deck);
drawCard($dealer,$deck);

echo PHP_EOL;
echoHand($dealer, 'Dealer', true);
echoHand($player, 'Player');
echo '---------------------------' .PHP_EOL;

// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while ($userAction != 'S' && $userAction != 's') {
    if (getHandTotal($player) > 21) break;
    echo PHP_EOL;
    echo '(H)it or (S)tay?' . PHP_EOL;
    echo PHP_EOL;
    echo ' > ';
    $userAction = trim(fgets(STDIN));
    if ($userAction == 's' || $userAction == 'S') break;
    echo PHP_EOL;
    drawCard($player, $deck);
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
    drawCard($dealer, $deck);
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
