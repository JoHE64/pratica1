<?php
include 'db.php';

$query = "SELECT * FROM clientes";
$resultado = $conn->query($query);

if ($resultado ->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Data de Criação </th>
            <th> Ações </th>
        </tr>";
        while($row = $resultado -> fetch_assoc()){
            echo "<tr>
                    <td> {$row['id']} </td>
                    <td> {$row['nome']} </td>
                    <td> {$row['email']} </td>
                    <td> {$row['telefone']} </td>
                    <td>
                        <a href='updateCliente.php?id={$row['id']}'>Editar</a> |
                        <a href='deleteCliente.php?id={$row['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
    echo "</table>";
}else{
    echo "Nenhum registro encontrado.";
}
$conn -> close();
?>
<a href="cliente.php">Criar cliente</a>
