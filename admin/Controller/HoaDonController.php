<?php
require_once("Model/HoaDon.php");

class HoaDonController
{
    private $hoaDonModel;

    public function __construct()
    {
        $this->hoaDonModel = new HoaDon();
    }

    public function index()
    {
        $allHoaDon = $this->hoaDonModel->getAll();
        include_once("views/hoadon/list.php");
    }

    public function create()
    {
        include_once("./views/hoadon/create.php");
    }


    public function invoiceDetails()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $hoaDon = $this->hoaDonModel->getOne($id);
            $listChiTiet = $this->hoaDonModel->getChiTiet($id);

            include_once("views/hoadon/invoicedetails.php");
        }
    }
  
    public function update_status()
    {
        if (isset($_POST['id']) && isset($_POST['trangthai'])) {
            $id = $_POST['id'];
            $trangthai = $_POST['trangthai'];
            $this->hoaDonModel->updateStatus($id, $trangthai);
            header("Location: ?action=chitiethoadon&id=" . $id);
            exit();
        }
    }
}
