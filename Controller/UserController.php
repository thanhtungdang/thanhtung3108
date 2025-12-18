<?php
require_once __DIR__ . '/../Model/User.php';

class UserController {
    public function login() {
        include_once __DIR__ . '/../views/login_register.php';
    }

    public function login_submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = trim($_POST['user_input']);
            $pass = trim($_POST['pass_input']);
            $account = user_check($user, $pass);

            if (!$account) {
                echo "<script>alert('Sai tài khoản hoặc mật khẩu!'); history.back();</script>";
                return;
            }
            if ($account['role'] == 1) {
                echo "<script>alert('Tài khoản Admin không được đăng nhập tại đây!'); history.back();</script>";
                return;
            }

            $_SESSION['user'] = $account;
            header("Location: index.php");
            exit;
        }
    }

    public function register_submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $repass = $_POST['repass'];
            $address = $_POST['address']; 
            $tel = $_POST['tel'];         

            if ($pass !== $repass) {
                echo "<script>alert('Mật khẩu không khớp!'); history.back();</script>";
                return;
            }
            if (user_exists($user)) {
                echo "<script>alert('Tên đăng nhập đã tồn tại!'); history.back();</script>";
                return;
            }

            user_insert($fullname, $user, $email, $pass, $address, $tel);
            echo "<script>alert('Đăng ký thành công!'); window.location='index.php?action=login';</script>";
            exit;
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        header("Location: index.php");
        exit;
    }

    //HÀM PROFILE
    public function profile() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        include_once __DIR__ . '/../views/profile.php';
    }

    //CẬP NHẬT PROFILE
    public function update_profile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $tel = $_POST['tel'];

            // cập nhật vào Database
            user_update($id, $fullname, $email, $address, $tel);

            // làm mới Session để Header/View nhận thông tin mới
            $_SESSION['user'] = user_select_by_id($id);

            // thông báo và chuyển hướng về trang profile
            echo "<script>
                alert('Cập nhật thông tin thành công!');
                window.location.href = 'index.php?action=profile';
            </script>";
            exit;
        }
    }
}