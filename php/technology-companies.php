<?php

$companies = [
    'Sun Microsystems' => [
        'Vinod Khosla',
        'Bill Joy',
        'Andy Bechtolsheim',
        'Scott McNealy'
    ],
    'Silicon Graphics' => [
        'Jim Clark',
        'Ed McCracken'
    ],
    'Cray' => [
        'William Norris',
        'Seymour Cray'
    ],
    'NeXT' => [
        'Steve Jobs',
        'Avie Tevanian',
        'Joanna Hoffman',
        'Bud Tribble',
        'Susan Kare'
    ],
    'Acorn Computers' => [
        'Steve Furber',
        'Sophie Wilson',
        'Hermann Hauser',
        'Jim Mitchell'
    ],
    'MIPS Technologies' => [
        'Skip Stritter',
        'John L. Hennessy'
    ],
    'Commodore' => [
        'Yash Terakura',
        'Bob Russell',
        'Bob Yannes',
        'David A. Ziembicki',
        'Jay Miner'
    ],
    'Be Inc' => [
        'Steve Sakoman',
        'Jean-Louis Gassée'
    ]
];

// Sort the $companies array by company name and output the results.

// Sort the people in each company alphabetically. You will need to use a foreach loop and will need to reassign each inner array after sorting. Output the result.

// Sort the companies from "biggest" to "smallest". This may be easier than you think, but be sure you don't loose the company names!

echo PHP_EOL;
echo "======================================================================\n";
echo "> Displaying \$companies...\n";
echo "======================================================================\n";

print_r($companies);

echo "======================================================================\n";
echo "======================================================================\n";
echo PHP_EOL;
echo "======================================================================\n";
echo "> Sorting by company name...\n";
echo "======================================================================\n";

ksort($companies);
print_r($companies);

echo "======================================================================\n";
echo "======================================================================\n";
echo PHP_EOL;
echo "======================================================================\n";
echo "> Sorting people alphabetically\n";
echo "======================================================================\n";

foreach ($companies as &$people) {
    sort($people);
}
print_r($companies);

echo "======================================================================\n";
echo "======================================================================\n";
echo PHP_EOL;
echo "======================================================================\n";
echo "> Sorting companies from biggest to smallest...\n";
echo "======================================================================\n";

asort($companies);
print_r($companies);

echo "======================================================================\n";
echo "======================================================================\n";
echo PHP_EOL;





