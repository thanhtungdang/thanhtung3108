<?php
require_once __DIR__ . '/pdo.php';

function taikhoan_all()
{
    $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
    return pdo_query($sql);
}

function taikhoan_get_one($id)
{
    $sql = "SELECT * FROM taikhoan WHERE id=?";
    return pdo_query_one($sql, $id);
}

function taikhoan_insert($name, $email, $address, $user, $pass, $role)
{
    $sql = "INSERT INTO taikhoan(name,email,address,user,pass,role) VALUES(?,?,?,?,?,?)";
    pdo_execute($sql, $name, $email, $address, $user, $pass, $role);
}

function taikhoan_update($id, $name, $email, $address, $user, $role)
{
    $sql = "UPDATE taikhoan SET name=?, email=?, address=?, user=?, role=? WHERE id=?";
    pdo_execute($sql, $name, $email, $address, $user, $role, $id);
}

function taikhoan_delete($id)
{
    $sql = "DELETE FROM taikhoan WHERE id=?";
    pdo_execute($sql, $id);
}

function taikhoan_checklogin($user, $pass)
{
    $sql = "SELECT * FROM taikhoan WHERE user=? AND pass=?";
    return pdo_query_one($sql, $user, $pass);
}

function taikhoan_get_by_user($user)
{
    $sql = "SELECT * FROM taikhoan WHERE user=?";
    return pdo_query_one($sql, $user);
}
