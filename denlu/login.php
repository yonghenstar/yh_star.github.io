<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 简单的用户存储（在实际项目中应使用数据库）
    $users = isset($_SESSION['users']) ? $_SESSION['users'] : array();

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
    // 返回405错误
    http_response_code(405);
    echo '方法不允许';
}
?>
