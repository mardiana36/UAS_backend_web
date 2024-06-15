<?php
include "app/controllers/userController.php";
$userController = new userController();
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : '';
if (!isset($_SESSION["login"]) && $action!= '') {
    $action = "index.php";
}
if(isset($_SESSION['role']) && $_SESSION['role'] != "admin"){
    switch ($action) {
        case "rUser":
        case "uUser":
        case "dUser":
        case "cUser":
        case "cInfokamar":
        case "uInfokamar":
        case "dInfokamar":
            echo "<script>alert('Only Admin Can Access This Page!!!');</script>";
            $action = "dashboard";
            break;
   }
}

switch ($action) {
    case "rTamu":
        $_SESSION['page'] = "Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/index.php";
        require "app/views/components/footers.php";
        break;
    case "rUser":
        $_SESSION['page'] = "User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        $userController->index();
        require "app/views/components/footers.php";
        break;
    case "rInfokamar":
        $_SESSION['page'] = "Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/index.php";
        require "app/views/components/footers.php";
        break;
    case "rPembayaran":
        $_SESSION['page'] = "Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/index.php";
        require "app/views/components/footers.php";
        break;
    case "rPemesanan":
        $_SESSION['page'] = "Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/index.php";
        require "app/views/components/footers.php";
        break;
    case "cTamu":
        $_SESSION['page'] = "Add Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/create.php";
        require "app/views/components/footers.php";
        break;
    case "cUser":
        $_SESSION['page'] = "Add User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/user/create.php";
        require "app/views/components/footers.php";
        break;
    case "cInfokamar":
        $_SESSION['page'] = "Add Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/create.php";
        require "app/views/components/footers.php";
        break;
    case "cPembayaran":
        $_SESSION['page'] = "Add Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/create.php";
        require "app/views/components/footers.php";
        break;
    case "cPemesanan":
        $_SESSION['page'] = "Add Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/create.php";
        require "app/views/components/footers.php";
        break;
    case "uTamu":
        $_SESSION['page'] = "Edit Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/update.php";
        require "app/views/components/footers.php";
        break;
    case "uUser":
        $_SESSION['page'] = "Edit User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/user/update.php";
        require "app/views/components/footers.php";
        break;
    case "uInfokamar":
        $_SESSION['page'] = "Edit Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/update.php";
        require "app/views/components/footers.php";
        break;
    case "uPembayaran":
        $_SESSION['page'] = "Edit Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/update.php";
        require "app/views/components/footers.php";
        break;
    case "uPemesanan":
        $_SESSION['page'] = "Edit Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/update.php";
        require "app/views/components/footers.php";
        break;
    case "dashboard":
        $_SESSION['page'] = "Dashboard";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/dashboard/dashboard.php";
        require "app/views/components/footers.php";
        break;
    case "dTamu":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/components/footers.php";
        break;
    case "dUser":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/components/footers.php";
        break;
    case "dInfokamar":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/components/footers.php";
        break;
    case "dPembayaran":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/components/footers.php";
        break;
    case "dPemesanan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/components/footers.php";
        break;
    case "loginFalse":
        $_SESSION['page'] = "Login";
        require "app/views/components/headers.php";
        echo "<script src='app/views/assets/js/alert.js'></script>";
        $userController->login();
        break;
    default:
        $_SESSION['page'] = "Login";
        require "app/views/components/headers.php";
        $userController->login();
        break;
}
