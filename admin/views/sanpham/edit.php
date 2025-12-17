<?php
include_once("views/layouts/header.php");
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form sửa sản phẩm</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="index.php?action=updatesanpham" enctype="multipart/form-data" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label>Danh mục</label>
                                    <select name="danhmuc" class="form-select">
                                        <?php foreach ($allDanhMuc as $item) { ?>
                                            <option <?= $sanPham['iddm'] == $item['id'] ? "selected" : "" ?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" class="form-control" name="ten" value="<?= $sanPham['name'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required type="number" class="form-control" name="gia" value="<?= $sanPham['price'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="anh">
                                    <?php if($sanPham['img']) { ?>
                                        <img src="<?= $sanPham['img'] ?>" width="100" style="margin-top:10px">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <input required type="text" class="form-control" name="mota" value="<?= $sanPham['mota'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <hr>
                                <h5 style="margin-bottom: 15px;">Quản lý kho (Nhập tối đa 4 size)</h5>
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Size</th>
                                            <th>Số lượng tồn kho</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="text" class="form-control" name="size1" value="<?= $s1 ?>" placeholder="Ví dụ: S">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="sl1" value="<?= $sl1 ?>">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <input type="text" class="form-control" name="size2" value="<?= $s2 ?>" placeholder="Ví dụ: M">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="sl2" value="<?= $sl2 ?>">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <input type="text" class="form-control" name="size3" value="<?= $s3 ?>" placeholder="Ví dụ: L">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="sl3" value="<?= $sl3 ?>">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <input type="text" class="form-control" name="size4" value="<?= $s4 ?>" placeholder="Ví dụ: XL">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="sl4" value="<?= $sl4 ?>">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p style="font-style: italic; color: red;">* Muốn xóa size nào chỉ cần xóa tên size ở dòng đó đi và bấm Sửa.</p>
                            </div>

                            <input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Sửa</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Làm mới</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once("views/layouts/footer.php");
?>