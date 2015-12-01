<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'codeup');

require_once 'db_connect.php';

$nationalParks = 
[
    [
        'name' => 'Acadia', 'location' => 'Maine', 'date established' => '1919-02-26', 'area'  => '47389.67', 'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'
    ],
    [
        'name' => 'American Samoa', 'location' => 'American Samoa', 'date established' => '1988-10-31', 'area'  => '9000.00', 'description' => 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.'
    ],
    [
        'name' => 'Arches', 'location' => 'Utah', 'date established' => '1929-04-12', 'area'  => '76518.98', 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.'
    ],
    [
        'name' => 'Badlands', 'location' => 'South Dakota', 'date established' => '1978-11-10', 'area'  => '242755.94', 'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the worlds richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.'
    ],
    [
        'name' => 'Big Bend', 'location' => 'Texas', 'date established' => '1944-06-12', 'area'  => '801163.21', 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.'
    ],
    [
        'name' => 'Biscayne', 'location' => 'Florida', 'date established' => '1980-06-28', 'area'  => '172924.07', 'description' => 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon.'
    ],
    [
        'name' => 'Black Canyon of the Gunnison', 'location' => 'Colorado', 'date established' => '1999-10-21', 'area'  => '32950.03', 'description' => 'The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing. The deep, narrow canyon, made of gneiss and schist, is often in shadow and therefore appears black.'
    ],
    [
        'name' => 'Bryce Canyon', 'location' => 'Utah', 'date established' => '1928-02-25', 'area'  => '35835.08', 'description' => 'Bryce Canyon is a giant geological amphitheater on the Paunsaugunt Plateau. The unique area has hundreds of tall sandstone hoodoos formed by erosion. The region was originally settled by Native Americans and later by Mormon pioneers.'
    ],
    [
        'name' => 'Canyonlands', 'location' => 'Utah', 'date established' => '1964-09-12', 'area'  => '337597.83', 'description' => 'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples.'
    ],
    [
        'name' => 'Capitol Reef', 'location' => 'Utah', 'date established' => '1971-12-18', 'area'  => '241904.26', 'description' => 'The parks Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the earths diverse geologic layers. Other natural features are monoliths, sandstone domes, and cliffs shaped like the United States Capitol.'
    ],
    [
        'name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date established' => '1930-05-14', 'area'  => '46766.45', 'description' => 'Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long. The Big Room is almost 4,000 feet (1,200 m) long, and the caves are home to over 400,000 Mexican free-tailed bats and sixteen other species. Above ground are the Chihuahuan Desert and Rattlesnake Springs.'
    ],
    [
        'name' => 'Channel Islands', 'location' => 'California', 'date established' => '1980-03-05', 'area'  => '249561.00', 'description' => 'Five of the eight Channel Islands are protected, and half of the parks area is underwater. The islands have a unique Mediterranean ecosystem originally settled by the Chumash people. They are home to over 2,000 species of land plants and animals, and 145 are unique to them, including the island fox. Professional ferry services offer transportation to the islands from the mainland.'
    ],
    [
        'name' => 'Congaree', 'location' => 'South Carolina', 'date established' => '2003-11-10', 'area'  => '26545.86', 'description' => 'On the Congaree River, this park is the largest portion of old-growth floodplain forest left in North America. Some of the trees are the tallest in the Eastern US. An elevated walkway called the Boardwalk Loop guides visitors through the swamp.'
    ],
    [
        'name' => 'Crater Lake', 'location' => 'Oregon', 'date established' => '1902-05-22', 'area'  => '183224.05', 'description' => 'Crater Lake lies in the caldera of an ancient volcano called Mount Mazama that collapsed 7,700 years ago. It is the deepest lake in the United States and is famous for its vivid blue color and water clarity. There are two more recent volcanic islands in the lake, and, with no inlets or outlets, all water comes through precipitation.'
    ],
    [
        'name' => 'Cuyahoga Valley', 'location' => 'Ohio', 'date established' => '2000-10-11', 'area'  => '32860.73', 'description' => 'This park along the Cuyahoga River has waterfalls, hills, trails, and exhibits on early rural living. The Ohio and Erie Canal Towpath Trail follows the Ohio and Erie Canal, where mules towed canal boats. The park has numerous historic homes, bridges, and structures,[21] and also offers a scenic train ride.'
    ],
    [
        'name' => 'Death Valley', 'location' => 'California, Nevada', 'date established' => '1994-10-31', 'area'  => '3372401.96', 'description' => 'Death Valley is the hottest, lowest, and driest place in the United States. Daytime temperatures have topped 130 °F (54 °C) and it is home to Badwater Basin, the lowest elevation in North America. A diversity of colorful canyons, desolate badlands, shifting sand dunes, sprawling mountains, and over 1000 species of plants populate this geologic graben. Additional points of interest include salt flats, historic mines, and springs.'
    ],
    [
        'name' => 'Denali', 'location' => 'Alaska', 'date established' => '1917-02-26', 'area'  => '4740911.72', 'description' => 'Centered around Denali, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake. Denali and other peaks of the Alaska Range are covered with long glaciers and boreal forest. Wildlife includes grizzly bears, Dall sheep, caribou, and gray wolves.'
    ],
    [
        'name' => 'Dry Tortugas', 'location' => 'Florida', 'date established' => '1992-10-26', 'area'  => '64701.22', 'description' => 'The islands of the Dry Tortugas, at the westernmost end of the Florida Keys, are the site of Fort Jefferson, a Civil War-era fort that is the largest masonry structure in the Western Hemisphere. With most of the park being remote ocean, it is home to undisturbed coral reefs and shipwrecks and is only accessible by plane or boat.'
    ],
    [
        'name' => 'Everglades', 'location' => 'Florida', 'date established' => '1934-05-30', 'area'  => '1508537.90', 'description' => 'The Everglades are the largest tropical wilderness in the United States, and it encompasses a large expanse of tropical rainforest and savanna. This mangrove ecosystem and marine estuary is home to 36 protected species, including the Florida panther, American crocodile, and West Indian manatee. Some areas have been drained and developed; restoration projects aim to restore the ecology.'
    ],
    [
        'name' => 'Gates of the Arctic', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '7523897.74', 'description' => 'The countrys northernmost park protects an expanse of pure wilderness in Alaskas Brooks Range and has no park facilities. The land is home to Alaska natives, who have relied on the land and caribou for 11,000 years.'
    ],
    [
        'name' => 'Glacier', 'location' => 'Montana', 'date established' => '1910-05-11', 'area'  => '1013572.41', 'description' => 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers. The local mountains, formed by an overthrust, expose the worlds best-preserved sedimentary fossils from the Proterozoic era.'
    ],
    [
        'name' => 'Glacier Bay', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '3224840.31', 'description' => 'Glacier Bay has numerous tidewater glaciers, mountains, fjords, and a temperate rainforest, and is home to large populations of grizzly bears, mountain goats, whales, seals, and eagles. When discovered in 1794 by George Vancouver, the entire bay was covered in ice, but the glaciers have since receded more than 65 miles (105 km).'
    ],
    [
        'name' => 'Grand Canyon', 'location' => 'Arizona', 'date established' => '1919-02-26', 'area'  => '1217403.32', 'description' => 'The Grand Canyon, carved by the mighty Colorado River, is 277 miles (446 km) long, up to 1 mile (1.6 km) deep, and up to 15 miles (24 km) wide. Millions of years of erosion have exposed the colorful layers of the Colorado Plateau in countless mesas and canyon walls, visible from both the north and south rims, or from a number of trails that descend into the canyon itself.'
    ],
    [
        'name' => 'Grand Teton', 'location' => 'Wyoming', 'date established' => '1929-02-26', 'area'  => '309994.66', 'description' => 'Grand Teton is the tallest mountain in the Teton Range. The parks historic Jackson Hole and reflective piedmont lakes teem with unique wildlife and contrast with the dramatic mountains, which rise abruptly from the sage-covered valley below.'
    ],
    [
        'name' => 'Great Basin', 'location' => 'Nevada', 'date established' => '1986-10-27', 'area'  => '77180.00', 'description' => 'Based around Nevadas second tallest mountain, Wheeler Peak, Great Basin National Park contains 5,000-year-old bristlecone pines, a rock glacier, and the limestone Lehman Caves. It also enjoys some of the countrys darkest night skies. Animals which call the park home include Townsends big-eared bat, pronghorn, and Bonneville cutthroat trout.'
    ],
    [
        'name' => 'Great Sand Dunes', 'location' => 'Colorado', 'date established' => '2004-09-13', 'area'  => '42983.74', 'description' => 'The tallest sand dunes in North America, up to 750 feet (230 m) tall, were formed by deposits of the ancient Rio Grande in the San Luis Valley. Abutting a variety of grasslands, shrublands, and wetlands, the park also has alpine lakes, six 13,000-foot mountains, and old-growth forests.'
    ],
    [
        'name' => 'Great Smoky Mountains', 'location' => 'North Carolina, Tennessee', 'date established' => '1934-06-15', 'area'  => '521490.13', 'description' => 'The Great Smoky Mountains, part of the Appalachian Mountains, span a wide range of elevations, making them home to over 400 vertebrate species, 100 tree species, and 5000 plant species. Hiking is the parks main attraction, with over 800 miles (1,300 km) of trails, including 70 miles (110 km) of the Appalachian Trail. Other activities include fishing, horseback riding, and touring nearly 80 historic structures.'
    ],
    [
        'name' => 'Guadalupe Mountains', 'location' => 'Texas', 'date established' => '1966-10-15', 'area'  => '86415.97', 'description' => 'This park boasts Guadalupe Peak, the highest point in Texas; the scenic McKittrick Canyon filled with bigtooth maples; a corner of the arid Chihuahuan Desert; and a fossilized coral reef from the Permian era.'
    ],
    [
        'name' => 'Haleakalā', 'location' => 'Hawaii', 'date established' => '1916-08-01', 'area'  => '29093.67', 'description' => 'The Haleakalā volcano on Maui features a very large crater with numerous cinder cones, Hosmers Grove of alien trees, the Kipahulu sections scenic pools of freshwater fish, and the native Hawaiian goose. It is home to the greatest number of endangered species within a U.S. National Park.'
    ],
    [
        'name' => 'Hawaii Volcanoes', 'location' => 'Hawaii', 'date established' => '1916-08-01', 'area'  => '323431.38', 'description' => 'This park on the Big Island protects the famous Kīlauea and Mauna Loa volcanoes, two of the worlds most active geological features. Diverse ecosystems range from tropical forests at sea level to barren lava beds at more than 13,000 feet (4,000 m).'
    ],
    [
        'name' => 'Hot Springs', 'location' => 'Arkansas', 'date established' => '1832-04-20', 'area'  => '5549.75', 'description' => 'Hot Springs was established by act of congress as a federal reserve on April 20, 1832, as such it is the oldest park managed by the National Park Service. Congress changed the reserves designation to National Park on March 4, 1921 after the National Park Service was established in 1916. Amid some controversy, using 1921 as its official established date is inconsistent considering Yellowstone and other parks still readily use their pre-National Park Service dates, yet were not officially national parks at the time of their establishment.[38] Hot Springs is the smallest and only National Park in an urban area and is based around natural hot springs that flow out of the low lying Ouachita Mountains. The springs provide opportunities for relaxation in an historic setting; Bathhouse Row preserves numerous examples of 19th-century architecture.'
    ],
    [
        'name' => 'Isle Royale', 'location' => 'Michigan', 'date established' => '1940-04-03', 'area'  => '571790.11', 'description' => 'The largest island in Lake Superior is a place of isolation and wilderness. Along with its many shipwrecks, waterways, and hiking trails, the park also includes over 400 smaller islands within 4.5 miles (7.2 km) of its shores. There are only 20 mammal species on the entire island, though the relationship between its wolf and moose populations is especially unique.'
    ],
    [
        'name' => 'Joshua Tree', 'location' => 'California', 'date established' => '1994-10-31', 'area'  => '789745.47', 'description' => 'Covering large areas of the Colorado and Mojave Deserts and the Little San Bernardino Mountains, this exotic desert landscape is populated by vast stands of the famous Joshua tree. Great changes in elevation reveal starkly contrasting environments including bleached sand dunes, dry lakes, rugged mountains, and maze-like clusters of monzogranite monoliths.'
    ],
    [
        'name' => 'Katmai', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '3674529.68', 'description' => 'This park on the Alaska Peninsula protects the Valley of Ten Thousand Smokes, an ash flow formed by the 1912 eruption of Novarupta, as well as Mount Katmai. Over 2,000 grizzly bears come here each year to catch spawning salmon. Other wildlife includes caribou, wolves, moose, and wolverines.'
    ],
    [
        'name' => 'Kenai Fjords', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '669982.99', 'description' => 'Near Seward on the Kenai Peninsula, this park protects the Harding Icefield and at least 38 glaciers and fjords stemming from it. The only area accessible to the public by road is Exit Glacier; the rest must be viewed from boat tours.'
    ],
    [
        'name' => 'Kings Canyon', 'location' => 'California', 'date established' => '1940-03-04', 'area'  => '461901.20', 'description' => 'Home to several giant sequoia groves and the General Grant Tree, the worlds second largest, this park also features part of the Kings River, sculptor of the dramatic granite canyon that is its namesake, and the San Joaquin River, as well as Boyden Cave.'
    ],
    [
        'name' => 'Kobuk Valley', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '1750716.50', 'description' => 'Kobuk Valley protects 61 miles (98 km) of the Kobuk River and three regions of sand dunes. Created by glaciers, the Great Kobuk, Little Kobuk, and Hunt River Sand Dunes can reach 100 feet (30 m) high and 100 °F (38 °C), and they are the largest dunes in the Arctic. Twice a year, half a million caribou migrate through the dunes and across river bluffs that expose well-preserved ice age fossils.'
    ],
    [
        'name' => 'Lake Clark', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '2619733.21', 'description' => 'The region around Lake Clark features four active volcanoes, including Mount Redoubt, as well as an abundance of rivers, glaciers, and waterfalls. Temperate rainforests, a tundra plateau, and three mountain ranges fill in the remaining landscape.'
    ],
    [
        'name' => 'Lassen Volcanic', 'location' => 'California', 'date established' => '1916-08-09', 'area'  => '106372.36', 'description' => 'Lassen Peak, the largest plug dome volcano in the world, is joined by all three other types of volcanoes in this park: shield, cinder dome, and composite. Though Lassen itself last erupted in 1915, most of the rest of the park is continuously active: numerous hydrothermal features, including fumaroles, boiling pools, and bubbling mud pots, are heated by molten rock from beneath the peak.'
    ],
    [
        'name' => 'Mammoth Cave', 'location' => 'Kentucky', 'date established' => '1941-07-01', 'area'  => '52830.19', 'description' => 'With more than 400 miles (640 km) of passageways explored, Mammoth Cave is by far the worlds longest cave system. Subterranean wildlife includes eight bat species, Kentucky cave shrimp, Northern cavefish, and cave salamanders. Above ground, the park provides recreation on the Green River, 70 miles of hiking trails, and plenty of sinkholes and springs.'
    ],
    [
        'name' => 'Mesa Verde', 'location' => 'Colorado', 'date established' => '1906-06-29', 'area'  => '52121.93', 'description' => 'This area constitutes over 4,000 archaeological sites of the Ancestral Puebloan people, who lived here and elsewhere in the Four Corners region for at least 700 years. Cliff dwellings built in the 12th and 13th centuries include the famous Cliff Palace, which has 150 rooms and 23 kivas, and the Balcony House, with its many passages and tunnels.'
    ],
    [
        'name' => 'Mount Rainier', 'location' => 'Washington', 'date established' => '1899-03-02', 'area'  => '235625.00', 'description' => 'Mount Rainier, an active stratovolcano, is the most prominent peak in the Cascades, and is covered by 26 named glaciers including Carbon Glacier and Emmons Glacier, the largest in the continental United States. The mountain is popular for climbing, and more than half of the park is covered by subalpine and alpine forests. Paradise on the south slope is one of the snowiest places in the world, and the Longmire visitor center is the start of the Wonderland Trail, which encircles the mountain.'
    ],
    [
        'name' => 'North Cascades', 'location' => 'Washington', 'date established' => '1968-10-02', 'area'  => '504780.94', 'description' => 'This complex encompasses two units of the national park itself as well as the Ross Lake and Lake Chelan National Recreation Areas. The highly glaciated mountains are spectacular examples of Cascade geology; popular hiking and climbing areas include Cascade Pass, Mount Shuksan, Mount Triumph, and Eldorado Peak.'
    ],
    [
        'name' => 'Olympic', 'location' => 'Washington', 'date established' => '1938-06-29', 'area'  => '922650.86', 'description' => 'Situated on the Olympic Peninsula, this park straddles a diversity of ecosystems from Pacific shoreline to temperate rainforests to the alpine slopes of Mount Olympus. The scenic Olympic Mountains overlook the Hoh Rain Forest and Quinault Rain Forest, the wettest area in the continental United States.'
    ],
    [
        'name' => 'Petrified Forest', 'location' => 'Arizona', 'date established' => '1962-12-09', 'area'  => '93532.57', 'description' => 'This portion of the Chinle Formation has a great concentration of 225-million-year-old petrified wood. The surrounding Painted Desert features eroded cliffs of wonderfully red-hued volcanic rock called bentonite. There are also dinosaur fossils and over 350 Native American sites.'
    ],
    [
        'name' => 'Pinnacles', 'location' => 'California', 'date established' => '2013-01-10', 'area'  => '26605.73', 'description' => 'Named for the eroded leftovers of a portion of an extinct volcano, the park is famous for its massive black and gold monoliths of andesite and rhyolite, which are popular with rock climbers, and a hikers paradise of quiet trails crossing scenic Coast Range wilderness. The park is home to the endangered California condor (Gymnogyps californianus) and one of the few locations in the world where these extremely rare birds can be seen in the wild. Pinnacles also supports a dense population of prairie falcons, and more than 13 species of bat which populate its talus caves.'
    ],
    [
        'name' => 'Redwood', 'location' => 'California', 'date established' => '1968-10-02', 'area'  => '112512.05', 'description' => 'This park and the co-managed state parks protect almost half of all remaining coastal redwoods, the tallest trees on earth. There are three large river systems in this very seismically active area, and 37 miles (60 km) of protected coastline reveal tide pools and seastacks. The prairie, estuary, coast, river, and forest ecosystems contain a huge variety of animal and plant species.'
    ],
    [
        'name' => 'Rocky Mountain', 'location' => 'Colorado', 'date established' => '1915-01-26', 'area'  => '265828.41', 'description' => 'Bisected north to south by the Continental Divide, this portion of the Rockies has ecosystems varying from over 150 riparian lakes to montane and subalpine forests to treeless alpine tundra. Wildlife including mule deer, bighorn sheep, black bears, and cougars inhabit its igneous mountains and glacier valleys. Longs Peak, a classic Colorado fourteener, and the scenic Bear Lake are popular destinations, as well as the famous Trail Ridge Road, which reaches an elevation of more than 12,000 feet (3,700 m).'
    ],
    [
        'name' => 'Saguaro', 'location' => 'Arizona', 'date established' => '1994-10-14', 'area'  => '91439.71', 'description' => 'Split into the separate Rincon Mountain and Tucson Mountain districts, this park is evidence that the dry Sonoran Desert is still home to a great variety of life spanning six biotic communities. Beyond the namesake giant saguaro cacti, there are barrel cacti, chollas, and prickly pears, as well as lesser long-nosed bats, spotted owls, and javelinas.'
    ],
    [
        'name' => 'Sequoia', 'location' => 'California', 'date established' => '1890-09-25', 'area'  => '404051.17', 'description' => 'This park protects the Giant Forest, which boasts some of the worlds largest trees, the General Sherman being the largest in the park. It also has over 240 caves, a scenic segment of the Sierra Nevada including the tallest mountain in the contiguous United States, and Moro Rock, a photogenic granite dome.'
    ],
    [
        'name' => 'Shenandoah', 'location' => 'Virginia', 'date established' => '1926-05-22', 'area'  => '199045.23', 'description' => 'Shenandoahs Blue Ridge Mountains are covered by sprawling hardwood forests that teem with tens of thousands of animals. The Skyline Drive and Appalachian Trail run the entire length of this narrow park, along with more than 500 miles (800 km) of hiking trails passing scenic overlooks and cataracts of the Shenandoah River.'
    ],
    [
        'name' => 'Theodore Roosevelt', 'location' => 'North Dakota', 'date established' => '1978-11-10', 'area'  => '70446.89', 'description' => 'This region that enticed and influenced President Theodore Roosevelt consists of a park of three units in the northern badlands. Besides Roosevelts historic cabin, there are numerous scenic drives and backcountry hiking opportunities. Wildlife includes American bison, pronghorn, bighorn sheep, and wild horses.'
    ],
    [
        'name' => 'Virgin Islands', 'location' => 'United States Virgin Islands', 'date established' => '1956-08-02', 'area'  => '14688.87', 'description' => 'The island of Saint John has rich human and natural histories. Taíno archaeological sites and ruins of sugar plantations from Columbus time litter the coast. Past the pristine beaches are mangrove forests, seagrass beds, coral reefs, and vast algal plains.'
    ],
    [
        'name' => 'Voyageurs', 'location' => 'Minnesota', 'date established' => '1971-01-08', 'area'  => '218200.17', 'description' => 'This park protecting four lakes near the Canadian border is a site for canoeing, kayaking, and fishing, and preserves a history populated by Ojibwe Native Americans, French fur traders called voyageurs, and ambitious gold-miners. Formed by glaciers, the region features tall bluffs, rock gardens, scenic islands and bays, and several historic buildings.'
    ],
    [
        'name' => 'Wind Cave', 'location' => 'South Dakota', 'date established' => '1903-01-09', 'area'  => '28295.03', 'description' => 'Wind Cave is distinctive for its calcite fin formations called boxwork and needle-like growths called frostwork. The cave, which was discovered by a sound like that of wind coming from a hole in the ground, is the worlds densest cave system. Above ground is a mixed-grass prairie with animals such as bison, black-footed ferrets, and prairie dogs.[63] and ponderosa pine forests home to cougars and elk.'
    ],
    [
        'name' => 'Wrangell –St. Elias', 'location' => 'Alaska', 'date established' => '1980-12-02', 'area'  => '8323147.59', 'description' => 'An immense plot of mountainous country protects the convergence of the Alaska, Chugach, and Wrangell-Saint Elias Ranges, which include many of the continents tallest mountains and volcanoes, including the 18,008-foot Mount Saint Elias. More than a quarter of the park is covered with glaciers, including the tidewater Hubbard Glacier, piedmont Malaspina Glacier, and valley Nabesna Glacier.'
    ],
    [
        'name' => 'Yellowstone', 'location' => 'Wyoming, Montana, Idaho', 'date established' => '1872-03-01', 'area'  => '2219790.71', 'description' => 'Situated on the Yellowstone Caldera, the park has an expansive network of geothermal areas including vividly colored hot springs, boiling mud pots, and regularly erupting geysers, the best-known being Old Faithful and Grand Prismatic Spring. The yellow-hued Grand Canyon of the Yellowstone River has a number of scenic waterfalls, and four mountain ranges run through the park. More than 60 mammal species, including the gray wolf, grizzly bear, lynx, bison, and elk, make this park one of the best wildlife viewing spots in the country.'
    ],
    [
        'name' => 'Yosemite', 'location' => 'California', 'date established' => '1890-10-01', 'area'  => '761266.19', 'description' => 'Among the earliest candidates for National Park status, Yosemite features towering granite cliffs, dramatic waterfalls, and old-growth forests at a unique intersection of geology and hydrology. Half Dome and El Capitan rise from the parks centerpiece, the glacier-carved Yosemite Valley, and from its vertical walls drop Yosemite Falls, North Americas tallest waterfall. Three giant sequoia groves, along with a pristine wilderness in the heart of the Sierra Nevada, are home to an abundance of rare plant and animal species.'
    ],
    [
        'name' => 'Zion', 'location' => 'Utah', 'date established' => '1919-11-19', 'area'  => '146597.60', 'description' => 'Located at the junction of the Colorado Plateau, Great Basin, and Mojave Desert, this geological wonder has colorful sandstone canyons, mountainous mesas, and countless rock towers. Natural arches and exposed plateau formations compose a large wilderness roughly divided into four ecosystems: desert, riparian, woodland, and coniferous forest.'
    ]
];

$dbc->exec('TRUNCATE national_parks');
echo 'national_parks truncated!';

echo 'Inserting values...' . PHP_EOL;
foreach ($nationalParks as $park) {
    $query = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description)';
    $query .= "VALUES (\"${park['name']}\", \"${park['location']}\", \"${park['date established']}\", ${park['area']}, \"${park['description']}\")";
    $dbc->exec($query);
    echo 'inserted value with id: ' . $dbc->lastInsertId() . PHP_EOL;
}

echo 'Done!' . PHP_EOL;
