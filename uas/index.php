<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
session_start();


switch ($action) {
    case "rTamu":
        $_SESSION['page'] = "Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/index.php";
        break;
    case "rUser":
        $_SESSION['page'] = "User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/user/index.php";
        break;
    case "rInfokamar":
        $_SESSION['page'] = "Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/index.php";
        break;
    case "rPembayaran":
        $_SESSION['page'] = "Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/index.php";
        break;
    case "rPemesanan":
        $_SESSION['page'] = "Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/index.php";
        break;
    case "cTamu":
        $_SESSION['page'] = "Add Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/create.php";
        break;
    case "cUser":
        $_SESSION['page'] = "Add User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/user/create.php";
        break;
    case "cInfokamar":
        $_SESSION['page'] = "Add Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/create.php";
        break;
    case "cPembayaran":
        $_SESSION['page'] = "Add Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/create.php";
        break;
    case "cPemesanan":
        $_SESSION['page'] = "Add Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/create.php";
        break;
    case "uTamu":
        $_SESSION['page'] = "Edit Guest";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/tamu/update.php";
        break;
    case "uUser":
        $_SESSION['page'] = "Edit User";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/user/update.php";
        break;
    case "uInfokamar":
        $_SESSION['page'] = "Edit Room";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/infoKamar/update.php";
        break;
    case "uPembayaran":
        $_SESSION['page'] = "Edit Payment";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pembayaran/update.php";
        break;
    case "uPemesanan":
        $_SESSION['page'] = "Edit Reservation";
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        require "app/views/pemesanan/update.php";
        break;
    case "dTamu":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        break;
    case "dUser":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        break;
    case "dInfokamar":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        break;
    case "dPembayaran":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        break;
    case "dPemesanan":
        require "app/views/components/headers.php";
        require "app/views/components/navbars.php";
        break;
    default:
        echo "Anda salah memasukan action!!";
        break;
}
require "app/views/components/footers.php";
