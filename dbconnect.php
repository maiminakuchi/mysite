<?php
// require_once 'env.php';
ini_set('display_errors', "On");
function connect() {
    // $host = DB_HOST;
    // $db   = DB_NAME;
    // $user = DB_USER;
    // $pass = DB_PASS;

    $dsn = "mysql:host=localhost;dbname=get_together;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, 'cafe', 'cafe', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // echo '接続成功';
        return $pdo;
    } catch(PDOExeption $e) {
        echo '接続失敗です！'. $e->getMessage();
        exit();
    }


}

// echo connect();

