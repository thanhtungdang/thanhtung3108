<?php
include_once("Model/Cart.php");
include_once("Model/Checkout.php");

class CheckOutController {
    private $cartModel;
    private $checkoutModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->checkoutModel = new Checkout();
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $idUser = $_SESSION['user']['id'];
        $listCart = $this->cartModel->getCartByUser($idUser); 
        
        $tongTien = 0;
        foreach ($listCart as $item) {
            $tongTien += $item['soluong'] * $item['price'];
        }

        include_once("views/checkout.php");
    }

    public function add1() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['id'];
            $ten = $_POST['ten'];
            $diaChi = $_POST['diachi'];
            $sdt = $_POST['dienthoai'];
            $pttt = $_POST['pttt'] ?? 0;

            $listCart = $this->cartModel->getCartByUser($idUser);
            if (empty($listCart)) return;

            $tongTien = 0;
            foreach ($listCart as $item) {
                $tongTien += $item['soluong'] * $item['price'];
            }

            // Lưu hóa đơn
            $hoaDonId = $this->checkoutModel->insertHoadon($idUser, $ten, $diaChi, $sdt, $tongTien, $pttt);

            // Lưu chi tiết
            foreach ($listCart as $item) {
                $this->checkoutModel->insertCTHoadon($hoaDonId, $item['id_sanpham'], $item['soluong'], $item['price']);
            }

            // Xóa giỏ hàng
            $this->checkoutModel->deleteCartAfterCheckout($idUser);

            echo "<script>alert('Đặt hàng thành công!'); location.href='index.php?action=HistoryCheckout';</script>";
            exit();
        }
    }

    
}