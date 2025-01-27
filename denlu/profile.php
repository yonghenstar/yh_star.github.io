<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "未登录"]);
    exit();
}

echo json_encode(["username" => $_SESSION['user_id']]);
?>
