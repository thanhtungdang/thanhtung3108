<?php
include_once("pdo.php");
class ThongKe
{
    // 10 sản phẩm mới
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
    // 10 sản phẩm bán chạy
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
    // Tổng số sản phẩm đã bán
    public function soLuongBan()
    {
        $sql = "SELECT SUM(cthd.soluong) AS tong_soluong
                FROM chitiethoadon cthd
                JOIN hoadon hd ON cthd.id_hoadon = hd.id
                WHERE hd.trangthai != 4";
        return pdo_query_one($sql);
    }
    // Tổng doanh thu
    public function doanhThu()
    {
        return pdo_query_one(
            "SELECT SUM(tongtien) AS tongDoanhThu
             FROM hoadon
             WHERE trangthai != 4"
        );
    }
    // Tổng đơn hàng
    public function tongDonHang()
    {
        return pdo_query_one(
            "SELECT COUNT(*) AS tongdon
             FROM hoadon
             WHERE trangthai != 4"
        );
    }
    // Doanh thu theo ngày (biểu đồ)
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
