<?php

include 'db.php';

$query = "SELECT * FROM chamados";
$resultado = $conn->query($query);

if ($resultado->num_rows > 0) {
    echo "<table border=10>
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Criticidade</th>
        <th>Data Abertura</th>
        <th>ID Cliente</th>
        <th>ID Colaborador</th>
    </tr>";
    while($row = $resultado -> fetch_assoc()){
        echo "<tr>
                <td> {$row['id']} </td>
                <td> {$row['descricao']} </td>
                <td> {$row['criticidade']} </td>
                <td> {$row['dataAbertura']} </td>
                <td> {$row['idCliente']} </td>
                <td> {$row['idColaborador']} </td>
                <td>
                    <a href='updateChamado.php?id={$row['id']}'>Editar</a> 
                    <a href='deleteChamado.php?id={$row['id']}'>Excluir</a>
                </td>
            </tr>";
    }
echo "</table>";
}else{
echo "Nenhum registro encontrado.";
}

echo "<br><br><a href='chamado.php'>Criar Chamado</a>";