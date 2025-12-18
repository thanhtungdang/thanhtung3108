<?php
require_once 'pdo.php';

function user_insert($fullname, $user, $email, $pass, $address, $tel) {
    $sql = "INSERT INTO taikhoan(name, user, email, pass, address, tel, role) VALUES (?, ?, ?, ?, ?, ?, 0)";
    pdo_execute($sql, $fullname, $user, $email, $pass, $address, $tel);
}

function user_check($user, $pass) {
    $sql = "SELECT * FROM taikhoan WHERE user = ? AND pass = ?";
    return pdo_query_one($sql, $user, $pass);
}

function user_exists($user) {
    $sql = "SELECT count(*) FROM taikhoan WHERE user = ?";
    return pdo_query_value($sql, $user) > 0;
}

function user_update($id, $fullname, $email, $address, $tel) {
    $sql = "UPDATE taikhoan SET name = ?, email = ?, address = ?, tel = ? WHERE id = ?";
    pdo_execute($sql, $fullname, $email, $address, $tel, $id);
}

function user_select_by_id($id) {
    $sql = "SELECT * FROM taikhoan WHERE id = ?";
    return pdo_query_one($sql, $id);
}

?>