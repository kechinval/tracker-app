<?php

namespace App\Database;

use mysqli;

class Database {

    private $db_host;
    private $db_user;
    private $db_password;
    private $db_database;
    private $connection;

    public function __construct() {
        $this->db_host = $_ENV['MYSQL_HOST'];
        $this->db_user = $_ENV['MYSQL_USER'];
        $this->db_password = $_ENV['MYSQL_PASSWORD'];
        $this->db_database = $_ENV['MYSQL_DATABASE'];
        $this->connect();
}

    public function connect() {
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_database);
        if ($this->connection->connect_error) {
            return false;
        }
        return true;
    }

    public function disconnect() {
        if ($this->connection) {
            if ($this->connection->close()) {
                return true;
            }
            return false;
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);
        if ($result) {
            return $result;
        }
        $this->disconnect();
        return false;
    }

    public function select($table, $rows = '*', $where = null, $order = null, $limit = null) {
        $sql = "SELECT $rows FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        if ($order != null) {
            $sql .= " ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= " LIMIT $limit";
        }
        return $this->query($sql);
    }

    public function with($table, $rows = '*', $relation = null, $col1 = null, $col2 = null)
    {
        //TODO implement with() method
    }

    public function insert($table, $values, $columns = null) {
        $sql = "INSERT INTO $table";
        if ($columns != null) {
            $columns = implode(", ", $columns);
            $sql .= " ($columns)";
        }
        //TODO implement null values in sql query
        $values = implode("', '", $values);
        $sql .= " VALUES (DEFAULT, '$values')";
        return $this->query($sql);
    }

    public function update($table, $set, $where = null) {
        $sql = "UPDATE $table SET $set";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        return $this->query($sql);
    }

    public function delete($table, $where = null) {
        $sql = "DELETE FROM $table";
        if ($where != null) {
            $sql .= " WHERE $where";
        }
        return $this->query($sql);
    }

    public function select_enums($table, $column) {
        $sql = "SHOW COLUMNS FROM $table LIKE '$column'";
        return $this->query($sql);
    }
}

//try {
//    $connection = mysqli_connect($_ENV["MYSQL_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"]);
//    $sql_create_database = 'CREATE DATABASE IF NOT EXISTS ' . $_ENV['MYSQL_DATABASE'];
//    mysqli_query($connection, $sql_create_database);
//    $connection = mysqli_connect($_ENV["MYSQL_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV['MYSQL_DATABASE']);
//    $sql_create_tables = '
//    CREATE TABLE IF NOT EXISTS offices (
//        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        address VARCHAR(255) NOT NULL,
//        numbers_of_workspaces INT(255) NOT NULL
//    );
//    CREATE TABLE IF NOT EXISTS staff (
//        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        office_id INT UNSIGNED,
//        FOREIGN KEY (office_id) REFERENCES offices(id) ON DELETE CASCADE,
//        username VARCHAR(255) NOT NULL,
//        email VARCHAR(255) NOT NULL,
//        password CHAR(32) NOT NULL,
//        firstname VARCHAR(255) NOT NULL,
//        middlename VARCHAR(255) NOT NULL,
//        lastname VARCHAR(255) NOT NULL
//    );
//    CREATE TABLE IF NOT EXISTS equipment (
//        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        staff_id INT UNSIGNED,
//        office_id INT UNSIGNED,
//        FOREIGN KEY (staff_id) REFERENCES staff(id) ON DELETE CASCADE,
//        FOREIGN KEY (office_id) REFERENCES offices(id) ON DELETE CASCADE,
//        invNo VARCHAR(255) NOT NULL,
//        specs VARCHAR(255) NOT NULL,
//        equipment_status ENUM("Workable", "On service", "Unworkable") NOT NULL,
//        movement_status ENUM("In storage", "Reserved", "Sent", "Received") NOT NULL
//    );';
//    var_dump($sql_create_tables);
//    mysqli_multi_query($connection, $sql_create_tables);
//} catch (Exception $exception){
//    echo $exception->getMessage();
//    exit();
//}