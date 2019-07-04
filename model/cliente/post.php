<?php

require_once("../../controller/ClienteController.php");

$dadosCliente = array(
    'nome_cliente' => $_POST['NOME'],
    'email_cliente' => $_POST['EMAIL'],
    'biografia' => $_POST['BIOGRAFIA'],
    'status' => $_POST['STATUS'],
    'cpf' => $_POST['CPF'],
);

$cliente = new ClienteController();
$cliente->post($dadosCliente);

if($cliente->lastError()){
   header("location: ../../view/cliente/cadastrar.php?erro=" . $cliente->lastError()['erro'] . "&msg=" . $cliente->lastError()['msg']);
}else{
   header("location: ../../view/cliente/cadastrar.php?success=ok");
}

