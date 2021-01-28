<?php

class Person {
    private static $tableName = 'person';
    private static $id = 'PK_person';

    public static function index() : array {
        $tableName = self::$tableName;
        $query = "SELECT * FROM {$tableName}";
        return Database::query($query)->fetch_all();
    }

    public static function get(int $id) : array {

    }

    public static function update(int $id) : bool {

    }

    public static function delete(int $id) : bool {

    }

    public static function getByName(string $name) : array {
        return self::filter(array(
            "name" => $name
        ));
    }

    private static function filter(array $filter) : array {
        $where = '';
        
        if (isset($filter['name'])) {
            $filter['name'] = Database::sanitize($filter['name']);
            $where .= (strlen($where) > 0) ? "AND" : "WHERE";
            $where .= " name LIKE '%{$filter['name']}%' ";
        }

        $tableName = self::$tableName;
        $query = "SELECT * FROM {$tableName} {$where}";
        return Database::query($query)->fetch_all();
    }


}