<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12-6-17
 * Time: 22:47
 */

class DB_Connect {
    private $conn;

    public function connect() {
        require_once 'config.php';


        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);


        return $this->conn;
    }
}