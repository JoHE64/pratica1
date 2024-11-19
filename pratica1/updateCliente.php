<?php

include 'db.php';

$id = $_GET['id'];

if (isset($_GET['id'])){
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone  = $_POST['telefone'];

        editar("clientes", ["nome" => $nome,"email"=> $email,"telefone"=> $telefone,], $id);
    }
}

$query = "SELECT * FROM clientes WHERE id=$id";
$resultado = $conn -> query($query);
$row = $resultado -> fetch_assoc();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
    <form method="POST" action="">
        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>" required>
        <button>Enviar</button>
    </form>
    <a href="cliente.php">Criar Cliente</a>
</body>
</html>