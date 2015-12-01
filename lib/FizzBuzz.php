<?php 

define('FIZZBUZZ_STARTING_NUMBER', 1);

class FizzBuzz
{

    public $displayedMessage = '';

    /**
     * does fizzbuzz from the $starting number to the parameter passed to the
     *    constructor
     * @param int $lastFizzBuzzNumber the highest number to do fizzbuzz for
     */
    public function __construct($lastFizzBuzzNumber){
        for ($currentNumber = FIZZBUZZ_STARTING_NUMBER; $currentNumber <= $lastFizzBuzzNumber; $currentNumber = $currentNumber + 1)
        {

            if ($this->isDivisibleByThree($currentNumber) && !$this->isDivisibleByFive($currentNumber)) 
            {
                $this->displayedMessage = 'fizz';
            } 
            elseif ($this->isDivisibleByFive($currentNumber) && !$this->isDivisibleByThree($currentNumber)) 
            {
                $this->displayedMessage = 'buzz';
            } 
            elseif ($this->isDivisibleByThreeAndFive($currentNumber)) 
            {
                $this->displayedMessage = 'fizzbuzz';
            } 
            else 
            {
                $this->displayedMessage = $currentNumber;
            }

            echo $this->displayedMessage;
            echo PHP_EOL;

        }
    }

    /**
     * Takes a number and checks to see if the given number is divisible by
     *    three
     * @param  int  $numberToCheck the number to check
     * @return boolean                whether or not the number is divisible by
     *                                three
     */
    public function isDivisibleByThree($numberToCheck)
    {
        if ($numberToCheck % 3 == 0)
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    /**
     * Takes a number and checks to see if the given number is divisible by
     *    five
     *    
     * @param  int  $numberToCheck the number to check
     * @return boolean                whether or not the number is divisible by
     *                                five
     */
    public function isDivisibleByFive($numberToCheck)
    {
        if ($numberToCheck % 5 == 0)
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    /**
     * takes a number and checks to see if it is divisible by three and five
     * 
     * @param  int  $numberToCheck the number to check
     * @return boolean                whether or not the number is divisible by
     *                                three and five
     */
    public function isDivisibleByThreeAndFive($numberToCheck)
    {
        $isDivisibleByThree = $this->isDivisibleByThree($numberToCheck);
        $isDivisibleByFive = $this->isDivisibleByFive($numberToCheck);

        if ($isDivisibleByThree && $isDivisibleByFive) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}

