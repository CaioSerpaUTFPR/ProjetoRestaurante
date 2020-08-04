<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    </head>

    <style>
        .formulario {
            margin-top: 20%;
        }
    </style>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">                    
                </div>
                <div class="col-8">
                <form class="formulario" method="post" action="../controller/loginController.php">
                    <div class="form-group">
                        <label >Login</label>
                        <input name="login" type="text" name class="form-control"  placeholder="Insira o login">
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input name="senha" type="password" class="form-control"  placeholder="Password">
                    </div>
                    <?php if(isset($_SESSION['logado'])){
                        if($_SESSION['logado'] == false){
                            echo "<font color='Red' size ='1'>Senha incorreta</font>";
                        }
                    }
                    ?>
                    <div class="form-group form-check">
                        </div>
                        <button type="submit" class="btn btn-primary" name="entrar">Entrar</button>
                    </form>
                </div>
                <div class="col">
                </div>
            </div>            
        </div>
    </body>
</html>