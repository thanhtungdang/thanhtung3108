<?php 
include_once("pdo.php");

class Home {
    public function getAll() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0 LIMIT 8";
        return pdo_query($sql);
    }

    public function getAllSp() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0";
        return pdo_query($sql);
    }

    public function getAllShop() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0";
        return pdo_query($sql);
    }

    public function getAllNew() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0 ORDER BY id DESC LIMIT 10";
        return pdo_query($sql);
    }

    public function getAllDanhMuc() {
        $sql = "SELECT * FROM danhmuc WHERE deleted = 0";
        return pdo_query($sql);
    }

    public function getOneSp($id) {
        $sql = "SELECT * FROM sanpham WHERE id = ? AND deleted = 0";
        return pdo_query($sql, $id);
    }

    public function getAllSpDanhMuc($iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = ? AND deleted = 0";
        return pdo_query($sql, $iddm);
    }

    public function getSizesBySpId($id_sp) {
        $sql = "SELECT size, soluong FROM sanpham_size WHERE id_sanpham = ?";
        return pdo_query($sql, $id_sp);
    }
}
?>
