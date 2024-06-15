<?php
class infokamar {
    private $conn;
    private $table_name = "infokamar";
    public $id;
    public $foto;
    public $nomor;
    public $tipe;
    public $status;
    public $harga;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readKamar() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showKamar($id) {
        $query = "SELECT * FROM " . $this->table_name ." WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function createKamar() {


        $query = "INSERT INTO " . $this->table_name . " SET nomor=:nomor, tipe=:tipe, status=:status, harga=:harga, foto=:foto";
        $stmt = $this->conn->prepare($query);
        
        $this->nomor = htmlspecialchars(strip_tags($this->nomor));
        $this->tipe = htmlspecialchars(strip_tags($this->tipe));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->foto = htmlspecialchars(strip_tags($this->foto));
        
        $stmt->bindParam(":nomor", $this->nomor);
        $stmt->bindParam(":tipe", $this->tipe);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":foto", $this->foto);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateKamar() {

        $query = "UPDATE " . $this->table_name . " SET nomor=:nomor, tipe=:tipe, status=:status, harga=:harga, foto=:foto WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->nomor = htmlspecialchars(strip_tags($this->nomor));
        $this->tipe = htmlspecialchars(strip_tags($this->tipe));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->foto = htmlspecialchars(strip_tags($this->foto));
        $this->id = htmlspecialchars(strip_tags($this->id));
        
        $stmt->bindParam(":nomor", $this->nomor);
        $stmt->bindParam(":tipe", $this->tipe);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":id", $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteKamar($id) {
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
