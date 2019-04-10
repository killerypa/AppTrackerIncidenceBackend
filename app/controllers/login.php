<?php
/**
 * Created by PhpStorm.
 * User: ninja
 * Date: 29/03/2019
 * Time: 06:45
 */

if ( isset($_POST['email']) && $_POST['email'] !== '' &&
    isset($_POST['password']) && $_POST['password'] !== '') {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');

    $db = new Database();

    $email = $db -> quote($_POST['email']);
    $password = $db -> quote($_POST['password']);
    // $password = $db -> quote(sha1(md5($_POST['password'])));

    $rows = $db -> select("SELECT * FROM users WHERE email =" . $email . " AND password = " . $password );

    if ($rows != false) {
        echo json_encode($rows);
    }else{
        $invalid=sha1(md5("contrasena y email invalido"));
    }
}else{
    echo ("error");
}
