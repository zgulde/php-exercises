<?php

class Rectangle
{
    private $height;
    private $width;

    public static function doStuff()
    {
        return 'did stuff!';
    }

    public function __construct($height, $width)
    {
        if (!is_numeric($height) && !is_numeric($width)) {
            echo 'Error, height and width are not numeric!!!' . PHP_EOL;
            die();
        }

        $this->setHeight($height);
        $this->setWidth($width);
    }

    public function getArea()
    {
        return $this->getHeight() * $this->getWidth();
    }

    public function getPerimeter()
    {
        return (2 * $this->getHeight()) + (2 * $this->getWidth());
    }

    protected function getHeight()
    {
        return $this->height;
    }

    protected function getWidth()
    {
        return $this->width;
    }

    private function setHeight($h)
    {
        if (is_numeric($h) && !empty($h)) {
            $this->height = $h;
        } else {
            echo "Error in input '$h'" . PHP_EOL;
        }
    }

    private function setWidth($w)
    {
        if (is_numeric($w) && !empty($w)) {
            $this->height = $w;
        } else {
            echo "Error in input '$w'" . PHP_EOL;
        }
    }

}
