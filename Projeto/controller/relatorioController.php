<?php

//var_dump($_POST);

require_once '../class/Pedido.php';
$pedido = new Pedido();
$pedidos = null;
$auxResultado = null;
if (isset($_POST["relatorio"])) {
    if ($_POST['relatorio'] == 5) {
        if($_POST['dia'] != 0 && $_POST['mes'] != 0){
            $pedidos = $pedido->getPedidosDataCompleta($_POST["dia"], $_POST["mes"], $_POST["ano"]);
        }else if($_POST['dia'] == 0 && $_POST['mes'] == 0){
            $pedidos = $pedido->getPedidosAno($_POST["ano"]);
        }else if($_POST['dia'] == 0 && $_POST['mes'] != 0){
            $pedidos = $pedido->getPedidosMesAno($_POST['mes'] , $_POST["ano"]);
        }
     
    }
}


?>

