<?php
include_once("Model/Cart.php");

class CartController {
    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    // Hiển thị giỏ hàng
    public function cart() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $idUser = $_SESSION['user']['id'];
        $listCart = $this->cart->getCartByUser($idUser);

        $tongTien = 0;
        foreach ($listCart as $item) {
            $tongTien += $item['price'] * $item['soluong'];
        }

        include_once("views/cart.php");
    }

    // Thêm vào giỏ
    public function add() {
        if (!isset($_SESSION['user'])) {
            echo "<script>alert('Bạn phải đăng nhập');location.href='index.php?action=login'</script>";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cart->updateOrInsertCart(
                $_SESSION['user']['id'],
                $_POST['idsp'],
                $_POST['soluong'],
                $_POST['size']
            );
            header("Location: index.php?action=cart");
        }
    }

    // Update số lượng
    public function update() {
        if (
            isset($_SESSION['user']) &&
            isset($_GET['idsp']) &&
            isset($_GET['size']) &&
            isset($_GET['type'])
        ) {
            $res = $this->cart->updateQuantity(
                $_SESSION['user']['id'],
                $_GET['idsp'],
                $_GET['size'],
                $_GET['type']
            );

            if ($res == "over_stock") {
                echo "<script>alert('Không đủ hàng trong kho');location.href='index.php?action=cart'</script>";
                exit;
            }
        }
        header("Location: index.php?action=cart");
    }

    // Xóa sản phẩm
    public function delete() {
        if (isset($_SESSION['user'], $_GET['idsp'], $_GET['size'])) {
            $this->cart->deleteCartItem(
                $_SESSION['user']['id'],
                $_GET['idsp'],
                $_GET['size']
            );
        }
        header("Location: index.php?action=cart");
    }
}
