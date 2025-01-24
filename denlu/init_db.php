<?php
$db = new SQLite3('user_database.db');

// 创建用户表
$query = 'CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)';
$db->exec($query);

echo "数据库和用户表已创建。\n";
?>
