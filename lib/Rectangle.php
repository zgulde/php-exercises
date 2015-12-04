<?php

class Rectangle
{
    private $height;
    private $width;

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
        return $this->height * $this->width;
    }

    public function getPerimeter()
    {
        return (2 * $this->height) + (2 * $this->width);
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
        $this->height = $h;
    }

    private function setWidth($w)
    {
        $this->width = $w;
    }

}
