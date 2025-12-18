<style>
    .detail-container { padding: 50px 0; background: #f4f4f4; }
    .invoice-box { background: #fff; padding: 30px; border-radius: 15px; border-top: 5px solid var(--fcb-red); }
    .info-label { font-weight: bold; color: var(--fcb-navy); text-transform: uppercase; font-size: 13px; }
    .product-img { width: 70px; height: 70px; object-fit: cover; border-radius: 8px; }
</style>

<div class="detail-container">
    <div class="container">
        <div class="invoice-box shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0" style="color: var(--fcb-navy);">CHI TIẾT ĐƠN HÀNG #<?= $hoaDon['id'] ?></h4>
                <a href="index.php?action=HistoryCheckout" class="btn btn-outline-secondary btn-sm">Quay lại</a>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <p class="mb-1"><span class="info-label">Người nhận:</span> <?= $hoaDon['name'] ?></p>
                    <p class="mb-1"><span class="info-label">Số điện thoại:</span> <?= $hoaDon['tel'] ?></p>
                    <p class="mb-1"><span class="info-label">Địa chỉ:</span> <?= $hoaDon['address'] ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-1"><span class="info-label">Ngày đặt:</span> <?= $hoaDon['ngay_dat'] ?></p>
                    <p class="mb-1"><span class="info-label">Trạng thái:</span> <span class="badge bg-success">Đã xác nhận</span></p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-end">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($listChiTiet as $item): 
                            $subtotal = $item['gia'] * $item['soluong'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="admin/<?= $item['img'] ?>" class="product-img me-3" alt="">
                                        <span class="fw-bold"><?= $item['name'] ?></span>
                                    </div>
                                </td>
                                <td><?= number_format($item['gia']) ?>đ</td>
                                <td class="text-center"><?= $item['soluong'] ?></td>
                                <td class="text-end fw-bold"><?= number_format($subtotal) ?>đ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold py-3">TỔNG CỘNG:</td>
                            <td class="text-end text-danger fw-bold fs-5 py-3"><?= number_format($total) ?>đ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>