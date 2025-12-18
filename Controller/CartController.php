<?php
include_once("Model/Cart.php");
class CartController
{
    private $cart;

    public function __construct()
    {
        $this->cart = new Cart();
    }
    public function add()
    {
        if (isset($_GET['idsp'])) {
            $idSp = $_GET['idsp'];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $tonTaiSP = false;
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['idsp'] == $idSp) {
                    $_SESSION['cart'][$key]['soLuong']++;
                    $tonTaiSP = true;
                    break;
                }
            }
            if ($tonTaiSP == false) {
                $_SESSION['cart'][] =
                    ["idsp" => $idSp, "soLuong" => 1];
            }
        }

        header("Location:index.php?action=cart");
    }
    public function cart()
    {
        $tongTien = 0;
        if (isset($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key => $item) {
                $sanPhamDetail = $this->cart->getAllProductById($item['idsp']);
                $_SESSION['cart'][$key]['name'] = $sanPhamDetail['name'];
                $_SESSION['cart'][$key]['price'] = $sanPhamDetail['price'];
                $_SESSION['cart'][$key]['img'] = $sanPhamDetail['img'];
                $tongTien += $_SESSION['cart'][$key]['soLuong'] * $sanPhamDetail['price'];
            }
        } else {
            $_SESSION['cart'] = [];
        }
        include_once("views/cart.php");
    }
    public function delete()
    {
        if (isset($_GET['idsp'])) {
            $id = $_GET['idsp'];

            // Tìm phần tử có idsp trùng nhau
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['idsp'] == $id) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }

            // Sắp xếp lại key cho đều 0,1,2,3...
            $_SESSION['cart'] = array_values($_SESSION['cart']);

            header("Location: index.php?action=cart");
            exit();
        }
    }

    public function update()
    {
        if (isset($_GET['idsp']) && isset($_GET['type'])) {
            $idSp = $_GET['idsp'];
            $type = $_GET['type']; // 'increase' hoặc 'decrease'

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['idsp'] == $idSp) {
                        if ($type == 'increase') {
                            $_SESSION['cart'][$key]['soLuong']++;
                        } elseif ($type == 'decrease') {
                            if ($_SESSION['cart'][$key]['soLuong'] > 1) {
                                $_SESSION['cart'][$key]['soLuong']--;
                            } else {
                                // Nếu giảm xuống 0 thì xóa luôn sản phẩm (tùy chọn)
                                unset($_SESSION['cart'][$key]);
                            }
                        }
                        break;
                    }
                }
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
        header("Location: index.php?action=cart");
        exit();
    }
}
