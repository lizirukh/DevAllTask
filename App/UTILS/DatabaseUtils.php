<?php


class DatabaseUtils
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = 'password';
        $this->dbname = 'dbname';
        $this->charset = 'utf8mb4';

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
/*
 Create database learning2;

create table `learning2`.`person`(
 ID int primary key auto_increment,
 firstName varchar(30) not null,
 lastName varchar(50) not null,
 email varchar(100) not null
);

 */
