<?php
if (!defined('HOST'))
    define('HOST', 'localhost');
if (!defined('DB_NAME'))
    define('DB_NAME', 'Pokemon');
if (!defined('USER'))
    define('USER', '');
if (!defined('PASS'))
    define('PASS', '');

try {
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($conn === null) {
    echo "Failed to establish database connection.";
    exit;
}