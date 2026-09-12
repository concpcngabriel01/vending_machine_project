<?php

declare(strict_types=1);

session_start();

$databaseHost = '127.0.0.1';
$databaseName = 'vendora';
$databaseUser = 'root';
$databasePassword = '';

try {
    $pdo = new PDO(
        "mysql:host=$databaseHost;dbname=$databaseName;charset=utf8mb4",
        $databaseUser,
        $databasePassword,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $exception) {
    http_response_code(500);
    exit('Database connection failed. Start MySQL in Laragon and check config.php.');
}
