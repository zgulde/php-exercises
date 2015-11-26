<?php

class Card
{
    public $value;
    public $suit;

    public function __construct($value, $suit)
    {
        $this->value = $value;
        $this->suit = $suit;
    }

    public function toString()
    {
        return ('[' . $this->value . ' ' . $this->suit . ']');
    }

    public function getBlackjackValue()
    {
        if (is_numeric($this->value)) {
            return (int) $this->value;
        } elseif ($this->value == 'A') {
            return 11;
        } else {
            return 10;
        }
    }
}
