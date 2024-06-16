<?php
require_once 'app/config/db.php';
require_once 'app/models/tamu.php';
class tamuController
{
    private $db;
    private $tamu;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->tamu = new tamu($this->db);
    }


    public function index()
    {
        $stmt = $this->tamu->readTamu();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/tamu/index.php";
    }
    public function get()
    {
        $stmt = $this->tamu->readTamu();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama= $_POST['nama'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];

            $this->tamu->nama = $nama;
            $this->tamu->email = $email;
            $this->tamu->telepon = $telepon;
            $this->tamu->alamat = $alamat;
            if ($this->tamu->createTamu()) {
                echo "<script>window.location.href = 'index.php?action=rTamu';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            include "app/views/tamu/create.php";
        }
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nama= $_POST['nama'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];

            $this->tamu->id = $id;
            $this->tamu->nama = $nama;
            $this->tamu->email = $email;
            $this->tamu->telepon = $telepon;
            $this->tamu->alamat = $alamat;
            if ($this->tamu->updateTamu()) {
                echo "<script>window.location.href = 'index.php?action=rTamu';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat update!');</script>";
            }
        } else {
            $stmt = $this->tamu->showTamu($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/tamu/update.php';
            } else {
                echo "User not found.";
            }
        }
    }
    public function delete($id)
    {
        $this->tamu->deleteTamu($id);
        echo "<script>window.location.href = 'index.php?action=rTamu';</script>";
    }
}
