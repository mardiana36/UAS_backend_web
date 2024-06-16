<?php
require_once 'app/config/db.php';
require_once 'app/models/kamar.php';
class kamarController
{
    private $db;
    private $kamar;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->kamar = new infokamar($this->db);
    }


    public function index()
    {
        $stmt = $this->kamar->readKamar();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        include "app/views/infoKamar/index.php";
    }
    public function get()
    {
        $stmt = $this->kamar->readKamar();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
                $foto = $this->kamar->uploadFile();
                if (!$foto) {
                    return false;
                }
                $nomor = $_POST['nomor'];
                $tipe = $_POST['tipe'];
                $status = $_POST['status'];
                $harga = $_POST['harga'];

                $this->kamar->foto = $foto;
                $this->kamar->nomor = $nomor;
                $this->kamar->tipe = $tipe;
                $this->kamar->status = $status;
                $this->kamar->harga = $harga;
                if ($this->kamar->createKamar()) {
                    echo "<script>window.location.href = 'index.php?action=rInfokamar';</script>";
                } else {
                    echo "<script>swal('Oops!','Something went wrong!','error');</script>";
                }
            } else {
                echo "<script>swal('Oops!','Something went wrong!','error');</script>";
            }
        } else {
            include "app/views/infoKamar/create.php";
        }
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
                $fotoLama = $_POST['fotoLama'];
                if ($_FILES["foto"]["error"] === 4) {
                    $foto = $fotoLama;
                } else {
                    $foto = $this->kamar->uploadFile();
                }
                $nomor = $_POST['nomor'];
                $tipe = $_POST['tipe'];
                $status = $_POST['status'];
                $harga = $_POST['harga'];

                $this->kamar->foto = $foto;
                $this->kamar->nomor = $nomor;
                $this->kamar->tipe = $tipe;
                $this->kamar->status = $status;
                $this->kamar->harga = $harga;
                if ($this->kamar->createKamar()) {
                    echo "<script>window.location.href = 'index.php?action=rinfokamar';</script>";
                } else {
                    echo "<script>swal('Oops!','Something went wrong!','error');</script>";
                }
            } else {
                echo "<script>swal('Oops!','Something went wrong!','error');</script>";
            }
        } else {
            $stmt = $this->kamar->showKamar($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/infoKamar/update.php';
            } else {
                echo "room not found.";
            }
        }
    }
    public function delete($id)
    {
        $stmt = $this->kamar->showKamar($id);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $foto = $data['foto'];
        if ($foto){
            $filePath = $_SERVER['DOCUMENT_ROOT']. "app/views/assets/images/foto/".$foto;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $this->kamar->deleteKamar($id);
        echo "<script>window.location.href = 'index.php?action=rInfokamar';</script>";
    }
}
