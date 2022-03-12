<?php
define('DB_HOST_NAME', 'localhost');
define('DB_PORT', 3306);
define('DB_NAME', '');
define('DB_CHARSET', 'utf8mb4');
define('DB_USER', '');
define('DB_PASSWORD', '');

if (!class_exists('PDO')) {
    die('PDOが定義されていません。');
}

$dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s;charset=%s',
    DB_HOST_NAME,
    DB_PORT,
    DB_NAME,
    DB_CHARSET
);

$options = array(
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
);

try {
    $connection = new PDO($dsn, DB_USER, DB_PASSWORD, $options);

    echo 'データベース接続成功' . PHP_EOL;
} catch (PDOException $e) {
    die("データベース接続エラー: " . $e->getMessage());
}

$sth = $connection->query('SHOW GRANTS');

foreach ($stm->fetchAll() as $row) {
    echo $row . PHP_EOL;
}
