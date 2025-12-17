<?php
include_once("Model/DanhMuc.php");
class DanhMucController
{
    private $danhMuc;

    public function __construct()
    {
        $this->danhMuc = new DanhMuc();
    }

    // Phương thức list
    public function index()
    {

        include_once("./views/login.php");
    }
    public function list()
    {
        $allDanhMuc = $this->danhMuc->getAll();
        include_once("./views/danhmuc/list.php");
    }

    public function create()
    {
        include_once("./views/danhmuc/create.php");
    }

    public function store()
    {
        if (isset($_POST['ten'])) {
            $ten = $_POST['ten'];
            $this->danhMuc->insert($ten);
            header("Location:index.php?action=listdanhmuc");
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $danhMuc = $this->danhMuc->getOne($id);
            include_once("./views/danhmuc/edit.php");
        }
    }

    public function update()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $this->danhMuc->update($id, $ten);
            header("Location:index.php?action=listdanhmuc");
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->danhMuc->delete($id);
            header("Location:index.php?action=listdanhmuc");
        }
    }

    public function restore()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->danhMuc->restore($id);
            header("Location:index.php?action=listdanhmuc");
        }
    }
}
