<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<style>
#navbar{
    margin-bottom: 10px;
}
</style>
<body>
    <?php
        require_once '../class/Prato.php';
        $prato = new  Prato;
    ?> 
    
    <?php
        require_once '../controller/pratoController.php';
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
        <a class="btn btn-dark" href="../controller/loginController.php">Logout</a>
        </div>
    </div>
    </nav>

    <?php
        if($_SESSION['cargo'] == 1){
            echo "
            <div class='row justify-content-center'>
            <form method='post' action='../controller/pratoController.php'>
                <input type='hidden' name='id' value='$id>'>
                <div class='form-group'>
                    <label>Nome do Prato</label><br>
                    <input type='text' name='nome' placeholder=' Insira o nome' value='$nome' ><br>
                </div>
                <div class='form-group'>
                    <label>Ingredientes</label><br>
                    <input type='text' name='ingredientes' placeholder='Insira os ingredientes' value='$ingredientes' ><br>
                </div>
                <div class='form-group'>
                    <label>Preço</label><br>
                    <input type='text' name='preco' placeholder='Insira o preço' value='$preco' ><br>
                </div>
                <div class='form-group'>
                    <?php if($update == true): ?>
                        <button type='submit' class='btn btn-info' name='update'>alterar</button>
                    <?php else: ?> 
                        <button type='submit' class='btn btn-primary' name='save'>Salvar</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
            
            ";
        }


    ?>
    

    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>PRATO</th>
                        <th>INGREDIENTES</th>
                        <th>PREÇO</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    $resultado = $prato->getAllPratos();
                    while($result = $resultado->fetch(PDO::FETCH_OBJ)){
                        echo "
                        <tr>
                            <td>$result->nome</td>
                            <td>$result->ingredientes</td>
                            <td>R$ $result->preco</td>
                        ";
                        if($_SESSION['cargo'] == 1){
                            echo "
                                <td><a href=../controller/pratoController.php?delete=$result->id class='btn btn-danger'>Excluir</a></td>
                                <td><a href=crudPratos.php?alterar=$result->id class='btn btn-info'>Alterar</a></td>
                            ";
                        }
                            
                        echo "</tr>";                      
                    }
                ?>            
            </table>
        </div>
    </div> 

</body>
</html>
