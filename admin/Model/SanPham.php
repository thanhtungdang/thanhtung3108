<?php
include_once("pdo.php");

class SanPham
{
    public function getAll()
    {
        $sql = "select * from sanpham";
        return pdo_query($sql);
    }

    public function insert($ten, $gia, $moTa, $idDanhMuc, $anh)
    {
        $sql = "insert into sanpham (name, price, img, mota, iddm, size) values (?, ?, ?, ?, ?, '')";
        pdo_execute($sql, $ten, $gia, $anh, $moTa, $idDanhMuc);
    }

    public function getOne($id)
    {
        $sql = "select * from sanpham where id = ?";
        return pdo_query_one($sql, $id);
    }

    public function update($id, $ten, $gia, $moTa, $idDanhMuc, $anh)
    {
        if ($anh == null) {
            $sql = "update sanpham set `name` = ?, price = ?, mota = ?, iddm = ? where id = ?";
            pdo_execute($sql, $ten, $gia, $moTa, $idDanhMuc, $id);
        } else {
            $sql = "update sanpham set `name` = ?, price = ?, img = ?, mota = ?, iddm = ? where id = ?";
            pdo_execute($sql, $ten, $gia, $anh, $moTa, $idDanhMuc, $id);
        }
    }

    public function delete($id)
    {
        $sql = "update sanpham set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }

    public function restore($id)
    {
        $sql = "update sanpham set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }

    public function getAllSize($idSanPham)
    {
        $sql = "select * from sanpham_size where id_sanpham = ?";
        return pdo_query($sql, $idSanPham);
    }

    public function updateSize($idSanPham, $mangTenSize, $mangSoLuong)
    {
        $sqlXoa = "delete from sanpham_size where id_sanpham = ?";
        pdo_execute($sqlXoa, $idSanPham);

        $chuoiHienThi = ""; 
        $sqlThem = "insert into sanpham_size (id_sanpham, size, soluong) values (?, ?, ?)";

        foreach ($mangTenSize as $index => $tenSize) {
            $soLuong = $mangSoLuong[$index];

            pdo_execute($sqlThem, $idSanPham, $tenSize, $soLuong);

            $chuoiHienThi .= $tenSize . ", ";
        }

        $chuoiHienThi = rtrim($chuoiHienThi, ", ");
        $sqlCapNhatText = "update sanpham set size = ? where id = ?";
        pdo_execute($sqlCapNhatText, $chuoiHienThi, $idSanPham);
    }
}