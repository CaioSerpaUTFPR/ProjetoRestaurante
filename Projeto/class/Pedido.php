<?php

require_once 'Conexao.php';

final class Pedido extends Conexao {

    public function __construct()
    { 
        parent::__construct();   
    }

    public function addPedido($funcionarios_id){
        //prepare        
        $stmt = $this->pdo->prepare(
            "INSERT INTO pedidos (funcionarios_id) 
            VALUES (:funcionarios_id)"
            );
            //bind
            $stmt->bindParam(":funcionarios_id", $funcionarios_id);
            //execute
            $stmt->execute();
            return $stmt;
    }

    public function idUltimoPedido(){
        $stmt = $this->pdo->prepare("SELECT LAST_INSERT_ID() as id");
        $stmt->execute();
        return $stmt;
    }

    public function getPedidosRecebidos(){
        $stmt = $this->pdo->prepare("SELECT p.id as idPedido from pedidos p where p.status_idStatus = 1");
        $stmt->execute();
        return $stmt;
    }

    public function prepararPedido($id, $idCozinheiro){     
        $stmt = $this->pdo->prepare(
            "UPDATE pedidos SET status_idStatus = 2, idCozinheiro = $idCozinheiro where id = $id");
        $stmt->execute();
        return $stmt;
    }

    public function getItens($id){
        $stmt = $this->pdo->prepare("SELECT p.nome, i.qtd, p.preco from item_pedido i, pratos p where pedido_id = $id and p.id = i.prato_id");
        $stmt->execute();
        return $stmt;
    }

    public function getPedidosEmPreparo() {
        $stmt = $this->pdo->prepare("SELECT p.id as idPedido from pedidos p where p.status_idStatus = 2");
        $stmt->execute();
        return $stmt;
    }

    public function finalizarPedido($id){     
        $stmt = $this->pdo->prepare(
            "UPDATE pedidos SET status_idStatus = 3 where id = $id");
        $stmt->execute();
        return $stmt;
    }

    public function entregaPedido($id){     
        $stmt = $this->pdo->prepare(
            "UPDATE pedidos SET status_idStatus = 4 where id = $id");
        $stmt->execute();
        return $stmt;
    
    }

    public function getPedidosFinalizado() {
        $d = date('d');$m = date('m');$y = date('y');
        $stmt = $this->pdo->prepare("SELECT p.id as idPedido, p.status_idStatus as idStatus from pedidos p where p.status_idStatus IN (3,4) and p.dataPedido = '$y-$m-4'");
        $stmt->execute();
        return $stmt;
    }

    public function getPedidosDataCompleta($dia, $mes, $ano){
        $stmt = $this->pdo->prepare(
            "SELECT p.id, p.dataPedido, g.nome as garcom, c.nome as cozinheiro , s.descricao 
            FROM pedidos p 
            LEFT JOIN funcionarios g on (g.id = p.funcionarios_id) 
            LEFT JOIN funcionarios c on (c.id = p.idCozinheiro) 
            LEFT JOIN status s on (s.idStatus = p.status_idStatus)
            WHERE p.dataPedido = '$ano-$mes-$dia'");
        $stmt->execute();
        return $stmt;
    }

    public function getPedidosAno($ano){
        $stmt = $this->pdo->prepare(
            "SELECT p.id, p.dataPedido, g.nome as garcom, c.nome as cozinheiro , s.descricao 
            FROM pedidos p 
            LEFT JOIN funcionarios g on (g.id = p.funcionarios_id) 
            LEFT JOIN funcionarios c on (c.id = p.idCozinheiro) 
            LEFT JOIN status s on (s.idStatus = p.status_idStatus) 
            WHERE year(p.dataPedido) = $ano");
        $stmt->execute();
        return $stmt;
    }

    public function getPedidosMesAno($mes, $ano){
        $stmt = $this->pdo->prepare(
            "SELECT p.id, p.dataPedido, g.nome as garcom, c.nome as cozinheiro , s.descricao 
            FROM pedidos p 
            LEFT JOIN funcionarios g on (g.id = p.funcionarios_id) 
            LEFT JOIN funcionarios c on (c.id = p.idCozinheiro) 
            LEFT JOIN status s on (s.idStatus = p.status_idStatus)
            WHERE MONTH(p.dataPedido) = $mes and YEAR(p.dataPedido) = $ano");
        $stmt->execute();
        return $stmt;
    }




    public function getAllPedidos(){
        $stmt = $this->pdo->prepare(
            "SELECT p.id, p.dataPedido, g.nome as garcom, c.nome as cozinheiro , s.descricao 
            FROM pedidos p 
            LEFT JOIN funcionarios g on (g.id = p.funcionarios_id) 
            LEFT JOIN funcionarios c on (c.id = p.idCozinheiro) 
            LEFT JOIN status s on (s.idStatus = p.status_idStatus)");
        $stmt->execute();
        return $stmt;
    }
}
