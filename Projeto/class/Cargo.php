<?php

require_once 'Conexao.php';

final class Cargo extends Conexao {
    
    public function __construct()
    { 
        parent::__construct();

        $this->getCargos();
    }

    public function getCargos(){
        $sql = "SELECT * FROM cargo";
        $result = $this->pdo->query($sql);
        return $result;
    }

}
