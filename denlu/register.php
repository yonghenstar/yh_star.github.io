<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 对密码进行哈希

    $stmt = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo '注册成功';
    } else {
        echo '注册失败：' . $db->lastErrorMsg();
    }
} else {
    echo '无效的请求方法';
}
?>
