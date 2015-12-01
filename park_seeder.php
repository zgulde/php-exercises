<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'codeup');

require_once 'db_connect.php';

$nationalParks = [
    [
        'name' => 'Acadia', 'location' => 'Maine', 'date established' => '1919-02-26', 'area'  => '47389.67'
    ],
    [
        'name' => 'American Samoa', 'location' => 'AmericanSamoa', 'date established' => '1988-10-31', 'area'  => '9000.00'
    ],
    [
        'name' => 'Arches', 'location' => 'Utah', 'date established' => '1929-04-12', 'area'  => '76518.98'
    ],
    [
        'name' => 'Badlands', 'location' => 'SouthDakota', 'date established' => '1978-11-10', 'area'  => '242755.94'
    ],
    [
        'name' => 'Big Bend', 'location' => 'Texas', 'date established' => '1944-06-12', 'area'  => '801163.21'
    ],
    [
        'name' => 'Biscayne', 'location' => 'Florida', 'date established' => '1980-06-28', 'area'  => '172924.07'
    ],
    [
        'name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date established' => '1999-10-21', 'area'  => '32950.03'
    ],
    [
        'name' => 'Bryce Canyon', 'location' => 'Utah', 'date established' => '1928-02-25', 'area'  => '35835.08'
    ],
    [
        'name' => 'Canyonlands', 'location' => 'Utah', 'date established' => '1964-09-12', 'area'  => '337597.83'
    ],
    [
        'name' => 'Capitol Reef', 'location' => 'Utah', 'date established' => '1971-12-18', 'area'  => '241904.26'
    ],
    [
        'name' => 'Carlsbad Caverns', 'location' => 'New', 'date established' => '1930-05-14', 'area'  => '46766.45'
    ],
    [
        'name' => 'Channel Islands', 'location' => 'California', 'date established' => '1980-03-05', 'area'  => '249561.00'
    ],
    [
        'name' => 'Congaree', 'location' => 'South', 'date established' => '2003-11-10', 'area'  => '26545.86'
    ],
    [
        'name' => 'Crater Lake', 'location' => 'Oregon', 'date established' => '1902-05-22', 'area'  => '183224.05'
    ],
    [
        'name' => 'Cuyahoga Valley', 'location' => 'Ohio', 'date established' => '2000-10-11', 'area'  => '32860.73'
    ],
    [
        'name' => 'Death Valley', 'location' => 'California', 'date established' => '1994-10-31', 'area'  => '3372401.96'
    ],
    [
        'name' => 'Denali', 'location' => 'Alaska', 'date established' => '1917-02-26', 'area'  => '4740911.72'
    ],
    [
        'name' => 'Dry Tortugas', 'location' => 'Florida', 'date established' => '1992-10-26', 'area'  => '64701.22'
    ],
    [
        'name' => 'Everglades', 'location' => 'Florida', 'date established' => '1934-05-30', 'area'  => '1508537.90'
    ],
    [
        'name' => 'Gates of the Arctic', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '7523897.74'
    ],
    [
        'name' => 'Glacier', 'location' => 'Montana', 'date established' => '1910-05-11', 'area'  => '1013572.41'
    ],
    [
        'name' => 'Glacier Bay', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '3224840.31'
    ],
    [
        'name' => 'Grand Canyon', 'location' => 'Arizona', 'date established' => '1919-02-26', 'area'  => '1217403.32'
    ],
    [
        'name' => 'Grand Teton', 'location' => 'Wyoming', 'date established' => '1929-02-26', 'area'  => '309994.66'
    ],
    [
        'name' => 'Great Basin', 'location' => 'Nevada', 'date established' => '1986-10-27', 'area'  => '77180.00'
    ],
    [
        'name' => 'Great Sand Dunes', 'location' => 'Colorado', 'date established' => '2004-09-13', 'area'  => '42983.74'
    ],
    [
        'name' => 'Great Smoky Mountains', 'location' => 'North', 'date established' => '1934-06-15', 'area'  => '521490.13'
    ],
    [
        'name' => 'Guadalupe Mountains', 'location' => 'Texas', 'date established' => '1966-10-15', 'area'  => '86415.97'
    ],
    [
        'name' => 'Haleakalā', 'location' => 'Hawaii', 'date established' => '1916-08-01', 'area'  => '29093.67'
    ],
    [
        'name' => 'Hawaii Volcanoes', 'location' => 'Hawaii', 'date established' => '1916-08-01', 'area'  => '323431.38'
    ],
    [
        'name' => 'Hot Springs', 'location' => 'Arkansas', 'date established' => '1832-04-20', 'area'  => '5549.75'
    ],
    [
        'name' => 'Isle Royale', 'location' => 'Michigan', 'date established' => '1940-04-03', 'area'  => '571790.11'
    ],
    [
        'name' => 'Joshua Tree', 'location' => 'California', 'date established' => '1994-10-31', 'area'  => '789745.47'
    ],
    [
        'name' => 'Katmai', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '3674529.68'
    ],
    [
        'name' => 'Kenai Fjords', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '669982.99'
    ],
    [
        'name' => 'Kings Canyon', 'location' => 'California', 'date established' => '1940-03-04', 'area'  => '461901.20'
    ],
    [
        'name' => 'Kobuk Valley', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '1750716.50'
    ],
    [
        'name' => 'Lake Clark', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '2619733.21'
    ],
    [
        'name' => 'Lassen Volcanic', 'location' => 'California', 'date established' => '1916-08-09', 'area'  => '106372.36'
    ],
    [
        'name' => 'Mammoth Cave', 'location' => 'Kentucky', 'date established' => '1941-07-01', 'area'  => '52830.19'
    ],
    [
        'name' => 'Mesa Verde', 'location' => 'Colorado', 'date established' => '1906-06-29', 'area'  => '52121.93'
    ],
    [
        'name' => 'Mount Rainier', 'location' => 'Washington', 'date established' => '1899-03-02', 'area'  => '235625.00'
    ],
    [
        'name' => 'North Cascades', 'location' => 'Washington', 'date established' => '1968-10-02', 'area'  => '504780.94'
    ],
    [
        'name' => 'Olympic', 'location' => 'Washington', 'date established' => '1938-06-29', 'area'  => '922650.86'
    ],
    [
        'name' => 'Petrified Forest', 'location' => 'Arizona', 'date established' => '1962-12-09', 'area'  => '93532.57'
    ],
    [
        'name' => 'Pinnacles', 'location' => 'California', 'date established' => '2013-01-10', 'area'  => '26605.73'
    ],
    [
        'name' => 'Redwood', 'location' => 'California', 'date established' => '1968-10-02', 'area'  => '112512.05'
    ],
    [
        'name' => 'Rocky Mountain', 'location' => 'Colorado', 'date established' => '1915-01-26', 'area'  => '265828.41'
    ],
    [
        'name' => 'Saguaro', 'location' => 'Arizona', 'date established' => '1994-10-14', 'area'  => '91439.71'
    ],
    [
        'name' => 'Sequoia', 'location' => 'California', 'date established' => '1890-09-25', 'area'  => '404051.17'
    ],
    [
        'name' => 'Shenandoah', 'location' => 'Virginia', 'date established' => '1926-05-22', 'area'  => '199045.23'
    ],
    [
        'name' => 'Theodore Roosevelt', 'location' => 'NorthDakota', 'date established' => '1978-11-10', 'area'  => '70446.89'
    ],
    [
        'name' => 'Virgin Islands', 'location' => 'VirginIslands', 'date established' => '1956-08-02', 'area'  => '14688.87'
    ],
    [
        'name' => 'Voyageurs', 'location' => 'Minnesota', 'date established' => '1971-01-08', 'area'  => '218200.17'
    ],
    [
        'name' => 'Wind Cave', 'location' => 'SouthDakota', 'date established' => '1903-01-09', 'area'  => '28295.03'
    ],
    [
        'name' => 'Wrangell', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '8323147.59'
    ],
    [
        'name' => 'Yellowstone', 'location' => 'Wyoming,', 'date established' => '1872-03-01', 'area'  => '2219790.71'
    ],
    [
        'name' => 'Yosemite', 'location' => 'California', 'date established' => '1890-10-01', 'area'  => '761266.19'
    ],
    [
        'name' => 'Zion', 'location' => 'Utah', 'date established' => '1919-11-19', 'area'  => '146597.60'
    ]
];

$dbc->exec('TRUNCATE national_parks');

foreach ($nationalParks as $park) {
    $query = 'INSERT INTO national_parks (name, location, date_established, area_in_acres)';
    $query .= "VALUES (\"${park['name']}\", \"${park['location']}\", \"${park['date established']}\", ${park['area']})";
    $dbc->exec($query);
    echo 'id: ' . $dbc->lastInsertId() . PHP_EOL;
}
