<?php

require_once("../../controller/ClienteController.php");

$id_cliente = $_POST['id_cliente'];

$cliente = new ClienteController();
$cliente->delete($id_cliente);

$retornoJSON = array('erro' => null , 'msg' => null);

if($cliente->lastError()){
    $retornoJSON['erro'] = 1;
    $retornoJSON['msg'] = $cliente->lastError();
}else{
    $retornoJSON['erro'] = 0;
    $retornoJSON['msg'] = "success";
}
echo json_encode($retornoJSON);