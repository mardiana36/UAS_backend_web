<?php
class pemesanan {
    private $conn;
    private $table_name = "pemesanan";

    public $id;
    public $tamu_id;
    public $kodeReservasi;
    public $kamar_id;
    public $checkin;
    public $checkout;
    public $status;
    public $harga;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readPemesanan() {
        $query = "SELECT p.id, t.nama as guest_name, p.kodeReservasi, k.nomor as room_number, 
                         p.tglCheckin, p.tglCheckout, p.status, p.harga 
                  FROM " . $this->table_name . " p
                  JOIN tamu t ON p.tamu_id = t.id
                  JOIN infokamar k ON p.kamar_id = k.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function showPemesanan($id) {
        $query = "SELECT p.id, t.nama as guest_name, p.kodeReservasi, k.nomor as room_number, 
                         p.tglCheckin, p.tglCheckout, p.status, p.harga 
                  FROM " . $this->table_name . " p
                  JOIN tamu t ON p.tamu_id = t.id
                  JOIN infokamar k ON p.kamar_id = k.id
                  WHERE p.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function createPemesanan() {
        $query = "INSERT INTO " . $this->table_name . " SET 
                  tamu_id = :tamu_id, 
                  kodeReservasi = :kodeReservasi, 
                  kamar_id = :kamar_id, 
                  tglCheckin = :tglCheckin, 
                  tglCheckout = :tglCheckout, 
                  status = :status, 
                  harga = :harga";
        $stmt = $this->conn->prepare($query);

        $this->tamu_id = htmlspecialchars(strip_tags($this->tamu_id));
        $this->kodeReservasi = htmlspecialchars(strip_tags($this->kodeReservasi));
        $this->kamar_id = htmlspecialchars(strip_tags($this->kamar_id));
        $this->checkin = htmlspecialchars(strip_tags($this->checkin));
        $this->checkout = htmlspecialchars(strip_tags($this->checkout));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));

        $stmt->bindParam(":tamu_id", $this->tamu_id);
        $stmt->bindParam(":kodeReservasi", $this->kodeReservasi);
        $stmt->bindParam(":kamar_id", $this->kamar_id);
        $stmt->bindParam(":tglCheckin", $this->checkin);
        $stmt->bindParam(":tglCheckout", $this->checkout);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":harga", $this->harga);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updatePemesanan() {
        $query = "UPDATE " . $this->table_name . " SET 
                  tamu_id = :tamu_id, 
                  kodeReservasi = :kodeReservasi, 
                  kamar_id = :kamar_id, 
                  tglCheckin = :tglCheckin, 
                  tglCheckout = :tglCheckout, 
                  status = :status, 
                  harga = :harga 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->tamu_id = htmlspecialchars(strip_tags($this->tamu_id));
        $this->kodeReservasi = htmlspecialchars(strip_tags($this->kodeReservasi));
        $this->kamar_id = htmlspecialchars(strip_tags($this->kamar_id));
        $this->checkin = htmlspecialchars(strip_tags($this->checkin));
        $this->checkout = htmlspecialchars(strip_tags($this->checkout));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":tamu_id", $this->tamu_id);
        $stmt->bindParam(":kodeReservasi", $this->kodeReservasi);
        $stmt->bindParam(":kamar_id", $this->kamar_id);
        $stmt->bindParam(":tglCheckin", $this->checkin);
        $stmt->bindParam(":tglCheckout", $this->checkout);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deletePemesanan($id) {
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
