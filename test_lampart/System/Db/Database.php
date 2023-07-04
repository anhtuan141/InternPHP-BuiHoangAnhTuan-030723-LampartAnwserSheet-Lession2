<?php
class Database
{
    protected $pdo;
    protected $sql;
    protected $statement;

    public function __construct()
    {
        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->pdo = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USERNAME, PASSWORD, $options);
            //Chạy để chuyển đổi bảng mã về UTF8
            $this->pdo->query('set names utf8');
        } catch (PDOException $e) {
            //return false;
            exit($e->getMessage());
        }
    }

    public function setQuery($sql)
    {
        $this->sql = trim($sql);
        return $this;
    }

    public function getQuery()
    {
        return $this->sql;
    }

    public function row($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function rows($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function save($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            return $this->statement->execute($params);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function disconnect()
    {
        $this->pdo = $this->statement = null;
    }
}
