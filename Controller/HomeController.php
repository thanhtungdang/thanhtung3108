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
    include_once("views/shop.php");  
}
public function danhMuc() {
    $iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 0;
    $productsDanhMuc = $this->homeModel->getAllDanhMuc();
    $products = $this->homeModel->getAllSpDanhMuc($iddm);
    include_once("views/shop.php");
}
}
?>