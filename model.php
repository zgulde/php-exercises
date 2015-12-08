<?php

class Model {

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        if (!self::$dbc)
        {
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        $table = static::$table;

        if ($this->id != '') {

            $id = $this->id;
            unset($this->attributes['id']);

            $updateStmt = [];
            $columns = array_keys($this->attributes);
            foreach ($columns as $key) {
                $updateStmt[] = "$key = :$key";
            }

            $updateStmt = implode(', ', $updateStmt);

            $query = "UPDATE $table SET $updateStmt WHERE id=$id";
            $stmt = static::$dbc->prepare($query);

            foreach ($this->attributes as $key => $value) {
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            $stmt->execute();

            $this->attributes['id'] = $id;

        } else {
            // without manually sorting the array, mysql does some sort of
            // sorting that screws up the order of the values inserted
            asort($this->attributes);

            $columns = array_keys($this->attributes);
            $paramatizedValues = [];
            foreach ($columns as $column) {
                $paramatizedValues[] = ":$column";
            }

            $columnNames = implode(', ', $columns);
            $paramatizedValues = implode(', ', $paramatizedValues);

            $query = "INSERT INTO $table ($columnNames) VALUES ($paramatizedValues)";
            $stmt = static::$dbc->prepare($query);

            // bind each value
            foreach ($this->attributes as $key => $value) {
                $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
            }

            $stmt->execute();
        }
        // @TODO: Ensure there are attributes before attempting to save
        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert
        // @TODO: Ensure that update is properly handled with the id key
        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        // @TODO: Use prepared statements to ensure data security
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        
        $table = static::$table;

        $query = "SELECT * from {$table} WHERE id = :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        

        // @TODO: Store the resultset in a variable named $result

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();

        // @TODO: Learning from the previous method, return all the matching records
        $table = static::$table;
        $query = "SELECT * FROM $table";
        $result = self::$dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

}
