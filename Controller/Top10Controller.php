<?php
include_once("Model/Top10.php");

class Top10Controller {
     private $Top10;
     private $homeModel;
    

    public function __construct()
    {
        $this->Top10 = new Top10();
        $this->homeModel = new Home();
      
    }
    public function top10New() {
         $iddm = isset($_GET['iddm']) ? $_GET['iddm'] : 0;
    $productsDanhMuc = $this->homeModel->getAllDanhMuc();
    $products = $this->homeModel->getAllSpDanhMuc($iddm);
        $top10New = $this->Top10->top10New();
        include_once("views/top10SpNew.php");
    }
}
?>