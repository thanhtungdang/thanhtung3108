<?php
require_once("pdo.php");

class HoaDon
{
    public function getAll()
    {
        $sql = "SELECT * FROM hoadon ORDER BY id DESC";
        return pdo_query($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM hoadon WHERE id = ?";
        return pdo_query_one($sql, $id);
    }

    public function updateStatus($id, $trangthai)
    {
        $sql = "UPDATE hoadon SET trangthai = ? WHERE id = ?";
        pdo_execute($sql, $trangthai, $id);
    }

    public function getChiTiet($id_hoadon)
    {
        $sql = "SELECT ct.*, s.name as ten_sp, s.img as anh_sp 
                FROM chitiethoadon ct 
                JOIN sanpham s ON ct.id_sanpham = s.id 
                WHERE ct.id_hoadon = ?";

        return pdo_query($sql, $id_hoadon);
    }
}
