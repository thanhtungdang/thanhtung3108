<?php
include_once("pdo.php");
class ThongKe
{
    public function getAllNew()
    {
        $sql = "SELECT sp.*, dm.name AS tendanhmuc
                FROM sanpham sp
                JOIN danhmuc dm ON sp.iddm = dm.id
                WHERE sp.deleted = 0
                ORDER BY sp.id DESC
                LIMIT 10";
        return pdo_query($sql);
    }
    public function getAllBanChay()
    {
        $sql = "SELECT sp.*, dm.name AS tendanhmuc,
                       SUM(cthd.soluong) AS tong_mua
                FROM chitiethoadon cthd
                JOIN hoadon hd ON cthd.id_hoadon = hd.id
                JOIN sanpham sp ON cthd.id_sanpham = sp.id
                JOIN danhmuc dm ON sp.iddm = dm.id
                WHERE hd.trangthai != 4
                GROUP BY sp.id
                ORDER BY tong_mua DESC
                LIMIT 10";
        return pdo_query($sql);
    }
    public function soLuongBan()
    {
        $sql = "SELECT SUM(cthd.soluong) AS tong_soluong
                FROM chitiethoadon cthd
                JOIN hoadon hd ON cthd.id_hoadon = hd.id
                WHERE hd.trangthai != 4";
        return pdo_query_one($sql);
    }
    public function doanhThu()
    {
        return pdo_query_one(
            "SELECT SUM(tongtien) AS tongDoanhThu
             FROM hoadon
             WHERE trangthai != 4"
        );
    }
    public function tongDonHang()
    {
        return pdo_query_one(
            "SELECT COUNT(*) AS tongdon
             FROM hoadon
             WHERE trangthai != 4"
        );
    }
    public function loadSodo($from, $to)
    {
        $sql = "SELECT DATE(ngaygiodat) AS ngay,
                       COUNT(id) AS so_luong_don,
                       SUM(tongtien) AS doanh_thu
                FROM hoadon
                WHERE trangthai != 4
                AND ngaygiodat BETWEEN '$from' AND '$to'
                GROUP BY DATE(ngaygiodat)
                ORDER BY ngay";
        return pdo_query($sql);
    }
}
