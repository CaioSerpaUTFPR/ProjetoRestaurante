<?php

require_once 'Conexao.php';

final class Funcionario extends Conexao {
    public function __construct()
    { 
        parent::__construct();   
    }

    public function addFuncionario($nome, $cargo, $login, $senha) {
        //prepare
        $stmt = $this->pdo->prepare(
        "INSERT INTO funcionarios (nome, cargo_idCargo, login, senha) 
        VALUES (:nome, :cargo, :login, :senha)"
        );
        //bind
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function getCargo($id) {
        //prepare
        $stmt = $this->pdo->prepare("SELECT cargo_idCargo FROM funcionarios WHERE id = (:id)");
        //bind
        $stmt->bindParam(':id', $id);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function getAllFuncionarios() {
        $sql = "SELECT * FROM funcionarios f, cargo c where f.cargo_idCargo = c.idCargo";
        $result = $this->pdo->query($sql);
        return $result;
    }

    public function getFuncionario($id) {
        //prepare
        $stmt = $this->pdo->prepare("SELECT * FROM funcionarios WHERE id = (:id)");
        //bind
        $stmt->bindParam(':id', $id);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function upadateFuncionario($id, $nome, $cargo, $login, $senha) {
        //prepare
        $stmt = $this->pdo->prepare(
            "UPDATE funcionarios SET nome = :nome, cargo_idCargo = :cargo, login = :login, senha = :senha WHERE id = :id"
        );
        //bind
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function deleteFuncionario($id) {
        //prepare
        $stmt = $this->pdo->prepare(
            "DELETE FROM funcionarios WHERE id = :id"
        );
        //bind
        $stmt->bindParam(':id', $id);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function loginFuncionario($login, $senha) {
        //prepare
        $stmt = $this->pdo->prepare(
            "SELECT * FROM funcionarios WHERE login = :login AND senha = :senha"
        );
        //bind
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        //execute
        $stmt->execute();
        return $stmt;
    }

    public function getAllGarcomPedidos() {
        $mesAtual = date('m');
        $sql = "SELECT f.nome, count(p.id) as total FROM funcionarios f, pedidos p 
        where p.funcionarios_id = f.id and f.cargo_idCargo = 3 and p.status_idStatus = 4 
        and MONTH(dataPedido) = $mesAtual group by 1";
        $result = $this->pdo->query($sql);
        return $result;
    }

    public function getAllCozinheiroPedidos() {
        $mesAtual = date('m');
        $sql = "SELECT f.nome, count(p.id) as total FROM funcionarios f, pedidos p 
        where p.idCozinheiro = f.id and f.cargo_idCargo = 2 and p.status_idStatus = 4 
        and MONTH(dataPedido) = $mesAtual group by 1";
        $result = $this->pdo->query($sql);
        return $result;
    }


}