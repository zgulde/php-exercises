<?php

echo "<?php" . PHP_EOL;
echo "require_once 'lib/Rectangle.php';" . PHP_EOL . PHP_EOL;

for ($i=1; $i <= 12; $i++) { 
    for ($j=1; $j <= 12; $j++) { 
        echo 'echo "------------------------" . PHP_EOL;' . PHP_EOL;
        echo "echo \"Rectangle with width: $i and height: $j\" . PHP_EOL;" . PHP_EOL;
        echo "\$rect = new Rectangle($i, $j);" . PHP_EOL;
        echo 'echo "perimeter: {$rect->getPerimeter()}" . PHP_EOL;' . PHP_EOL;
        echo 'echo "area: {$rect->getArea()}" . PHP_EOL . PHP_EOL;' . PHP_EOL;
        echo PHP_EOL;
    }
}
