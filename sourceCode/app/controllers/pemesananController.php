<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/pemesanan.php';
class pemesananController
{
    private $db;
    private $pm;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pm = new pemesanan($this->db);
    }


    public function index()
    {
        $stmt = $this->pm->readPemesanan();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/pemesanan/index.php";
    }
    public function get()
    {
        $stmt = $this->pm->readPemesanan();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function create($dataTamu,$dataKamar)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tamu_id = $_POST['tamu_id'];
            $kodeReservasi = $_POST['kodeReservasi'];
            $kamar_id = $_POST['kamar_id'];
            $tglCheckin = $_POST['checkin'];
            $tglCheckout = $_POST['checkout'];
            $status = $_POST['status'];
            $harga = $_POST['harga'];

            $this->pm->tamu_id = $tamu_id;
            $this->pm->kodeReservasi = $kodeReservasi;
            $this->pm->kamar_id = $kamar_id;
            $this->pm->tglCheckin= $tglCheckin;
            $this->pm->tglCheckout= $tglCheckout;
            $this->pm->status= $status;
            $this->pm->harga= $harga;
            if ($this->pm->createPemesanan()) {
                echo "<script>window.location.href = 'index.php?action=rPemesanan';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            include "app/views/pemesanan/create.php";
        }
    }
    public function update($id,$dataTamu,$dataKamar)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tamu_id = $_POST['tamu_id'];
            $kodeReservasi = $_POST['kodeReservasi'];
            $kamar_id = $_POST['kamar_id'];
            $tglCheckin = $_POST['checkin'];
            $tglCheckout = $_POST['checkout'];
            $status = $_POST['status'];
            $harga = $_POST['harga'];
            
            $this->pm->id = $id;
            $this->pm->tamu_id = $tamu_id;
            $this->pm->kodeReservasi = $kodeReservasi;
            $this->pm->kamar_id = $kamar_id;
            $this->pm->tglCheckin= $tglCheckin;
            $this->pm->tglCheckout= $tglCheckout;
            $this->pm->status= $status;
            $this->pm->harga= $harga;
            if ($this->pm->updatePemesanan()) {
                echo "<script>window.location.href = 'index.php?action=rPemesanan';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            $stmt = $this->pm->showPemesanan($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/pemesanan/update.php';
            } else {
                echo "Reservation not found.";
            }
        }
    }
    public function delete($id)
    {
       $data = $this->pm->deletePemesanan($id);
       if($data){
           echo "<script>alertSuksess('Congratulations','Reservation data has been successfully deleted','index.php?action=rPemesanan');</script>";
       } else{
        echo "<script>alertWarning('Oops!','Something went wrong','index.php?action=rPemesanan');</script>";
       }
    }
}
