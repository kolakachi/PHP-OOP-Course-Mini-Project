<?php

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});

define('DB_HOST', 'localhost');
define('DB_USER', 'your_db_username');
define('DB_PASSWORD', 'your_db_password');
define('DB_NAME', 'oop_db');