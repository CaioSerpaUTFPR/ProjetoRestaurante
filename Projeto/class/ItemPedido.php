<?php

require_once 'Conexao.php';

final class itemPedido extends Conexao{
    protected $idPrato;
    protected $qntd;


    public function __construct($idPrato, $qntd)
    { 
        parent::__construct();
        $this->setIdPrato($idPrato);
        $this->setQntd($qntd); 
    }


    public function addItemPedido($idPedido, $idPrato, $qntd){
        //prepare
        $stmt = $this->pdo->prepare(
            "INSERT INTO item_pedido (qtd, prato_id, pedido_id) 
            VALUES (:qtd, :prato_id, :pedido_id)"
            );
            //bind
            $stmt->bindParam(':qtd', $qntd);
            $stmt->bindParam(':prato_id', $idPrato);
            $stmt->bindParam(':pedido_id', $idPedido);
            //execute
            $stmt->execute();
            return $stmt;
    }


    /**
     * Get the value of idPrato
     */ 
    public function getIdPrato()
    {
        return $this->idPrato;
    }

    /**
     * Set the value of idPrato
     *
     * @return  self
     */ 
    public function setIdPrato($idPrato)
    {
        $this->idPrato = $idPrato;

        return $this;
    }

    /**
     * Get the value of qntd
     */ 
    public function getQntd()
    {
        return $this->qntd;
    }

    /**
     * Set the value of qntd
     *
     * @return  self
     */ 
    public function setQntd($qntd)
    {
        $this->qntd = $qntd;

        return $this;
    }
}
