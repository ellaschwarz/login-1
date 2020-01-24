<?php

/* JOHANS */

/* JOHANS */

/* ELLAS & BRYAN */
$unix_socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$db   = 'users_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:unix_socket=$unix_socket;dbname=$db;charset=$charset";
/* ELLAS & BRYAN */

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT * FROM users_db.users');
while ($row = $stmt->fetch()) {
    echo  '<p>' . $row['email'] . '</p>' . "\n";
}
?>
