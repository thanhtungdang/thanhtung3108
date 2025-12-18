
<style>
    :root {
        --fcb-navy: #181733;
        --fcb-red: #a50044;
        --fcb-gold: #edbb00;
        --fcb-bg: #0a091e;
    }

    /* Vùng chứa bọc ngoài đảm bảo không vỡ layout tổng */
    .auth-page-wrapper {
        background-image: linear-gradient(rgba(10, 9, 30, 0.85), rgba(10, 9, 30, 0.85)), 
                          url('https://www.fcbarcelona.com/fcbarcelona/photo/2022/08/02/ae1570d6-1934-4b5b-9d41-451e06e33055/1920x1080_LALIGA_ESTADI.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 50px 0;
    }

    .auth-container {
        background: #fff;
        width: 100%;
        max-width: 450px;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        border-top: 6px solid var(--fcb-gold);
        margin: 0 15px;
    }

    .auth-container h2 {
        color: var(--fcb-navy);
        font-weight: 800;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        font-size: 12px;
        color: var(--fcb-navy);
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: var(--fcb-red);
        outline: none;
        box-shadow: 0 0 5px rgba(165, 0, 68, 0.2);
    }

    .btn-auth {
        background: var(--fcb-navy);
        color: #fff;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-auth:hover {
        background: var(--fcb-red);
        transform: translateY(-2px);
    }

    .auth-switch {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #666;
    }

    .auth-switch a {
        color: var(--fcb-red);
        text-decoration: none;
        font-weight: 700;
    }

    .auth-switch a:hover {
        text-decoration: underline;
    }
</style>

<div class="auth-page-wrapper">
    <div class="auth-container shadow">
        <h2>BLAUGRANA</h2>

        <div id="login-section">
            <h5 class="text-center mb-4 fw-bold" style="color: var(--fcb-navy);">ĐĂNG NHẬP CULERS</h5>
            <form action="index.php?action=login_submit" method="POST">
                <div class="form-group">
                    <label>Tên đăng nhập (User)</label>
                    <input type="text" name="user_input" class="form-control" placeholder="Nhập username" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="pass_input" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-auth">Đăng nhập ngay</button>
            </form>
            <div class="auth-switch">
                Bạn chưa có tài khoản? <a href="javascript:void(0)" onclick="toggleAuth('reg')">Đăng ký thành viên</a>
            </div>
        </div>

        <div id="register-section" style="display: none;">
            <h5 class="text-center mb-4 fw-bold" style="color: var(--fcb-navy);">ĐĂNG KÝ THÀNH VIÊN</h5>
            <form action="index.php?action=register_submit" method="POST">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Nhập họ tên đầy đủ" required>
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập (User)</label>
                    <input type="text" name="username" class="form-control" placeholder="Tên để đăng nhập" required>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="tel" class="form-control" placeholder="Số điện thoại liên hệ" required>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Địa chỉ nhận hàng" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="repass" class="form-control" placeholder="Xác nhận mật khẩu" required>
                </div>
                <button type="submit" class="btn-auth">Tạo tài khoản Blaugrana</button>
            </form>
            <div class="auth-switch">
                Đã có tài khoản? <a href="javascript:void(0)" onclick="toggleAuth('login')">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleAuth(mode) {
        const loginSection = document.getElementById('login-section');
        const registerSection = document.getElementById('register-section');
        
        if (mode === 'reg') {
            loginSection.style.display = 'none';
            registerSection.style.display = 'block';
        } else {
            loginSection.style.display = 'block';
            registerSection.style.display = 'none';
        }
    }
</script>