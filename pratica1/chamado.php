<?php
include 'db.php';

if (isset($_POST['descricao']) && isset($_POST['criticidade']) && isset($_POST['dataAbertura']) && isset($_POST['idCliente']) && isset($_POST['idColaborador'])){
    $descricao = $_POST['descricao'];
    $criticidade = $_POST['criticidade'];
    $dataAbertura = $_POST['dataAbertura'];
    $idCliente = $_POST['idCliente'];
    $idColaborador = $_POST['idColaborador'];

inserir("chamados", ['descricao', 'criticidade', 'dataAbertura', 'idCliente', 'idColaborador'],
    ["'$descricao'", "'$criticidade'", "'$dataAbertura'", "'$idCliente'", "'$idColaborador'"]);

}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratica 1</title>
</head>
<body>
    <p>Criar Chamado</p>
    <form action="" method="POST">
        <input type="text" name="descricao" placeholder="descricao"></input>
        <input type="text" name="criticidade" placeholder="criticidade"></input>
        <input type="date" name="dataAbertura" placeholder="data abertura"></input>
        <input type="text" name="idCliente" placeholder="id cliente"></input>
        <input type="text" name="idColaborador" placeholder="id colaborador"></input>
        <button>Enviar</button>
    </form>
</body>
</html>