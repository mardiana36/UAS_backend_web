<?php
class tamu {
    private $conn;
    private $table_name = "tamu";
    public $id;
    public $nama;
    public $email;
    public $telepon;
    public $alamat;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readTamu() {
        $query = "select * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showTamu($id) {
        $query = "SELECT * FROM " . $this->table_name ." where id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function createTamu() {
        $query = "INSERT INTO " . $this->table_name . " SET nama=:nama, email=:email, telepon=:telepon, alamat=:alamat";
        $stmt = $this->conn->prepare($query);
        
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telepon = htmlspecialchars(strip_tags($this->telepon));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telepon", $this->telepon);
        $stmt->bindParam(":alamat", $this->alamat);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateTamu() {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, email=:email, telepon=:telepon, alamat=:alamat, where id=:id";
        $stmt = $this->conn->prepare($query);

        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telepon = htmlspecialchars(strip_tags($this->telepon));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->id = $this->id;

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telepon", $this->telepon);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":id", $this->id);
        
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteTamu($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>