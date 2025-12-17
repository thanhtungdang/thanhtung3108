<?php 
include_once("pdo.php");

class Home {
    // Lấy 8 sản phẩm hiển thị trên trang chủ
    public function getAll() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0 LIMIT 8";
        return pdo_query($sql);
    }

    // Lấy tất cả sản phẩm cho trang shop
    public function getAllSp() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0";
        return pdo_query($sql);
    }

    // Lấy tất cả sản phẩm (tương tự getAllSp, nếu cần)
    public function getAllShop() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0";
        return pdo_query($sql);
    }

    // Lấy 10 sản phẩm mới nhất
    public function getAllNew() {
        $sql = "SELECT * FROM sanpham WHERE deleted = 0 ORDER BY id DESC LIMIT 10";
        return pdo_query($sql);
    }

    // Lấy tất cả danh mục chưa bị xóa
    public function getAllDanhMuc() {
        $sql = "SELECT * FROM danhmuc WHERE deleted = 0";
        return pdo_query($sql);
    }

    // Lấy chi tiết một sản phẩm theo id, chỉ sản phẩm chưa bị xóa
    public function getOneSp($id) {
        $sql = "SELECT * FROM sanpham WHERE id = ? AND deleted = 0";
        return pdo_query($sql, $id);
    }

    // Lấy tất cả sản phẩm theo danh mục, chỉ sản phẩm chưa bị xóa
    public function getAllSpDanhMuc($iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = ? AND deleted = 0";
        return pdo_query($sql, $iddm);
    }
}
?>
