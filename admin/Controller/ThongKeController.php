<?php

include_once("Model/ThongKe.php");
class ThongKeController
{
    private $danhMuc;
    private $thongKe;
    public function __construct()
    {
        $this->danhMuc = new DanhMuc();
        $this->thongKe = new ThongKe();
    }


    public function index()
    {
        $tongDaBan =  $this->thongKe->soLuongBan();
        $tongDoanhThu = $this->thongKe->doanhThu();
        $tongDon = $this->thongKe->tongDonHang();
        $productsNew = $this->thongKe->getAllNew();
        $productsBanChay = $this->thongKe->getAllBanChay();
        if (isset($_GET['date_from']) && isset($_GET['date_to'])) {
            $dateFrom = $_GET['date_from'];
            $dateTo = $_GET['date_to'];
        } else {
            $dateFrom = date('Y-m-d', strtotime('-30 days'));
            $dateTo = date('Y-m-d');
        }
        $listDoanhThu = $this->thongKe->loadSodo($dateFrom, $dateTo);
        include_once("./views/thongke/list.php");
    }
    public function top10SpNew()
    {
        $productsNew = $this->thongKe->getAllNew();
        include_once("./views/thongke/top10SpNew.php");
    }
    public function top10SpBanChayNhat()
    {
        $productsBanChay = $this->thongKe->getAllBanChay();
        include_once("./views/thongke/top10SpBanChayNhat.php");
    }
}
