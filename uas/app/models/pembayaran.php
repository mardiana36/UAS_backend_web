<?php
class pembayaran {
    private $conn;
    private $table_name = "pembayaran";

    public $id;
    public $pemesanan_id;
    public $metodePembayaran;
    public $tglPembayaran;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readPembayaran() {
        $query = "SELECT pb.id, pm.kodeReservasi as reservation_code, pb.metodePembayaran, 
                         pb.tglPembayaran, pb.status
                  FROM " . $this->table_name . " pb
                  JOIN pemesanan pm ON pb.pemesanan_id = pm.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showPembayaran($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function createPembayaran() {
        $query = "INSERT INTO " . $this->table_name . " SET 
                  pemesanan_id = :pemesanan_id, 
                  metodePembayaran = :metodePembayaran, 
                  tglPembayaran = :tglPembayaran, 
                  status = :status";
        $stmt = $this->conn->prepare($query);

        $this->pemesanan_id = htmlspecialchars(strip_tags($this->pemesanan_id));
        $this->metodePembayaran = htmlspecialchars(strip_tags($this->metodePembayaran));
        $this->tglPembayaran = htmlspecialchars(strip_tags($this->tglPembayaran));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(":pemesanan_id", $this->pemesanan_id);
        $stmt->bindParam(":metodePembayaran", $this->metodePembayaran);
        $stmt->bindParam(":tglPembayaran", $this->tglPembayaran);
        $stmt->bindParam(":status", $this->status);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updatePembayaran() {
        $query = "UPDATE " . $this->table_name . " SET 
                  pemesanan_id = :pemesanan_id, 
                  metodePembayaran = :metodePembayaran, 
                  tglPembayaran = :tglPembayaran, 
                  status = :status 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->pemesanan_id = htmlspecialchars(strip_tags($this->pemesanan_id));
        $this->metodePembayaran = htmlspecialchars(strip_tags($this->metodePembayaran));
        $this->tglPembayaran = htmlspecialchars(strip_tags($this->tglPembayaran));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":pemesanan_id", $this->pemesanan_id);
        $stmt->bindParam(":metodePembayaran", $this->metodePembayaran);
        $stmt->bindParam(":tglPembayaran", $this->tglPembayaran);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function deletePembayaran($id) {
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
