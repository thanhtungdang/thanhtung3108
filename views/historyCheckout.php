<style>
    :root { --fcb-navy: #181733; --fcb-red: #a50044; --fcb-gold: #edbb00; }
    .history-container { padding: 50px 0; min-height: 80vh; background: #f8f9fa; }
    .table-history { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .table-history thead { background: var(--fcb-navy); color: white; }
    .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; }
    .status-0 { background: #ffeeba; color: #856404; } /* Chờ xử lý */
    .status-1 { background: #b8daff; color: #004085; } /* Đang giao */
    .status-2 { background: #c3e6cb; color: #155724; } /* Hoàn thành */
    .btn-detail { background: var(--fcb-red); color: white; border: none; padding: 5px 15px; border-radius: 5px; transition: 0.3s; }
    .btn-detail:hover { background: var(--fcb-navy); color: var(--fcb-gold); }
</style>

<div class="history-container">
    <div class="container">
        <h3 class="fw-bold mb-4" style="color: var(--fcb-navy);">LỊCH SỬ ĐƠN HÀNG CULERS</h3>
        
        <?php if (empty($listHistory)): ?>
            <div class="alert alert-info">Bạn chưa có đơn hàng nào. <a href="index.php?action=shop">Mua sắm ngay!</a></div>
        <?php else: ?>
            <div class="table-responsive table-history">
                <table class="table table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="py-3 ps-4">Mã đơn</th>
                            <th class="py-3">Ngày đặt</th>
                            <th class="py-3">Tổng tiền</th>
                            <th class="py-3">Phương thức</th>
                            <th class="py-3 text-center">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listHistory as $hd): ?>
                            <tr>
                                <td class="ps-4 fw-bold">#BARCA-<?= $hd['id'] ?></td>
                                <td><?= date("d/m/Y H:i", strtotime($hd['ngay_dat'] ?? 'now')) ?></td>
                                <td class="text-danger fw-bold"><?= number_format($hd['tongtien']) ?>đ</td>
                                <td><?= ($hd['pttt'] == 1) ? 'Chuyển khoản' : 'Tiền mặt' ?></td>
                                <td class="text-center">
                                    <a href="index.php?action=HistoryCheckoutDetail&id=<?= $hd['id'] ?>" class="btn-detail text-decoration-none">
                                        <i class="fa-solid fa-eye me-1"></i> Xem
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>