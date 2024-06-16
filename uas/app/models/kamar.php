<script src="app/views/assets/js/templateAlert.js"></script>
<?php
class infokamar
{
    private $conn;
    private $table_name = "infokamar";
    public $id;
    public $foto;
    public $nomor;
    public $tipe;
    public $status;
    public $harga;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readKamar()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showKamar($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    function uploadFile()
    {
        $namaFile = $_FILES["foto"]["name"];
        $ukuranFile = $_FILES["foto"]["size"];
        $tmpFile = $_FILES["foto"]["tmp_name"];

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            return 401;
        }
        if ($ukuranFile > 1000000) {
            return 402;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpFile, 'app/views/assets/images/foto/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function createKamar()
    {


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

    public function updateKamar()
    {
        $query = "UPDATE " . $this->table_name . " SET nomor=:nomor, tipe=:tipe, status=:status, harga=:harga, foto=:foto WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->nomor = htmlspecialchars(strip_tags($this->nomor));
        $this->tipe = htmlspecialchars(strip_tags($this->tipe));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));

        $stmt->bindParam(":id", $this->id);
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

    public function deleteKamar($id)
    {
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