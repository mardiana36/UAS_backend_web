<script src="app/views/assets/js/templateAlert.js"></script>
<script src="app/views/assets/js/alert.js"></script>
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
                if ($foto != 401 && $foto != 402) {
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
                        echo "<script>alertWarning('Oops!','Something went wrong in function createKamar()','index.php?action=cInfokamar');</script>";
                    }
                } else {
                    $this->handleFileUploadError($foto, "index.php?action=cInfokamar");
                }
            } else {
                echo "<script>alertWarning('Oops!','Something went wrong!','index.php?action=cInfokamar');</script>";
            }
        } else {
            include "app/views/infoKamar/create.php";
        }
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $fotoLama = htmlspecialchars(strip_tags($_POST['fotoLama']));

            if ($_FILES["foto"]["error"] === 4) {
                $foto = $fotoLama;
            } else {
                $foto = $this->kamar->uploadFile();
            }

            if ($foto != 401 && $foto != 402) {
                $nomor = htmlspecialchars(strip_tags($_POST['nomor']));
                $tipe = htmlspecialchars(strip_tags($_POST['tipe']));
                $status = htmlspecialchars(strip_tags($_POST['status']));
                $harga = htmlspecialchars(strip_tags($_POST['harga']));

                $this->kamar->id = htmlspecialchars(strip_tags($id));
                $this->kamar->foto = $foto;
                $this->kamar->nomor = $nomor;
                $this->kamar->tipe = $tipe;
                $this->kamar->status = $status;
                $this->kamar->harga = $harga;

                if ($this->kamar->updateKamar()) {
                    echo "<script>window.location.href = 'index.php?action=rInfokamar';</script>";
                } else {
                    echo "<script>alertWarning('Oops!','Something went wrong in function updateKamar()','index.php?action=uInfokamar&id=$id');</script>";
                }
            } else {
                $this->handleFileUploadError($foto, "index.php?action=uInfokamar&id=$id");
            }
        } else {
            $stmt = $this->kamar->showKamar($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/infoKamar/update.php';
            } else {
                echo "Room not found.";
            }
        }
    }

    private function handleFileUploadError($errorCode, $redirectUrl)
    {
        if ($errorCode == 401) {
            echo "<script>alertWarning('Oops!','Allowed file extensions are only [jpg, jpeg, png]','$redirectUrl');</script>";
        } elseif ($errorCode == 402) {
            echo "<script>alertWarning('Oops!','Maximum photo size = 1MB','$redirectUrl');</script>";
        } else {
            echo "<script>alertWarning('Oops!','Something went wrong!','$redirectUrl');</script>";
        }
    }

    public function delete($id)
    {
        $stmt = $this->kamar->showKamar($id);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $foto = $data['foto'];
        if ($foto) {
            $filePath = $_SERVER['DOCUMENT_ROOT'] . "/UAS_BACKEND_WEB/uas/app/views/assets/images/foto/" . $foto;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $this->kamar->deleteKamar($id);
        echo "<script>alertSuksess('Congratulations','Room data has been successfully deleted','index.php?action=rInfokamar');</script>";
    }
}
