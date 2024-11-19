<?php
include 'db.php';

$id = $_GET['id'];

if (isset($_GET['id'])){
    if (isset($_POST['descricao']) && isset($_POST['criticidade']) && isset($_POST['dataAbertura']) && isset($_POST['idCliente'])){
        $descricao = $_POST['descricao'];
        $criticidade = $_POST['criticidade'];
        $dataAbertura  = $_POST['dataAbertura'];
        $idCliente = $_POST['idCliente'];
        
        if ($_POST['idColaborador'] == ''){
            inserir("chamados", ['descricao', 'criticidade', 'dataAbertura', 'idCliente'],
            ["'$descricao'", "'$criticidade'", "'$dataAbertura'", "'$idCliente'"]);
        }else{
           $idColaborador = $_POST['idColaborador'];
            inserir("chamados", ['descricao', 'criticidade', 'dataAbertura', 'idCliente', 'idColaborador'],
            ["'$descricao'", "'$criticidade'", "'$dataAbertura'", "'$idCliente'", "'$idColaborador'"]);
    
        }


        if (isset($_POST['idColaborador']) == ''){
            editar("chamados", ["descricao" => $descricao,"criticidade"=> $criticidade,
            "dataAbertura"=> $dataAbertura, "idCliente"=> $idCliente],$id);
        }else{
            $idColaborador= $_POST['idColaborador'];
            editar("chamados", ["descricao" => $descricao,"criticidade"=> $criticidade,
            "dataAbertura"=> $dataAbertura, "idCliente"=> $idCliente, "idColaborador"=> $idColaborador ],$id);  
        }

        
    }
}

$query = "SELECT * FROM chamados WHERE id=$id";
$resultado = $conn -> query($query);
$row = $resultado -> fetch_assoc();
$clientes = listar("clientes");



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body> 
    <form action="" method="POST">
        <input type="text" name="descricao" placeholder="Descrição" <?php echo $row['descricao']; ?> required>
        <select id="" name="criticidade" <?php echo $row['criticidade']; ?> required>
            <option value="baixa">Baixo</option>
            <option value="média">Médio</option>
            <option value="alta">Alto</option>
        </select>
        <input type="date" name="dataAbertura" placeholder="Data Abertura" <?php echo $row['dataAbertura']; ?> required >
        <select name="idCliente" id="" required>
            <?php foreach ($clientes as $cliente): ?>
            <option value="<?= $cliente["id"] ?>"> <?= $cliente["nome"] ?> </option>
            <?php endforeach?>
        </select>
        <input type="text" name="idColaborador" placeholder="ID Colaborador" <?php echo $row['idColaborador']; ?> ></input>
        <button>Enviar</button>
    </form>  
    <div>
        
        <a href="readChamado.php"><button>Visualizar Chamados</button></a>
        <a href="chamado.php"><button>Criar Chamado</button></a>
    </div>
</body>
</html>
