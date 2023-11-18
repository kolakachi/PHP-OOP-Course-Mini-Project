<?php
class Database {

    protected static $instance;
    protected $connection;
    protected $query;
    protected $queryType;
    protected static $table;

    // Create a database connection.
    public function __construct() {
        try {
            $string = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            self::$connection = new PDO($string, DB_USER, DB_PASSWORD);
        } catch (PDOException $error) {
            die("Connection failed: " . $error->getMessage());
        }
    }

    // Singleton design pattern to create a single instance.
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function table($table) {
        self::$table = $table;
        return "yesss";//self::$instance; // Allow method chaining.
    }

    public function select() {
        // Function for reading data from the database (to be implemented).
    }

    public function update() {
        // Function for updating data in the database (to be implemented).
    }

    protected function run() {
        // Internal function for executing SQL queries (to be implemented).
    }
}