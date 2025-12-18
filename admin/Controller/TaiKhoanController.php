<?php
require_once __DIR__ . '/../Model/taikhoan.php';

class TaiKhoanController
{

    public function loginForm()
    {
        include_once __DIR__ . '/../views/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = trim($_POST['username']);
            $pass = trim($_POST['password']);

            $account = taikhoan_get_by_user($user);

            if (!$account || $account['pass'] !== $pass) {
                $error = 'Sai tên đăng nhập hoặc mật khẩu!';
                include_once __DIR__ . '/../views/login.php';
                return;
            }

            if ($account['role'] == 0) {
                $error = 'Tài khoản của bạn không có quyền truy cập trang quản trị!';
                include_once __DIR__ . '/../views/login.php';
                return;
            }

            $_SESSION['username'] = $account['user'];
            $_SESSION['id'] = $account['id'];
            $_SESSION['role'] = $account['role'];

            header("Location: index.php?action=listdanhmuc");
            exit;
        }
        include_once __DIR__ . '/../views/login.php';
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        session_start();
        header("Location: index.php?action=login");
        exit;
    }

    public function index()
    {
        $users = taikhoan_all();
        include_once __DIR__ . '/../views/taikhoan/listtaikhoan.php';
    }

    public function create()
    {
        include_once __DIR__ . '/../views/taikhoan/createtaikhoan.php';
    }

    public function store()
    {
        taikhoan_insert($_POST['name'], $_POST['email'], $_POST['address'], $_POST['user'], $_POST['pass'], $_POST['role']);
        header("Location: index.php?action=listtaikhoan");
        exit;
    }

    public function edit()
    {
        $user = taikhoan_get_one($_GET['id']);
        include_once __DIR__ . '/../views/taikhoan/edittaikhoan.php';
    }

    public function update()
    {
        taikhoan_update($_POST['id'], $_POST['name'], $_POST['email'], $_POST['address'], $_POST['user'], $_POST['role']);
        header("Location: index.php?action=listtaikhoan");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'];

        if ($id == $_SESSION['id']) {
            echo "<script>alert('Không thể xoá tài khoản đang đăng nhập!'); window.location='index.php?action=listtaikhoan';</script>";
            exit;
        }

        taikhoan_delete($id);
        header("Location: index.php?action=listtaikhoan");
        exit;
    }
}
