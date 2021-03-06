<?php session_start();
//echo $_SESSION['logado'];
?>

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
        require_once '../class/Funcionario.php';
        $funcionario = new Funcionario;
        require_once '../class/Cargo.php';
        
    ?> 
    
    <?php
        require_once '../controller/funcionarioController.php';
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
                <a class='nav-item nav-link' href='#'>Em Preparo</a>
                <a class='nav-item nav-link' href='#'>Finalizado</a>
                <a class='nav-item nav-link' href='#'>Relatório</a>
                ";
            }else{
                echo "
                <a class='nav-item nav-link' href='crudPratos.php'>Pratos</a>
                <a class='nav-item nav-link' href='submeterPedido.php'>Submeter Pedidos</a>
                <a class='nav-item nav-link' href='recebido.php'>Recebido</a>
                <a class='nav-item nav-link' href='#'>Em Preparo</a>
                <a class='nav-item nav-link' href='#'>Finalizado</a>
                ";
            }  
        ?>
    <div id="btnLogout">
    <a class="btn btn-dark" href="../controller/loginController.php">Logout</a>
    </div>
  </div>
</nav>
  

    <div class="container">
        <div class="row justify-content-right">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Login</th>
                        <th>Senha</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    $resultado = $funcionario->getAllFuncionarios();
                    while($result = $resultado->fetch(PDO::FETCH_OBJ)){
                        echo "
                        <tr>
                            <td>$result->nome</td>
                            <td>$result->descricao</td>
                            <td>$result->login</td>
                            <td>$result->senha</td></tr>";                      
                    }
                ?>            
            </table>
        </div>
    </div> 

</body>
</html>
