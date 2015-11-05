 <?php
echo PHP_EOL;
// Set the default timezone
date_default_timezone_set('America/Chicago');

// Get Day of Week as number
// 1 (for Monday) through 7 (for Sunday)
$dayOfWeek = date('N');

echo "|========================================|\n";
echo "|          Today is ";

switch($dayOfWeek) {
    case 1:
        echo "Monday               |\n";
        break;
    case 2:
        echo "Tuesday              |\n";
        break;
    case 3:
        echo "Wednesday            |\n";
        break;
    case 4:
        echo "Thursday             |\n";
        break;
    case 5:
        echo "Friday               |\n";
        break;
    case 6:
        echo "Saturday             |\n";
        break;
    case 7:
        echo "Sunday               |\n";
        break;
}

echo "|========================================|\n";

echo PHP_EOL;