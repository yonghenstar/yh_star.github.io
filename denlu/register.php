<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $usersFile = 'users.json';
    if (file_exists($usersFile)) {
        $json_data = file_get_contents($usersFile);
        $users = json_decode($json_data, true);
    } else {
        $users = [];
    }

    if (isset($users[$username])) {
        echo "用户名已存在";
    } else {
        $users[$username] = [
            'email' => $email,
            'password' => $password
        ];
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
        echo "注册成功";
    }
}
?>
