<?php

class Square extends Rectangle
{

    public function __construct($height)
    {
        parent::__construct($height, $height);
    }

    public function getArea()
    {
        return $this->getHeight() * $this->getHeight();
    }

    public function getPerimeter()
    {
        return 4 * $this->getHeight();
    }
}
