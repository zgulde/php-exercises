<?php
require_once 'lib/Rectangle.php';
require_once 'lib/Square.php';

$r = new Rectangle(3, 4);

echo 'Rectangle w/ dimensions 3 x 4' . PHP_EOL;
echo "perimeter: {$r->getPerimeter()}" . PHP_EOL;
echo "area: {$r->getArea()}" . PHP_EOL;

echo '---------------------' . PHP_EOL;

$s = new Square(5);

echo 'Square with side 5' . PHP_EOL;
echo "perimeter: {$s->getPerimeter()}" . PHP_EOL;
echo "area: {$s->getArea()}" . PHP_EOL;
