<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12-6-17
 * Time: 22:48
 */

class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    public function register($username, $password){
        $md5password = md5($password);
        $stmt = $this->conn->prepare('INSERT INTO users (username, password)');
        $stmt->bind_param('ss',$username, $md5password);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }

    }

    public function login($username, $password){
        $md5password = md5($password);
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = ? AND password =?');
        $stmt->bind_param('ss',$username, $md5password);
        if($stmt->execute()){
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            $dbpassword = $user['password'];
            if($dbpassword == $md5password){
                return $user;
            }else{
                return false;
            }
        };

    }


    //http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/


}