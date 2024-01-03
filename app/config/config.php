<?php

//Database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'brgy_washington');

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT (Dynamic links)
define('URLROOT', 'http://localhost/brgywashington');

define('PATHROOT', 'brgywashington/public');

//Sitename
define('SITENAME','Barangay <?php echo htmlspecialchars($brgy_name); ?>');