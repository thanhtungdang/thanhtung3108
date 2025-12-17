<?php
include_once("pdo.php");

class SanPham
{
    // Lấy danh sách sản phẩm
    public function getAll()
    {
        $sql = "select * from sanpham";
        return pdo_query($sql);
    }

    // Thêm mới (Mặc định cột size để rỗng, sẽ cập nhật sau nếu cần)
    public function insert($ten, $gia, $moTa, $idDanhMuc, $anh)
    {
        $sql = "insert into sanpham (name, price, img, mota, iddm, size) values (?, ?, ?, ?, ?, '')";
        pdo_execute($sql, $ten, $gia, $anh, $moTa, $idDanhMuc);
    }

    // Lấy 1 sản phẩm để sửa
    public function getOne($id)
    {
        $sql = "select * from sanpham where id = ?";
        return pdo_query_one($sql, $id);
    }

    // Cập nhật thông tin chung
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

    // Xóa mềm
    public function delete($id)
    {
        $sql = "update sanpham set deleted = 1 where id = ?";
        pdo_execute($sql, $id);
    }

    // Khôi phục
    public function restore($id)
    {
        $sql = "update sanpham set deleted = 0 where id = ?";
        pdo_execute($sql, $id);
    }

    // --- PHẦN XỬ LÝ SIZE (MỚI) ---

    // Lấy danh sách size của 1 sản phẩm
    public function getAllSize($idSanPham)
    {
        $sql = "select * from sanpham_size where id_sanpham = ?";
        return pdo_query($sql, $idSanPham);
    }

    // Cập nhật size (Logic đơn giản: Xóa hết cũ -> Thêm mới -> Cập nhật text hiển thị)
    public function updateSize($idSanPham, $mangTenSize, $mangSoLuong)
    {
        // 1. Xóa hết size cũ của sản phẩm này đi
        $sqlXoa = "delete from sanpham_size where id_sanpham = ?";
        pdo_execute($sqlXoa, $idSanPham);

        // 2. Thêm lại từ đầu
        $chuoiHienThi = ""; // Biến này để nối chuỗi "S, M, L" lưu vào bảng sanpham cho đẹp
        $sqlThem = "insert into sanpham_size (id_sanpham, size, soluong) values (?, ?, ?)";

        // Lặp qua mảng và insert luôn, không kiểm tra gì cả
        foreach ($mangTenSize as $index => $tenSize) {
            $soLuong = $mangSoLuong[$index];

            pdo_execute($sqlThem, $idSanPham, $tenSize, $soLuong);

            // Nối chuỗi tên size (ví dụ: "S, ")
            $chuoiHienThi .= $tenSize . ", ";
        }

        // 3. Cập nhật lại cột 'size' bảng sanpham (Cắt dấu phẩy thừa ở cuối)
        $chuoiHienThi = rtrim($chuoiHienThi, ", ");
        $sqlCapNhatText = "update sanpham set size = ? where id = ?";
        pdo_execute($sqlCapNhatText, $chuoiHienThi, $idSanPham);
    }
}