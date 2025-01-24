<?php
// 创建或打开SQLite数据库
$db = new SQLite3('user_database.db');

// 检查并创建用户表
$query = 'CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)';
$db->exec($query);
?>
