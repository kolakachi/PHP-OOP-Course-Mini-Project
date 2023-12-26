<?php
class Database {

    protected static $instance;
    protected static $connection;
    protected $query;
    protected $queryType;
    protected static $table;
    protected $values;

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
        return self::getInstance(); // Allow method chaining.
    }

    public function select() {
        $this->query = "SELECT * FROM " . self::$table;
        return $this;
    }

    public function where ($condition, $values = [] ) {
        $this->query .= " WHERE $condition";
        $this->values = $values;
        return $this;
    }

    public function update() {
        // Function for updating data in the database (to be implemented).
    }

    public function run()
    {
        $statement = self::$connection->prepare($this->query);
        $executed = $statement->execute($this->values);

        if ($executed) {
            $data = $statement->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) {
                return $data;
            }
        }

        return null;
    }
}