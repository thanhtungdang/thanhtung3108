<?php
include_once("Model/Home.php");

class HomeController {
     private $homeModel;

    public function __construct()
    {
        $this->homeModel = new Home();
    }

    public function home() {
        $products = $this->homeModel->getAll();
        $productsDanhMuc = $this->homeModel->getAllDanhMuc();
        // Mặc định ở trang chủ là sản phẩm mới nhất
        $currentCategoryName = "Sản phẩm mới nhất";
        
        include_once("views/home.php");
    }

    public function aboutUs() {
        include_once("views/aboutUs.php");
    }

    public function contact() {
        include_once("views/contact.php");
    }

    public function sanpham() {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $product1 = $this->homeModel->getOneSp($id);
        include_once("views/sanpham.php");  
    }

    public function shop() { 
        $products = $this->homeModel->getAllSp();
        $productsDanhMuc = $this->homeModel->getAllDanhMuc();
        $productsNew = $this->homeModel->getAllNew();
        $currentCategoryName = "Tất cả sản phẩm";

        include_once("views/shop.php");  
    }

    public function danhMuc() {
        $iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 0;
        $productsDanhMuc = $this->homeModel->getAllDanhMuc();
        $products = $this->homeModel->getAllSpDanhMuc($iddm);
        $currentCategoryName = "Danh mục";
        foreach ($productsDanhMuc as $dm) {
            if ($dm['id'] == $iddm) {
                $currentCategoryName = $dm['name'];
                break;
            }
        }


        include_once("views/shop.php");
    }
}
?>