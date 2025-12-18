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

    // Hiển thị trang checkout
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $idUser = $_SESSION['user']['id'];
        $listCart = $this->cartModel->getCartByUser($idUser); 
        
        // Tính tổng tiền
        $tongTien = 0;
        foreach ($listCart as $item) {
            $tongTien += $item['soluong'] * $item['price'];
        }

        include_once("views/checkout.php");
    }

    // Thanh toán
    public function add1() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['id'];
            $ten = $_POST['ten'];
            $diaChi = $_POST['diachi'];
            $sdt = $_POST['dienthoai'];
            $pttt = $_POST['pttt'] ?? 0;

            $listCart = $this->cartModel->getCartByUser($idUser);
            if (empty($listCart)) return;

            // Tính tổng tiền
            $tongTien = 0;
            foreach ($listCart as $item) {
                $tongTien += $item['soluong'] * $item['price'];
            }

            // Lưu hóa đơn
            $hoaDonId = $this->checkoutModel->insertHoadon($idUser, $ten, $diaChi, $sdt, $tongTien, $pttt);

            // Lưu chi tiết hóa đơn & trừ kho theo size
            foreach ($listCart as $item) {
                $size = $item['size']; // lấy size từ giỏ hàng

                // Lưu chi tiết hóa đơn
                $this->checkoutModel->insertCTHoadon(
                    $hoaDonId,
                    $item['id_sanpham'],
                    $size,
                    $item['soluong'],
                    $item['price']
                );

                // Trừ kho trong bảng sanpham_size
                $this->checkoutModel->reduceStock(
                    $item['id_sanpham'],
                    $size,
                    $item['soluong']
                );
            }

            // Xóa giỏ hàng
            $this->checkoutModel->deleteCartAfterCheckout($idUser);

            echo "<script>alert('Đặt hàng thành công!'); location.href='index.php?action=HistoryCheckout';</script>";
            exit();
        }
    }
}
