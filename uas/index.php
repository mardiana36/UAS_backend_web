<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';
session_start();

require "app/views/components/headers.php";
require "app/views/components/navbars.php";
switch ($action) {
    case "rTamu":
        $_SESSION['page'] = "Tamu";
        require "app/views/tamu/index.php";
        break;
    case "rUser":
        $_SESSION['page'] = "User";
        require "app/views/user/index.php";
        break;
    case "rInfokamar":
        $_SESSION['page'] = "Kamar";
        require "app/views/infoKamar/index.php";
        break;
    case "rPembayaran":
        $_SESSION['page'] = "Pembayaran";
        require "app/views/pembayaran/index.php";
        break;
    case "rPemesanan":
        $_SESSION['page'] = "Pemesanan";
        require "app/views/pemesanan/index.php";
        break;
    default:
        echo "Anda salah memasukan action!!";
        break;
}
require "app/views/components/footers.php";
