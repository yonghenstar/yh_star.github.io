<?php
session_start();

// 简单的用户存储（在实际项目中应使用数据库）
$users = isset($_SESSION['users']) ? $_SESSION['users'] : array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 添加用户到存储中
    $users[] = array('email' => $email, 'password' => $password);
    $_SESSION['users'] = $users;
    
    echo '注册成功';
} else {
    echo '无效的请求方法';
}
?>
