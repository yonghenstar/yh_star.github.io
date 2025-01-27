<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersFile = 'users.json';
    if (file_exists($usersFile)) {
        $json_data = file_get_contents($usersFile);
        $users = json_decode($json_data, true);

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            $_SESSION['user_id'] = $username;
            echo "登录成功";
        } else {
            echo "用户名或密码错误";
        }
    } else {
        echo "用户数据库不存在";
    }
}
?>
