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
    // \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
);

try {
    $connection = new PDO($dsn, DB_USER, DB_PASSWORD, $options);

    echo 'データベース接続成功' . PHP_EOL;
} catch (PDOException $e) {
    die("データベース接続エラー: " . $e->getMessage());
}

$rows = array();
if (isset($_POST['sql'])) {
    $sth = $connection->query('sql');
    $rows = $stm->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL execute</title>
</head>
<body>

    <form action="" method="post">
        <textarea name="sql"></textarea>
        <button type="submit">execute</button>
    </form>

    <table>
        <?php foreach($rows as $row): ?>
        <tr>
            <?php foreach($row as $cel): ?>
                <td><?php $cel ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

