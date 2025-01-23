<?php
session_start();

// 简单的用户存储（在实际项目中应使用数据库）
$users = isset($_SESSION['users']) ? $_SESSION['users'] : array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 查找用户
    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['user'] = $user;
            echo '登录成功';
            exit();
        }
    }
    
    echo '邮箱或密码无效';
} else {
    echo '无效的请求方法';
}
?>
