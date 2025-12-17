<?php
include_once("views/layouts/header.php");
?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Chi tiết Hóa đơn #<?= $hoaDon['id'] ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?action=listhoadon">Hóa đơn</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="?action=listhoadon" class="btn btn-primary mb-3"> Quay lại </a>

                <h5 class="mb-3">Thông tin đơn hàng</h5>
                <table class="table table-striped table-bordered mb-4">
                    <tr>
                        <th width="200">Mã đơn hàng</th>
                        <td>#<?= $hoaDon['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Khách hàng</th>
                        <td><?= $hoaDon['tenkhachhang'] ?> - <?= $hoaDon['sdt'] ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ giao hàng</th>
                        <td><?= $hoaDon['diachi'] ?></td>
                    </tr>
                    <tr>
                        <th>Ngày đặt</th>
                        <td><?= $hoaDon['ngaygiodat'] ?></td>
                    </tr>
                    <tr>
                        <th>Phương thức thanh toán</th>

                        <?php
                        if ($hoaDon['pttt'] == 1) { ?>
                            <td>Chuyển khoản</td>
                        <?php } else { ?>
                            <td>Thanh toán khi nhận hàng (COD)</td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                            <form action="?action=update_status" method="POST" class="d-flex gap-2" style="max-width: 300px;">
                                <input type="hidden" name="id" value="<?= $hoaDon['id'] ?>">
                                <select name="trangthai" id="select_trangthai" class="form-select form-select-sm">
                                    <option value="0" <?= $hoaDon['trangthai'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                                    <option value="1" <?= $hoaDon['trangthai'] == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                                    <option value="2" <?= $hoaDon['trangthai'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                                    <option value="3" <?= $hoaDon['trangthai'] == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                                    <option value="4" <?= $hoaDon['trangthai'] == 4 ? 'selected' : '' ?>>Đã hủy</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                            </form>
                        </td>
                    </tr>
                </table>

                <h5 class="mb-3">Danh sách sản phẩm</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($listChiTiet)): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Chưa có sản phẩm</td>
                            </tr>

                        <?php else: ?>
                            <?php foreach ($listChiTiet as $i => $item): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= $item['ten_sp'] ?></td>
                                    <td><img src="./<?= $item['anh_sp'] ?>" width="50" alt="img" style="object-fit: cover; border-radius: 5px;"></td>
                                    <td><?= number_format($item['gia']) ?> đ</td>
                                    <td><?= $item['soluong'] ?></td>
                                    <td class="fw-bold"><?= number_format($item['gia'] * $item['soluong']) ?> đ</td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                    <tfoot>
                        <tr class="bg-danger text-white"> 
                            <td colspan="5" class="text-end fw-bold fs-5" style="border: none;">TỔNG TIỀN THANH TOÁN:</td>
                            <td class="fw-bold fs-5 text-white" style="border: none;">
                                <?= number_format($hoaDon['tongtien']) ?> đ
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </section>
</div>

<?php
include_once("views/layouts/footer.php");
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Lấy giá trị trạng thái hiện tại từ PHP
    var trangThaiHienTai = <?= isset($hoaDon['trangthai']) ? $hoaDon['trangthai'] : 0 ?>;
    
    // 2. Lấy thẻ select
    var menu = document.getElementById('select_trangthai');

    if (menu) {
        // [Xử lý đặc biệt] Nếu đã Hoàn thành (3) hoặc Đã hủy (4) thì khóa cứng luôn menu
        if (trangThaiHienTai == 3 || trangThaiHienTai == 4) {
             menu.disabled = true;
        }

        // 3. Duyệt qua từng option
        for (var i = 0; i < menu.options.length; i++) {
            var optionValue = parseInt(menu.options[i].value);

            // LOGIC MỚI:
            // Chỉ mở khóa (enable) nếu option đó là:
            // 1. Chính trạng thái hiện tại (để giữ nguyên)
            // 2. HOẶC là bước kế tiếp liền kề (Hiện tại + 1)
            var isCurrent = (optionValue === trangThaiHienTai);
            var isNextStep = (optionValue === trangThaiHienTai + 1);

            if (isCurrent || isNextStep) {
                // Mở khóa, màu sắc bình thường
                menu.options[i].disabled = false;
                menu.options[i].style.color = ""; 
            } else {
                // Khóa tất cả các trường hợp còn lại (Quay lui, Nhảy cóc, Hủy ngang...)
                menu.options[i].disabled = true;
                menu.options[i].style.color = "#d1d1d1"; // Làm mờ
            }
        }
    }
});
</script>