<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 简单的用户存储（在实际项目中应使用数据库）
    $users = isset($_SESSION['users']) ? $_SESSION['users'] : array();

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 添加用户到存储中
    $users[] = array('email' => $email, 'password' => $password);
    $_SESSION['users'] = $users;
    
    echo '注册成功';
} else {
    // 返回405错误
    http_response_code(405);
    echo '方法不允许';
}
?>
