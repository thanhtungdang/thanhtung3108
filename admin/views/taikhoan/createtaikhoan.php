<?php
include_once("views/layouts/header.php");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm tài khoản</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="index.php?action=storetaikhoan" method="POST">
                    <div class="mb-3">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>User</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Pass</label>
                        <input type="text" name="pass" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
include_once("views/layouts/footer.php");
?>