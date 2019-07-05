<?php require_once("../../config/conexao.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/af-2.3.3/r-2.2.2/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso</title>
</head>

<body>

<nav class="navbar fixed-top navbar-light bg-light" id="nav-top">
    <a class="navbar-brand" href="#">HOME</a>
    <ul class="nav">
        <li class="nav-item">
            <a class="btn btn-primary" href="../../view/cliente/cadastrar.php">CADASTRO DE CLIENTE</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary" href="../../view/cliente/">LISTAGEM DE CLIENTES</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-danger" href="#" id="button_logout">SAIR</a>
        </li>
    </ul>
</nav>
<br>
<br>
<br>