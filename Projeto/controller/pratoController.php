<?php

require_once '../class/Prato.php';

$prato = new Prato;

$id = '';
$nome = '';
$ingredientes = '';
$preco = '';

$update = false;

if(isset($_POST['save'])){
    $nome = $_POST['nome'];
    $ingredientes = $_POST['ingredientes'];
    $preco = $_POST['preco'];
    
    $prato->addPrato($nome, $ingredientes, $preco);
    header('Location: ../view/crudPratos.php');   
}

if(isset($_GET['alterar'])) { 
    $id = $_GET['alterar'];
    $update = 1;
    $result = $prato->getPrato($id);
    $resultado = $result->fetch(PDO::FETCH_OBJ);

    $nome = $resultado->nome;
    $ingredientes = $resultado->ingredientes;
    $preco = $resultado->preco;   
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ingredientes = $_POST['ingredientes'];
    $preco = $_POST['preco'];
    $prato->upadatePrato($id, $nome, $ingredientes, $preco);
    header('Location: ../view/crudPratos.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $prato->deletePrato($id);
    header('Location: ../view/crudPratos.php');
}
