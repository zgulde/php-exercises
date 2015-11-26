<?php

require_once 'Card.php';

class Deck
{
    public $suits = ['♣', '♥', '♠', '♦'];
    public $values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
    public $cards = [];

    public function __construct()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->values as $value) {
                $this->cards[] = new Card($value, $suit);
            }
        }
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function draw()
    {
        return array_pop($this->cards);
    }

    public function getCardsRemaining()
    {
        return count($this->cards);
    }
}
