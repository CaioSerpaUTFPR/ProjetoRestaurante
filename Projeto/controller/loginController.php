<?php

session_start();

require_once '../class/Funcionario.php';

$funcinarios = new Funcionario;
if(isset($_SESSION['logado'])){
    if(($_SESSION['logado'])){
        echo "teste";
        session_destroy();
        header('Location: ../view/login.php');
    }
    
}

if(isset($_POST['entrar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $result = $funcinarios->loginFuncionario($login, $senha);
    if($result->rowCount() > 0){
        $_SESSION['logado'] = true;
        $_SESSION['login'] = $login;
        $resultado = $result->fetch(PDO::FETCH_OBJ);
        $_SESSION['id'] = $resultado->id;
        $result = $funcinarios->getCargo($resultado->id);
        $resultado = $result->fetch(PDO::FETCH_OBJ);
        $_SESSION['cargo'] = $resultado->cargo_idCargo;
        $_SESSION['hidden'] = 'hidden';
        header('Location: ../view/submeterPedido.php');
        //echo 'login realizado com sucesso';
    }else{
        //colocar um alert aqui
        $_SESSION['logado'] = false;
        header('Location: ../view/login.php');
    }
}