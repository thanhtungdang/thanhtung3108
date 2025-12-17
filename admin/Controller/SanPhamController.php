<?php
include_once("Model/SanPham.php");
class SanPhamController
{
    private $sanPham;
    private $danhMuc;
    
    public function __construct()
    {
        $this->sanPham = new SanPham();
        $this->danhMuc = new DanhMuc();
    }

    public function index()
    {
        $allSanPham = $this->sanPham->getAll();
        foreach ($allSanPham as $key => $item) {
            $allSanPham[$key]['tendanhmuc'] = $this->danhMuc->getOne($item['iddm'])['name'];
        }
        include_once("./views/sanpham/list.php");
    }

    public function create()
    {
        $allDanhMuc = $this->danhMuc->getAll();
        include_once("./views/sanpham/create.php");
    }

    public function store()
    {
        if (isset($_POST['ten'])) {
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $moTa = $_POST['mota'];
            $idDanhMuc = $_POST['danhmuc'];
            if (isset($_FILES['anh'])) {
                $imageName = "image/" . uniqid() . "_" . $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], $imageName);
                $this->sanPham->insert($ten, $gia, $moTa, $idDanhMuc, $imageName);
            }
            header("Location:index.php?action=listsanpham");
        }
    }

    // --- SỬA HÀM EDIT THEO CÁCH THỦ CÔNG ---
    public function edit()
    {
        if (isset($_GET['id'])) {
            $allDanhMuc = $this->danhMuc->getAll();
            $id = $_GET['id'];
            $sanPham = $this->sanPham->getOne($id);
            
            // 1. Lấy tất cả size từ DB lên
            $listSize = $this->sanPham->getAllSize($id);

            // 2. Gán thủ công ra từng biến lẻ để dễ hiển thị ngoài View
            // Dòng 1
            $s1 = ""; $sl1 = 0;
            if(isset($listSize[0])) { $s1 = $listSize[0]['size']; $sl1 = $listSize[0]['soluong']; }

            // Dòng 2
            $s2 = ""; $sl2 = 0;
            if(isset($listSize[1])) { $s2 = $listSize[1]['size']; $sl2 = $listSize[1]['soluong']; }

            // Dòng 3
            $s3 = ""; $sl3 = 0;
            if(isset($listSize[2])) { $s3 = $listSize[2]['size']; $sl3 = $listSize[2]['soluong']; }
            
            // Dòng 4
            $s4 = ""; $sl4 = 0;
            if(isset($listSize[3])) { $s4 = $listSize[3]['size']; $sl4 = $listSize[3]['soluong']; }

            // Truyền các biến $s1, $s2... này sang view edit.php
            include_once("./views/sanpham/edit.php");
        }
    }

    // --- SỬA HÀM UPDATE THEO CÁCH THỦ CÔNG ---
    public function update()
    {
        if (isset($_POST['ten'])) {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $moTa = $_POST['mota'];
            $idDanhMuc = $_POST['danhmuc'];
            
            // Xử lý ảnh
            $imageName = null;
            if (isset($_FILES['anh']) && $_FILES['anh']['name'] != '') {
                $linkAnhCu = $this->sanPham->getOne($id)['img'];
                $imageName = "image/" . uniqid() . "_" . $_FILES['anh']['name'];
                move_uploaded_file($_FILES['anh']['tmp_name'], $imageName);
                if (file_exists($linkAnhCu)) {
                    unlink($linkAnhCu);
                }
            }
            // Update thông tin chung
            $this->sanPham->update($id, $ten, $gia, $moTa, $idDanhMuc, $imageName);


            // --- XỬ LÝ SIZE (GOM BIẾN LẺ THÀNH MẢNG) ---
            $mangTenSize = [];
            $mangSoLuong = [];

            // Kiểm tra từng dòng input, nếu có nhập chữ thì mới lấy
            if(!empty($_POST['size1'])) {
                array_push($mangTenSize, $_POST['size1']);
                array_push($mangSoLuong, $_POST['sl1']);
            }
            if(!empty($_POST['size2'])) {
                array_push($mangTenSize, $_POST['size2']);
                array_push($mangSoLuong, $_POST['sl2']);
            }
            if(!empty($_POST['size3'])) {
                array_push($mangTenSize, $_POST['size3']);
                array_push($mangSoLuong, $_POST['sl3']);
            }
            if(!empty($_POST['size4'])) {
                array_push($mangTenSize, $_POST['size4']);
                array_push($mangSoLuong, $_POST['sl4']);
            }

            // Gọi Model để lưu mảng này vào DB
            $this->sanPham->updateSize($id, $mangTenSize, $mangSoLuong);

            header("Location:index.php?action=listsanpham");
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->sanPham->delete($id);
            header("Location:index.php?action=listsanpham");
        }
    }

    public function restore()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->sanPham->restore($id);
            header("Location:index.php?action=listsanpham");
        }
    }
}