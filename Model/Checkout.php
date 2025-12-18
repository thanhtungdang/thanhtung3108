<?php
require_once 'pdo.php';

class Checkout {

    // Lưu hóa đơn
    public function insertHoadon($id_user, $ten, $diaChi, $sdt, $tongTien, $pttt) {
        $sql = "INSERT INTO hoadon(id_user, tenkhachhang, diachi, sdt, tongtien, pttt, ngaygiodat) 
                VALUES(?,?,?,?,?,?, NOW())";
        return pdo_execute_return_id($sql, $id_user, $ten, $diaChi, $sdt, $tongTien, $pttt);
    }

    // Lưu chi tiết hóa đơn, lưu size
    public function insertCTHoadon($hoaDonId, $sanPhamId, $size, $soLuong, $gia) {
        $sql = "INSERT INTO chitiethoadon(id_hoadon, id_sanpham, size, soluong, gia) 
                VALUES(?,?,?,?,?)";
        return pdo_execute($sql, $hoaDonId, $sanPhamId, $size, $soLuong, $gia);
    }

    // Trừ kho sản phẩm trong bảng sanpham_size
    public function reduceStock($sanPhamId, $size, $soLuong) {
        $sql = "UPDATE sanpham_size 
                SET soluong = soluong - ? 
                WHERE id_sanpham = ? AND size = ?";
        return pdo_execute($sql, $soLuong, $sanPhamId, $size);
    }

    // Xóa giỏ hàng sau thanh toán
    public function deleteCartAfterCheckout($id_user) {
        $sql = "DELETE FROM giohang WHERE id_user = ?";
        return pdo_execute($sql, $id_user);
    }
}
