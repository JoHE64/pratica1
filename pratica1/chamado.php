<?php
include 'db.php';

if (isset($_POST['descricao']) && isset($_POST['criticidade']) && isset($_POST['dataAbertura']) && isset($_POST['idCliente'])){
    
    $descricao = $_POST['descricao'];
    $criticidade = $_POST['criticidade'];
    $dataAbertura = $_POST['dataAbertura'];
    $idCliente = $_POST['idCliente'];
    $queryClientes = "SELECT * FROM clientes";
    $resultado = $conn->query($queryClientes);

    if ($_POST['idColaborador'] == ''){
        inserir("chamados", ['descricao', 'criticidade', 'dataAbertura', 'idCliente'],
        ["'$descricao'", "'$criticidade'", "'$dataAbertura'", "'$idCliente'"]);
    }else{
       $idColaborador = $_POST['idColaborador'];
        inserir("chamados", ['descricao', 'criticidade', 'dataAbertura', 'idCliente', 'idColaborador'],
        ["'$descricao'", "'$criticidade'", "'$dataAbertura'", "'$idCliente'", "'$idColaborador'"]);

    }
}

$clientes = listar("clientes");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratica 1</title>
</head>
<body>
    <h1>!Criar Chamado!</h1>
    <form action="" method="POST">
        <input type="text" name="descricao" placeholder="Descrição" required></input>
        <select id="criticidade" name="criticidade" required>
            <option value="baixa">Baixo</option>
            <option value="média">Médio</option>
            <option value="alta">Alto</option>
        </select>
        <input type="date" name="dataAbertura" placeholder="Data Abertura" required></input>
        <select name="idCliente" id="" required>
            <?php foreach ($clientes as $cliente): ?>
            <option value="<?= $cliente["id"] ?>"> <?= $cliente["nome"] ?> </option>
            <?php endforeach?>
        </select>
        <input type="text" name="idColaborador" placeholder="ID Colaborador"></input>
        <button>Enviar</button>
    </form>
    <div><a href="readChamado.php">Visualizar Chamados</a></div>
    <div><a href="cliente.php">Criar Cliente</a></div>
</body>
</html>