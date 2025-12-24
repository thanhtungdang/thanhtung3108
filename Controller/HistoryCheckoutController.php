<?php
include_once("Model/HistoryCheckout.php");

class HistoryCheckoutController {

    private $history;

    public function __construct() {
        $this->history = new HistoryCheckout();
    }

    public function search() {
        $listHistory = [];

        if (isset($_SESSION['user'])) {
            $id_user = $_SESSION['user']['id'];
            $listHistory = $this->history->getByUserId($id_user);
        }

        include_once("views/historyCheckout.php");
    }

    public function detail() {
        if (!isset($_GET['id'])) {
            echo "Thiếu ID hóa đơn";
            exit;
        }
        $id = $_GET['id'];
        $hoaDon = $this->history->getDetail($id);
        $listChiTiet = $this->history->getProducts($id);
        include_once("views/checkDetailedInvoiceHistory.php");
    }

    public function update_status()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $trangthai = 4;       
            $this->history->updateStatus($id, $trangthai);
            header("Location: index.php?action=HistoryCheckoutDetail&id=". $id);
            exit();
        }
    }
}