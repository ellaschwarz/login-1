<?php


class DataBase {

    private $host;
    private $port;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $dsn;
    private $unix_socket;

    /* JOHANS */
    // public function connect()
    // {
    //     $this->host = '127.0.0.1';
    //     $this->port = '10003';
    //     $this->db = 'users_db';
    //     $this->user = 'root';
    //     $this->pass = 'root';
    //     $this->charset = 'utf8mb4';

    //     try {
    //         $dsn = 'mysql:host=$host;port=$port;dbname=$db;charset=$charset';
    //         $pdo = new PDO($dsn, $this->user, $this->pass);
    //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //         //Om det blir error så kan felmeddelandet visas på sidan
    //     } catch (PDOException $e) {
    //         echo "Unable to connect: ".$e->getMessage();
    //     }
    // }
    /* JOHANS */

    /* ELLAS & BRYANS */
    public function connect()
    {
        $this->unix_socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
        $this->db = 'users_db';
        $this->user = 'root';
        $this->pass = 'root';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:unix_socket=$this->unix_socket;dbname=$this->db;charset=$this->charset";
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
            //Om det blir error så visas felmeddelandet på sidan
        } catch (PDOException $e) {
            echo "Unable to connect: ".$e->getMessage();
        }
        // $stmt = $pdo->query('SELECT * FROM users_db.users');
        // while ($row = $stmt->fetch()) {
        //     echo  '<p>' . $row['email'] . '</p>' . "\n";
        // }
    }
}
    /* ELLAS & BRYANS */

/*-------------------GAMMAL CONNECTION--------------------------------------*/
/* JOHANS */
/* $host = '127.0.0.1';
$port = '10003';
$db   = 'users_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset"; */
/* JOHANS */

/* ELLAS & BRYAN */
/*$unix_socket = '/Applications/MAMP/tmp/mysql/mysql.sock';
$db   = 'users_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:unix_socket=$unix_socket;dbname=$db;charset=$charset"; */
/* ELLAS & BRYAN */

/*-------------------GAMMAL CONNECTION--------------------------------------*/
/*
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// try {
//      $pdo = new PDO($dsn, $user, $pass, $options);
// } catch (\PDOException $e) {
//      throw new \PDOException($e->getMessage(), (int)$e->getCode());
// }

// $stmt = $pdo->query('SELECT * FROM users_db.users');
// while ($row = $stmt->fetch()) {
//     echo  '<p>' . $row['email'] . '</p>' . "\n";
// } */




