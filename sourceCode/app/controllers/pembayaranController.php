<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
<?php
require_once 'app/config/db.php';
require_once 'app/models/pembayaran.php';
class pembayaranController
{
    private $db;
    private $pb;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->pb = new pembayaran($this->db);
    }


    public function index()
    {
        $stmt = $this->pb->readPembayaran();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/pembayaran/index.php";
    }

    public function create($pemesanan)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pemesanan_id = $_POST['pemesanan_id'];
            $metodePembayaran = $_POST['metodePembayaran'];
            $tglPembayaran = $_POST['tglPembayaran'];
            $status = $_POST['status'];

            $this->pb->pemesanan_id = $pemesanan_id;
            $this->pb->metodePembayaran = $metodePembayaran;
            $this->pb->tglPembayaran = $tglPembayaran;
            $this->pb->status = $status;
            if ($this->pb->createPembayaran()) {
                echo "<script>window.location.href = 'index.php?action=rPembayaran';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            include "app/views/pembayaran/create.php";
        }
    }
    public function update($id,$pemesanan)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pemesanan_id = $_POST['pemesanan_id'];
            $metodePembayaran = $_POST['metodePembayaran'];
            $tglPembayaran = $_POST['tglPembayaran'];
            $status = $_POST['status'];
            $this->pb->id =$id;
            $this->pb->pemesanan_id = $pemesanan_id;
            $this->pb->metodePembayaran = $metodePembayaran;
            $this->pb->tglPembayaran = $tglPembayaran;
            $this->pb->status = $status;
            if ($this->pb->updatePembayaran()) {
                echo "<script>window.location.href = 'index.php?action=rPembayaran';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            $stmt = $this->pb->showPembayaran($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/pembayaran/update.php';
            } else {
                echo "Payment not found.";
            }
        }
    }
    public function delete($id)
    {
       $data = $this->pb->deletePembayaran($id);
        if($data){
            echo "<script>alertSuksess('Congratulations','Pymend data has been successfully deleted','index.php?action=rPembayaran');</script>";
        } else{
         echo "<script>alertWarning('Oops!','Something went wrong','index.php?action=rPembayaran');</script>";
        }
    }
}
