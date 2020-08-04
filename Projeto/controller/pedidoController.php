<?php

session_start();

require_once '../class/Pedido.php';
require_once '../class/Prato.php';
require_once '../class/ItemPedido.php';

$pedido = new Pedido;
$prato = new Prato;




if (isset($_POST['id']) && isset($_POST['quantidade'])) {
    $pedido->addPedido($_SESSION['id']);

    $arrayItens = $_POST['id'];
    $arrayQntd = $_POST['quantidade'];

    foreach ($arrayItens as $key => $value) {
        $itens_pedido[] = new ItemPedido($value, $arrayQntd[$key]);
    }

    $getPedido = $pedido->idUltimoPedido();
    $idPedido = $getPedido->fetch(PDO::FETCH_OBJ);
    foreach ($itens_pedido as $key => $value) {
        if ($value->getQntd() > 0) {
            $value->addItemPedido($idPedido->id, $value->getIdPrato(), $value->getQntd());
        }

    }
    header('Location: ../view/recebido.php');
}

if (isset($_GET['preparar'])) {

    $idPedido = $_GET['preparar'];
    $pedido->prepararPedido($idPedido, $_SESSION['id']);
    header('Location: ../view/PedidoEmPreparo.php');
}

if (isset($_GET['finalizar'])) {

    $idPedido = $_GET['finalizar'];
    $pedido->finalizarPedido($idPedido);
    echo header('Location: ../view/submeterPedido.php');
}

if (isset($_GET['entregar'])) {

    $idPedido = $_GET['entregar'];
    $pedido->entregaPedido($idPedido);
    echo header('Location: ../view/submeterPedido.php');
}