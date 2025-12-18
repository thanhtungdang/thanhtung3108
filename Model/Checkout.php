<?php
require_once 'pdo.php';

class Checkout {

    public function insertHoadon($id_user, $ten, $diaChi, $sdt, $tongTien, $pttt) {
        $sql = "INSERT INTO hoadon(id_user, tenkhachhang, diachi, sdt, tongtien, pttt, ngaygiodat) 
                VALUES(?,?,?,?,?,?, NOW())";
        return pdo_execute_return_id($sql, $id_user, $ten, $diaChi, $sdt, $tongTien, $pttt);
    }

    public function insertCTHoadon($hoaDonId, $sanPhamId, $soLuong, $gia) {
        $sql = "INSERT INTO chitiethoadon(id_hoadon, id_sanpham, size, soluong, gia) VALUES(?,?,'M',?,?)";
        return pdo_execute($sql, $hoaDonId, $sanPhamId, $soLuong, $gia);
    }

    public function deleteCartAfterCheckout($id_user) {
        $sql = "DELETE FROM giohang WHERE id_user = ?";
        pdo_execute($sql, $id_user);
    }
}