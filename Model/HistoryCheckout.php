<?php
include_once("pdo.php");

class HistoryCheckout {

    public function getByPhone($phoneNumber) {
        $sql = "SELECT * FROM hoadon WHERE sdt = ?";
        return pdo_query($sql, $phoneNumber);
    }

    public function getDetail($id) {
        $sql = "SELECT * FROM hoadon WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    public function getProducts($id) {
                $sql = "SELECT ct.*, s.name as ten_sp, s.img as anh_sp 
                FROM chitiethoadon ct 
                JOIN sanpham s ON ct.id_sanpham = s.id 
                WHERE ct.id_hoadon = ?";
        return pdo_query($sql, $id);
    }
}
