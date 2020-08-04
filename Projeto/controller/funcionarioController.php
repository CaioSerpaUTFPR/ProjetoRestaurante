<?php

require_once '../class/Funcionario.php';

$funcionario =  new Funcionario;

$id = '';
$nome = '';
$cargo = '';
$login = '';
$senha = '';
$senhaConfirm = '';

$update = false;

//colocar um try catch aqui para validar os dados
if(isset($_POST['save'])){
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $senhaConfirm = $_POST['senhaConfirm'];
    if($senha === $senhaConfirm){
        $funcionario->addFuncionario($nome, $cargo, $login, $senha);
        header('Location: ../view/crudFuncionarios.php');
    }
    echo 'senhas não são compativeis';
}

if(isset($_GET['alterar'])) { 
    $id = $_GET['alterar'];
    $update = 1;
    $result = $funcionario->getFuncionario($id);
    $resultado = $result->fetch(PDO::FETCH_OBJ);

    $nome = $resultado->nome;
    $cargo = $resultado->cargo_idCargo;
    $login = $resultado->login;
    $senha = $resultado->senha;
    $senhaConfirm = $resultado->senha;   
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $senhaConfirm = $_POST['senhaConfirm'];
    if($senha === $senhaConfirm){
        $funcionario->upadateFuncionario($id, $nome, $cargo, $login, $senha);
        header('Location: ../view/crudFuncionarios.php');
    }
    echo 'senhas não são compativeis';
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $funcionario->deleteFuncionario($id);
    header('Location: ../view/crudFuncionarios.php');
}
