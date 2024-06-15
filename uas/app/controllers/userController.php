<?php
require 'app/config/db.php';
require 'app/models/user.php';
class userController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new user($this->db);
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loggedIn = false;
            $userIdentity = $_POST['usernameOrEmail'];
            $password = $_POST['password'];
            $stmt = $this->user->read();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $loggedIn = false;
            foreach ($data as $user) {
                if (($user['email'] == $userIdentity || $user['username'] == $userIdentity) && $user['password'] == $password) {
                    $_SESSION['login'] = true;
                    $_SESSION['role'] = $user['role'];
                    $loggedIn = true;
                    echo "<script>window.location.href = 'index.php?action=dashboard';</script>";
                    break;
                }
            }

            if (!$loggedIn == true) {
                echo "<script>window.location.href = 'index.php?action=loginFalse';</script>";
            }
        } else {
            require "app/views/login/index.php";
        }
    }

    public function index(){
        $stmt = $this->user->read();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include "app/views/user/index.php";
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $this->user->username = $username;
            $this->user->password = $password;
            $this->user->email = $email;
            $this->user->role = $role;

            if ($this->user->create()) {
                echo "<script>window.location.href = 'index.php?action=cUser';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            include "app/views/mahaiswa/create.php";
        }
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $this->user->id = $id;
            $this->user->username = $username;
            $this->user->password = $password;
            $this->user->email = $email;
            $this->user->role = $role;

            if ($this->user->create()) {
                echo "<script>window.location.href = 'index.php?action=cUser';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan pada saat create!');</script>";
            }
        } else {
            $stmt = $this->user->show($id);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                include 'app/views/user/edit.php';
            } else {
                echo "Mahasiswa not found.";
            }
        }
    }
    public function delete($id)
    {
        $stmt = $this->user->delete($id);
        echo "<script>window.location.href = 'index.php?action=rUser';</script>";
        return $stmt;
    }
}
