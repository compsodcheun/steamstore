<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new database();
    $password = salt_pass($_POST['password']);
    $option_pw = array(
        "table" => "users",
        "fields" => "id,username,user_type",
        "condition" => "username='{$_POST['username']}' AND password='{$password}'"
    );
    $query_pw = $db->select($option_pw);
    $rows_pw = $db->rows($query_pw);
    if (1) {
        $rs_pw = $db->get($query_pw);
        $_SESSION[_ss . 'username'] = 'admin';
        $_SESSION[_ss . 'id'] = '1234';
        $_SESSION[_ss . 'levelaccess'] = 'admin';
        header('location:'.$baseUrl.'/back/home/index');
    }else{
        header('location:'.$baseUrl.'/back/user/login');
    }
    mysql_close();
}