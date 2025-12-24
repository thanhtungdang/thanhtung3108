<?php
require_once 'pdo.php';

class HistoryCheckout {
    public function getByUserId($id_user) {
        $sql = "SELECT * FROM hoadon WHERE id_user = ? ORDER BY id DESC";
        return pdo_query($sql, $id_user);
    }

    public function getDetail($id) {
        $sql = "SELECT * FROM hoadon WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    public function getProducts($id) {
        $sql = "SELECT c.*, s.name, s.img 
                FROM chitiethoadon c 
                JOIN sanpham s ON c.id_sanpham = s.id 
                WHERE c.id_hoadon = ?";
        return pdo_query($sql, $id);
    }

    public function updateStatus($id, $trangthai) {
        $sql = "UPDATE hoadon SET trangthai = ? WHERE id = ?";
        pdo_execute($sql, $trangthai, $id);
    }
}