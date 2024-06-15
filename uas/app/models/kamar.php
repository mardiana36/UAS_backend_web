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

    public function checkFoto() {
        $imageUrl = "";
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            
            if ($_FILES["foto"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                return false;
            }

            $allowedFileType = ['jpg', 'png', 'jpeg', 'gif'];
            if (!in_array($imageFileType, $allowedFileType)) {
                echo "Sorry, your file format is not correct.";
                return false;
            }

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
                $imageUrl = $targetFile;
            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }
        } else {
            if(isset($_FILES['foto']['error']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
                echo "Sorry, there was an error with your upload: " . $_FILES['foto']['error'];
            } else {
                echo "No file was uploaded.";
            }
            return false;
        }
        $this->foto = $imageUrl;
        return true;
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
        if(!$this->checkFoto()) {
            return false;
        }

        $query = "INSERT INTO " . $this->table_name . " SET nomor=:nomor, tipe=:tipe, status=:status, harga=:harga, foto=:foto";
        $stmt = $this->conn->prepare($query);
        
        $this->nomor = htmlspecialchars(strip_tags($this->nomor));
        $this->tipe = htmlspecialchars(strip_tags($this->tipe));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        
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
        if(!$this->checkFoto()) {
            return false;
        }

        $query = "UPDATE " . $this->table_name . " SET nomor=:nomor, tipe=:tipe, status=:status, harga=:harga, foto=:foto WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->nomor = htmlspecialchars(strip_tags($this->nomor));
        $this->tipe = htmlspecialchars(strip_tags($this->tipe));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
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
