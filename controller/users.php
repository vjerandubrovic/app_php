<?php 

require_once("database/db.php");

class User{

    private $db;
    public $username;
    private $password;
    private $table = "users";
    
    function __construct(){
        $this->db = new Database();
    }

    function getUsers(){
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    function getUser(){
        return $this->username;
    }

    function checkUser($user, $pass){
        $this->username = $user;
        $getUsers = $this->getUsers();
        foreach ($getUsers as $userkey => $uservalue) {
            if($user == $uservalue['username'] && $pass == $uservalue['password']){
                session_start();
                session_regenerate_id();
                $_SESSION['name']=$uservalue['username']; 
                header("Location: home.php");  
            }
        }    
    }

    function logInUser(){        
        session_start();
        session_regenerate_id();
        /* Prevent direct URL ACCESS */
        if (!isset($_SESSION['name'])) {
            /* 
            Up to you which header to send, some prefer 404 even if 
            the files does exist for security
            */
            header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
            /* choose the appropriate page to redirect users */
            die( header( 'location: /app/error.php' ) );
        }
    }

    function logOutUser(){
        session_start();
        $_SESSION = array(); // destroy all $_SESSION data
        setcookie("PHPSESSID", "", time() - 100, "/");
        session_destroy();
        header("Location: index.php"); 
    }
}


?>