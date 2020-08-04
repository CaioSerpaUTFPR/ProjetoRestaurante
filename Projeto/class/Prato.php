<?php

require_once 'Conexao.php';

final class Prato extends Conexao {

    private $id;
    private $qntd;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function addPrato($nome, $ingredientes, $preco) {
        //prepare
        $stmt = $this->pdo->prepare(
        "INSERT INTO pratos (nome, ingredientes, preco) 
        VALUES (:nome, :ingredientes, :preco)"
        );
        //bind
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ingredientes', $ingredientes);
        $stmt->bindParam(':preco', $preco);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function getAllPratos() {
        $sql = "SELECT * FROM pratos";
        $result = $this->pdo->query($sql);
        return $result;
    }

    public function getPrato($id) {
        //prepare
        $stmt = $this->pdo->prepare("SELECT * FROM pratos WHERE id = (:id)");
        //bind
        $stmt->bindParam(':id', $id);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function upadatePrato($id, $nome, $ingredientes, $preco) {
        //prepare
        $stmt = $this->pdo->prepare(
            "UPDATE pratos SET nome = :nome, ingredientes = :ingredientes, preco = :preco WHERE id = :id"
        );
        //bind
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ingredientes', $ingredientes);
        $stmt->bindParam(':preco', $preco);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function deletePrato($id) {
        //prepare
        $stmt = $this->pdo->prepare(
            "DELETE FROM pratos WHERE id = :id"
        );
        //bind
        $stmt->bindParam(':id', $id);
        //execute
        $stmt->execute();
        return $stmt;
    }


    public function addPratoPedido($id, $quantidade){

    }



}