<?php

require_once 'config.php';

// api

class Conexion {
    private $db_host;
    private $db_name;
    private $db_username;
    private $db_password;

    public function __construct() {
        $this->db_host = HOST;
        $this->db_name = DB;
        $this->db_username = USER;
        $this->db_password = PASS;
    }

    public function dbConnection(){
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($conn){
               // echo 'DB connected';
            }
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage();
            exit;
        }
    }

}

?>