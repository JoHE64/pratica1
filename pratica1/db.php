<?php
    $severname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "pratica1";

    $conn = new mysqli($severname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro: $conn->connect_error");
    }

    function inserir(string $table, array $campos, array $values){
        $campos = implode(', ', $campos);
        $values = implode(', ', $values);
        $query = "INSERT INTO $table ($campos) VALUES ($values)";
        global $conn;
        $conn->query($query);
    }
    function editar(string $table, array $dados, string|int $id){
        $query_campos = "";
        foreach ($dados as $campo => $valor) {
            $query_campos .= "$campo = '$valor', ";
        }

        $query_campos = rtrim($query_campos, ', ');

        $query = "UPDATE $table SET $query_campos WHERE id = '$id'";
        global $conn;
        $conn->query($query);
    }

    function listar(string $table) {
        $query = "SELECT * FROM $table";
        global $conn;
        $resultado = $conn->query($query);
        $dados = [];
        while ($row = $resultado->fetch_assoc()) {
            $dados[] = $row;
        }
        return $dados;
    }
