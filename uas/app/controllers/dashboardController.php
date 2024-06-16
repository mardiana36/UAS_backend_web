<?php
require_once 'app/config/db.php';
require_once 'app/models/kamar.php';
require_once 'app/models/pembayaran.php';
require_once 'app/models/pemesanan.php';
require_once 'app/models/tamu.php';

class dashboardController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

        public function getDashboardData() {
        $query = "
            SELECT 
                t.nama AS guest, 
                p.tglCheckin AS checkin, 
                p.tglCheckout AS checkout, 
                p.status AS reservation, 
                COALESCE(pb.status, 'N/A') AS payment
            FROM 
                pemesanan p
            LEFT JOIN 
                tamu t ON p.tamu_id = t.id
            LEFT JOIN 
                pembayaran pb ON p.id = pb.pemesanan_id
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        $queryGuest = "SELECT COUNT(*) AS total_guest FROM tamu";
        $stmtGuest = $this->db->prepare($queryGuest);
        $stmtGuest->execute();
        $totalGuest = $stmtGuest->fetch(PDO::FETCH_ASSOC)['total_guest'];

        $queryRoom = "SELECT COUNT(*) AS total_room FROM infokamar";
        $stmtRoom = $this->db->prepare($queryRoom);
        $stmtRoom->execute();
        $totalRoom = $stmtRoom->fetch(PDO::FETCH_ASSOC)['total_room'];

        $queryProfit = "
            SELECT 
                SUM(p.harga) AS total_paid 
            FROM 
                pemesanan p
            LEFT JOIN 
                pembayaran pb ON p.id = pb.pemesanan_id
            WHERE 
                p.status = 'con' AND
                pb.status = 'PA'
        ";
        $stmtProfit = $this->db->prepare($queryProfit);
        $stmtProfit->execute();
        $totalProfit = $stmtProfit->fetch(PDO::FETCH_ASSOC)['total_paid'];

        $queryBooking = "SELECT COUNT(*) AS total_booking FROM pemesanan";
        $stmtBooking = $this->db->prepare($queryBooking);
        $stmtBooking->execute();
        $totalBooking = $stmtBooking->fetch(PDO::FETCH_ASSOC)['total_booking'];

        setlocale(LC_TIME, 'id_ID');
        $tanggal_hari_ini = date('d F Y');

        require "app/views/dashboard/dashboard.php";
    }
}
