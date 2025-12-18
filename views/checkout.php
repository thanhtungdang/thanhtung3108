<?php include_once('layouts/header.php'); ?>

<style>
    /* Tổng thể nền trang */
    .checkout-page-bg {
        background-color: #0a091e; /* Màu nền tối đồng bộ Barca */
        padding: 60px 0;
        min-height: 80vh;
        color: #ffffff;
    }

    /* Thông báo lỗi */
    .thong-bao-loi { color: #ff4d4d; font-size: 0.85em; display: none; margin-top: 5px; }
    .vien-do-loi { border: 2px solid #ff4d4d !important; }

    /* Card thông tin khách hàng */
    .checkout__input p { font-weight: 700; color: #edbb00; margin-bottom: 8px; text-transform: uppercase; font-size: 13px; }
    .checkout__input input { 
        width: 100%; 
        padding: 12px; 
        border: 1px solid #333; 
        border-radius: 8px; 
        background-color: #181733; 
        color: white;
        margin-bottom: 5px; 
    }
    .checkout__input input:focus { border-color: #edbb00; outline: none; }

    /* Card tóm tắt đơn hàng */
    .checkout__order { 
        background: #ffffff; 
        padding: 30px; 
        border-radius: 15px; 
        color: #181733; /* Chữ tối trên nền trắng để dễ đọc */
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .checkout__order h4 { color: #181733; font-weight: 800; border-bottom: 2px solid #a50044; padding-bottom: 10px; }
    
    .checkout__order__products { font-weight: 700; color: #181733; border-bottom: 1px solid #eee; padding-bottom: 10px; }
    .order-item-list { list-style: none; padding: 0; margin: 15px 0; }
    .order-item-list li { display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px dashed #ddd; padding-bottom: 5px; }

    /* Nút bấm */
    .btn-submit-order { 
        background: #a50044; 
        color: white; 
        width: 100%; 
        padding: 15px; 
        border-radius: 10px; 
        font-weight: 800; 
        border: none; 
        transition: 0.3s;
        text-transform: uppercase;
    }
    .btn-submit-order:hover:not(:disabled) { background: #181733; color: #edbb00; transform: translateY(-3px); }
    .btn-submit-order:disabled { background: #555 !important; cursor: not-allowed; }

    /* QR Code */
    #khung_ma_qr { background: white; padding: 15px; border-radius: 10px; margin-top: 15px; display: inline-block; }
</style>

<div class="checkout-page-bg">
    <div class="container">
        <h2 class="mb-5 fw-bold" style="color: #edbb00; border-left: 6px solid #a50044; padding-left: 15px;">THANH TOÁN ĐƠN HÀNG</h2>
        
        <?php if (empty($listCart)): ?>
            <div class="alert alert-warning text-center py-5">
                <h4>Giỏ hàng trống!</h4>
                <a href="index.php?action=shop" class="btn btn-danger mt-3">Quay lại Shop</a>
            </div>
        <?php else: ?>
            <form action="index.php?action=checkout&act=add1" method="POST" id="formThanhToan">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="checkout__input mb-4">
                            <p>Họ tên người nhận<span>*</span></p>
                            <input type="text" name="ten" id="nhap_ten" value="<?= $_SESSION['user']['name'] ?>" placeholder="Nhập tên khách hàng">
                            <small class="thong-bao-loi" id="loi_ten">Vui lòng nhập họ tên</small>
                        </div>
                        <div class="checkout__input mb-4">
                            <p>Địa chỉ giao hàng<span>*</span></p>
                            <input type="text" name="diachi" id="nhap_diachi" value="<?= $_SESSION['user']['address'] ?>" placeholder="Số nhà, tên đường, phường/xã...">
                            <small class="thong-bao-loi" id="loi_diachi">Vui lòng nhập địa chỉ</small>
                        </div>
                        <div class="checkout__input mb-4">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="text" name="dienthoai" id="nhap_dienthoai" value="<?= $_SESSION['user']['tel'] ?>" placeholder="Ví dụ: 0912345678">
                            <small class="thong-bao-loi" id="loi_dienthoai">SĐT không hợp lệ (Phải đủ 10 số)</small>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="checkout__order">
                            <h4>ĐƠN HÀNG CỦA BẠN</h4>
                            <div class="checkout__order__products d-flex justify-content-between">
                                <span>SẢN PHẨM</span>
                                <span>THÀNH TIỀN</span>
                            </div>
                            <ul class="order-item-list">
                                <?php foreach ($listCart as $item): ?>
                                    <li>
                                        <span><?= $item['name'] ?> <b class="text-danger">x<?= $item['soluong'] ?></b></span>
                                        <span class="fw-bold"><?= number_format($item['price'] * $item['soluong']) ?> đ</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            
                            <div class="d-flex justify-content-between fs-4 fw-bold mb-4" style="color: #a50044;">
                                <span>TỔNG CỘNG:</span>
                                <span><?= number_format($tongTien) ?> đ</span>
                            </div>

                            <div class="payment-selection mb-4">
                                <p class="fw-bold mb-2">PHƯƠNG THỨC THANH TOÁN:</p>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="pttt" id="payment0" value="0" checked>
                                    <label class="form-check-label fw-bold" for="payment0">Thanh toán tiền mặt (COD)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pttt" id="payment1" value="1">
                                    <label class="form-check-label fw-bold" for="payment1">Chuyển khoản VietQR</label>
                                </div>
                            </div>

                            <div id="khung_ma_qr" class="text-center w-100 mb-4" style="display: none;">
                                <p class="small text-muted mb-2">Quét mã để thanh toán nhanh:</p>
                                <img src="https://img.vietqr.io/image/MB-00000310800000-compact2.png?amount=<?= $tongTien ?>&addInfo=TT%20Barca%20<?= $_SESSION['user']['user'] ?>" 
                                     class="img-fluid" style="max-width: 200px;">
                            </div>

                            <button type="submit" class="btn-submit-order" id="nutDatHang" disabled>
                                XÁC NHẬN ĐẶT HÀNG
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const oNhapTen = document.getElementById('nhap_ten');
        const oNhapDiaChi = document.getElementById('nhap_diachi');
        const oNhapSDT = document.getElementById('nhap_dienthoai');
        const nutDatHang = document.getElementById('nutDatHang');
        const rdoQR = document.getElementById('payment1');
        const rdoCOD = document.getElementById('payment0');
        const khungQR = document.getElementById('khung_ma_qr');

        function validate() {
            const tenValid = oNhapTen.value.trim().length > 0;
            const diachiValid = oNhapDiaChi.value.trim().length > 0;
            const sdtValid = /^(0)[0-9]{9}$/.test(oNhapSDT.value.trim());

            // Hiển thị lỗi trực quan
            document.getElementById('loi_ten').style.display = tenValid ? 'none' : 'block';
            document.getElementById('loi_diachi').style.display = diachiValid ? 'none' : 'block';
            document.getElementById('loi_dienthoai').style.display = sdtValid ? 'none' : 'block';

            const isAllValid = tenValid && diachiValid && sdtValid;
            nutDatHang.disabled = !isAllValid;
            
            khungQR.style.display = rdoQR.checked ? 'block' : 'none';
            
            if(isAllValid) {
                nutDatHang.innerText = rdoQR.checked ? "Đã chuyển khoản & Đặt hàng" : "Xác nhận đặt hàng";
            } else {
                nutDatHang.innerText = "Vui lòng nhập đủ thông tin";
            }
        }

        [oNhapTen, oNhapDiaChi, oNhapSDT].forEach(el => el.addEventListener('input', validate));
        [rdoQR, rdoCOD].forEach(el => el.addEventListener('change', validate));
        
        validate();
    });
</script>

<?php include_once('layouts/footer.php'); ?>