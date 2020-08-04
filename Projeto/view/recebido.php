<?php 
session_start();
$_SESSION['array'] = array();
?>


<!DOCTYPE html>
<html >
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <?php
        require_once '../class/Prato.php';
        require_once '../class/ItemPedido.php';
        require_once '../class/Pedido.php';
        $prato = new  Prato;
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">

        <?php 
            if($_SESSION['cargo'] == 1){
                echo "
                <a class='nav-item nav-link' href='crudFuncionarios.php'>Funcionarios</a>
                <a class='nav-item nav-link' href='crudPratos.php'>Pratos</a>
                <a class='nav-item nav-link' href='submeterPedido.php'>Submeter Pedidos</a>
                <a class='nav-item nav-link' href='recebido.php'>Recebido</a>
                <a class='nav-item nav-link' href='PedidoEmPreparo.php'>Em Preparo</a>
                <a class='nav-item nav-link' href='PedidoFinalizado.php'>Finalizado</a>
                <a class='nav-item nav-link' href='Relatorio.php'>Relatório</a>
                ";
            }else if($_SESSION['cargo'] == 2){
                echo "
                <a class='nav-item nav-link' href='crudPratos.php'>Pratos</a>
                <a class='nav-item nav-link' href='recebido.php'>Recebido</a>
                <a class='nav-item nav-link' href='PedidoEmPreparo.php'>Em Preparo</a>
                <a class='nav-item nav-link' href='PedidoFinalizado.php'>Finalizado</a>
                ";
            }else{
                echo "
                <a class='nav-item nav-link' href='crudPratos.php'>Pratos</a>
                <a class='nav-item nav-link' href='submeterPedido.php'>Submeter Pedidos</a>
                <a class='nav-item nav-link' href='recebido.php'>Recebido</a>
                <a class='nav-item nav-link' href='PedidoEmPreparo.php'>Em Preparo</a>
                <a class='nav-item nav-link' href='PedidoFinalizado.php'>Finalizado</a>
                ";
            }  
        ?>
        
        </div>
        <div id="btnLogout">
        <a class="btn btn-dark" href="href=../controller/logout.php">Logout</a>
        </div>
    </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <thead >
                        <h1 style="text-align: center; width: 100%; background-color: #d3d3d3">Pedidos Recebidos</h1>
                    </thead>
                    
                    <tr>
                        <th>Pedido</th>
                        <th>Itens Pedido</th>
                        
                    </tr>
                </thead>
                <?php
                    $pedido = new Pedido();
                    $resultado = $pedido->getPedidosRecebidos();
                    
                    while($result = $resultado->fetch(PDO::FETCH_OBJ)){
                        
                        echo "
                        <tr>
                            <td>$result->idPedido</td>
                        ";
                        $auxResultado = $pedido->getItens($result->idPedido);
                        echo "<td>";
                        while($auxResult = $auxResultado->fetch(PDO::FETCH_OBJ)){
                            echo "Item: " . $auxResult->nome . " Qntd: " . $auxResult->qtd . " | ";
                        }
                        echo "</td>"; 
                        if($_SESSION['cargo']  != 3){
                            echo "<td><a href=../controller/pedidoController.php?preparar=$result->idPedido class='btn btn-danger'>Preparar Pedido</a></td>";
                        }                    
                    }
                    ?>            
            </table>
        </div>
    </div>

    </body>
</html>