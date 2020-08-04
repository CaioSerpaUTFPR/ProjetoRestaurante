<?php

abstract class Conexao{

    private $user;
    private $pass;
    private $dbname;
    protected $pdo;
    
    public function __construct()
    {
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'projeto-ultimo';
        try {
        $this->pdo = new PDO("mysql:host=localhost; dbname=$this->dbname;charset=utf8", $this->user, $this->pass);
        // set the PDO error mode to exception
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        echo 'Erro ao conectar com o banco de dados<br>';
        echo $e->getMessage();
        }
    }    
}
