<style>
    :root { --fcb-navy: #181733; --fcb-red: #a50044; --fcb-gold: #edbb00; }
    .profile-container { background: #f8f9fa; padding: 50px 0; min-height: 80vh; }
    .profile-card { background: #fff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-top: 5px solid var(--fcb-gold); }
    .profile-header { background: var(--fcb-navy); color: white; padding: 25px; border-radius: 10px 10px 0 0; text-align: center; }
    .form-label { font-weight: 700; color: var(--fcb-navy); font-size: 13px; text-transform: uppercase; margin-bottom: 5px; }
    .btn-update { background: var(--fcb-red); color: white; font-weight: 700; text-transform: uppercase; border: none; padding: 12px; transition: 0.3s; }
    .btn-update:hover { background: var(--fcb-navy); color: var(--fcb-gold); transform: translateY(-2px); }
</style>

<div class="profile-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="profile-card">
                    <div class="profile-header">
                        <i class="fa-solid fa-user-pen fa-3x mb-2"></i>
                        <h4>THÔNG TIN TÀI KHOẢN</h4>
                        <p class="small mb-0 opacity-75">Chào mừng trở lại, Culers!</p>
                    </div>
                    <div class="p-4 p-md-5">
                        <form action="index.php?action=update_profile" method="POST">
                            <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control bg-light" value="<?= $_SESSION['user']['user'] ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Họ và tên Culers</label>
                                    <input type="text" name="fullname" class="form-control" value="<?= $_SESSION['user']['name'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email liên hệ</label>
                                    <input type="email" name="email" class="form-control" value="<?= $_SESSION['user']['email'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" name="tel" class="form-control" value="<?= $_SESSION['user']['tel'] ?>" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label class="form-label">Địa chỉ nhận hàng</label>
                                    <textarea name="address" class="form-control" rows="3" required><?= $_SESSION['user']['address'] ?></textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-update">CẬP NHẬT HỒ SƠ BLAUGRANA</button>
                                <a href="index.php" class="btn btn-outline-secondary fw-bold">QUAY LẠI TRANG CHỦ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>