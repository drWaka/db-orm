<?php

class Database {
    private static $host = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $database = 'test_orm';
    private static $port = '3306';

    public static $connection;

    public function __construct() {

    }

    public static function connect() {
        try {
            self::$connection = new MySqli(self::$host, self::$username, self::$password, self::$database, self::$port);
        } catch (Exception $error) {
            echo "Error Encountered: {$error->getMessage}";
        }

        return self::$connection;
    }

    public static function query(string $query) {
        try {
            return self::connect()->query($query);
        } catch (Exception $error) {
            echo "Error Encountered: {$error->getMessage}";
        }
    }

    public static function sanitize($data){
        if (is_array($data)) {
            foreach($data as $key => $value) {
                $data[$key] = self::connect()->real_escape_string(self::sanitizeString()($value));
            }
            return $data;
        }
        return self::connect()->real_escape_string(self::sanitizeString($data));
    }

    private static function sanitizeString(string $str) : string {
        return htmlspecialchars(stripslashes(trim($str)));
    }

}