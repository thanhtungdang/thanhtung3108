<?php
session_start();

$hanhDongKhongCanDangNhap = ['login', 'loginSubmit'];

if (!isset($_SESSION['username']) && (!isset($_GET['action']) || !in_array($_GET['action'], $hanhDongKhongCanDangNhap))) {
    header("Location: index.php?action=login");
    exit();
}

include_once("Controller/DanhMucController.php");
include_once("Controller/SanPhamController.php");
include_once("Controller/HoaDonController.php");
include_once("Controller/ThongKeController.php");
include_once("Controller/TaiKhoanController.php");

$danhMuc = new DanhMucController();
$sanPham = new SanPhamController();
$hoaDon = new HoaDonController();
$thongKe = new ThongKeController();
$taiKhoan = new TaiKhoanController();

if (isset($_GET['action']) && $_GET['action'] != "") {
    $action = $_GET['action'];

    switch ($action) {

        // ----- LOGIN-----
        case 'login':
            $taiKhoan->loginForm();
            break;

        case 'loginSubmit':
            $taiKhoan->login();
            break;

        case 'logout':
            $taiKhoan->logout();
            break;
        // --------------------------------

        // Danh mục
        case "listdanhmuc":
            $danhMuc->list();
            break;
        case "createdanhmuc":
            $danhMuc->create();
            break;
        case "storedanhmuc":
            $danhMuc->store();
            break;
        case "editdanhmuc":
            $danhMuc->edit();
            break;
        case "updatedanhmuc":
            $danhMuc->update();
            break;
        case "deletedanhmuc":
            $danhMuc->delete();
            break;
        case "restoredanhmuc":
            $danhMuc->restore();
            break;

        // Sản phẩm
        case "listsanpham":
            $sanPham->index();
            break;
        case "createsanpham":
            $sanPham->create();
            break;
        case "storesanpham":
            $sanPham->store();
            break;
        case "editsanpham":
            $sanPham->edit();
            break;
        case "updatesanpham":
            $sanPham->update();
            break;
        case "deletesanpham":
            $sanPham->delete();
            break;
        case "restoresanpham":
            $sanPham->restore();
            break;

        // Hóa đơn
        case "listhoadon":
            $hoaDon->index();
            break;
        case "chitiethoadon":
            $hoaDon->invoiceDetails();
            break;
        case "update_status":
            $hoaDon->update_status();
            break;

        // Thống kê
        case "listthongke":
            $thongKe->index();
            break;
        case "thongke10spnew":
            $thongKe->top10SpNew();
            break;
        case "thongke10spbanchaynhat":
            $thongKe->top10spBanChayNhat();
            break;

        // Tài khoản
        case "listtaikhoan":
            $taiKhoan->index();
            break;
        case "createtaikhoan":
            $taiKhoan->create();
            break;
        case "storetaikhoan":
            $taiKhoan->store();
            break;
        case "edittaikhoan":
            $taiKhoan->edit();
            break;
        case "updatetaikhoan":
            $taiKhoan->update();
            break;
        case "deletetaikhoan":
            $taiKhoan->delete();
            break;
    }
} else {
    $danhMuc->index();
}
