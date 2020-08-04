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
                <a class='nav-item nav-link' href='crudFuncionarios.php'>Funcionarios</a>
                <a class='nav-item nav-link' href='crudPratos.php'>Pratos</a>
                <a class='nav-item nav-link' href='submeterPedido.php'>Submeter Pedidos</a>
                <a class='nav-item nav-link' href='recebido.php'>Recebido</a>
                <a class='nav-item nav-link' href='PedidoEmPreparo.php'>Em Preparo</a>
                <a class='nav-item nav-link' href='PedidoFinalizado.php'>Finalizado</a>
                <a class='nav-item nav-link' href='Relatorio.php'>Relatório</a>
    <div id="btnLogout">
    <a class="btn btn-dark" href="../controller/loginController.php">Logout</a>
    </div>
  </div>
</nav>

    <div class="container">
        <div class="row justify-content-right">
            <table class="table">
                <tr>
                    <td>Relatório Pratos</td>
                    <td><a href="relPratos.php" class="btn btn-info">Consultar</a></td>

                </tr>
                <tr>
                    <td>Relatório Funcionarios</td>
                    <td><a href="relUsuarios.php" class="btn btn-info">Consultar</a></td>
                </tr>
                <tr>
                    <td>Relatório Garçom</td>
                    <td>
                        <a href="relGarçom.php" class="btn btn-info">Consultar</a>
                    </td>

                    <a id="approved" class="flex-icon" data-toggle="tooltip" data-placement="top" title="Aprovar">
                </tr>
                <tr>
                    <td>Relatório Cozinheiro</td>
                    <td>
                        <a href="relCozinheiro.php" class="btn btn-info">Consultar</a>
                    </td>

                </tr>
                <form action="../view/relPedidos.php" method="post">
                    <tr>
                        <td>Relatório Pedidos</td>
                        <td>
                            <label style='margin-right: 8px;'>Dia </label>
                            <input type='number' name='dia' style='width: 50px;' placeholder=' dia' value='0' min="0" max="31">
                        </td>
                        <td>
                            <label style='margin-right: 8px;'>Mes </label>
                            <input type='number' name='mes' style='width: 50px;' placeholder=' mes' value='0' min="0" max="12">
                        </td>
                        <td>
                            <label style='margin-right: 8px;'>Ano </label>
                            <input type='number' name='ano' style='width: 50px;' placeholder=' ano' value='0' min="2019" max="2050">
                        </td>
                        <td>
                        <input type='hidden' name='relatorio' value='5'>
                        <button type='submit' class="btn btn-info" name="enviar">Consultar</button>
                        </td>
                    </tr>
                </form>

            </table>
        </div>
    </div>

</body>
</html>
