<?php

spl_autoload_register(function ($className) {
    include 'classes/' . $className . '.php';
});

define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'oop_db');