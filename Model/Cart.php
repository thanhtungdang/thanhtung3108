<?php
include_once("pdo.php");

class Cart
{
    public function getAllProductById($id)
    {
        $sql = "select * from sanpham where deleted = 0 and id = ?";
        return pdo_query_one($sql, $id);
    }
    public function insertHoadon($ten, $diaChi, $sdt, $tongTien,  $pttt)
    {
        $sql = "insert into hoadon(tenkhachhang, diachi, sdt, tongtien, pttt) values(?,?,?,?,?)";
        return pdo_execute_return_id($sql, $ten, $diaChi, $sdt, $tongTien, $pttt);
    }
    public function insertCTHoadon($hoaDonId, $sanPhamId, $soLuong, $gia)
    {
        $sql = "insert into chitiethoadon(id_hoadon, id_sanpham, soluong, gia) values(?,?,?,?)";
        return pdo_execute($sql, $hoaDonId, $sanPhamId, $soLuong, $gia);
    }
}
