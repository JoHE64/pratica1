<?php
include 'db.php';

if (isset($_POST['emailCliente']) && isset($_POST['telefoneCliente'])){
    $nome = $_POST['nomeCliente'];
    $email = $_POST['emailCliente'];
    $telefone = $_POST['telefoneCliente'];

inserir("clientes", ['nome', 'email', 'telefone'], ["'$nome'", "'$email'", "'$telefone'"]);

}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratica 1</title>
</head>
<body>
    <p>Criar Cliente</p>
    <form action="" method="POST">
        <input type="text" name="nomeCliente" placeholder="Nome Cliente"></input>
        <input type="text" name="emailCliente" placeholder="Email Cliente"></input>
        <input type="text" name="telefoneCliente" placeholder="Telefone Cliente"></input>
        <button>Enviar</button>
    </form>
    <div><a href="readCliente.php">Visualizar Clientes</a></div>
    <div><a href="chamado.php">Criar chamado</a></div>
</body>
</html>