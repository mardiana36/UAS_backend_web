<?php
class Database{
    private $host = "localhost";
    private $db_name = "booking";
    private $host_name = "root";
    private $password = "";
    private $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->host_name,$this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $err){
            echo "Connection Error!!!".$err->getMessage();
            exit();
        }
        return $this->conn;
    }
}
?>

