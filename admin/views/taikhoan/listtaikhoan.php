<?php
include_once("views/layouts/header.php");
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Quản lý tài khoản</h3>
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
                <a href="?action=createtaikhoan" class="btn btn-primary mb-3">Thêm tài khoản</a>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?= $u['id'] ?></td>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['address'] ?></td>
                                <td><?= $u['user'] ?></td>
                                <td><?= $u['role'] == 1 ? 'Admin' : 'User' ?></td>
                                <td>
                                    <a href="index.php?action=edittaikhoan&id=<?= $u['id'] ?>" class="btn btn-secondary btn-sm">Sửa</a>

                                    <?php if ($u['id'] != $_SESSION['id']): ?>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                            href="index.php?action=deletetaikhoan&id=<?= $u['id'] ?>"
                                            class="btn btn-danger btn-sm">Xóa</a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php
include_once("views/layouts/footer.php");
?>