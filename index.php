<?php
// test git nè
session_start();

define('ASSET', 'assets/');
define('SOURCE', 'source/');
define('TEMPLATE', 'template/');
define('LAYOUT', 'layout/');

// config
require_once 'config.php';

// Session
require_once SOURCE . "session.php";

// Database
require_once SOURCE . "database.php";

// Function
require_once SOURCE . "function.php";

// Khởi tạo
$f = new func();
$db = new Database();


require_once SOURCE . 'router.php';

require_once TEMPLATE . 'index.php';