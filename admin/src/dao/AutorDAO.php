<?php

require_once __DIR__ . "/../model/Autor.php";
require_once "ConexaoBD.php";

class AutorDAO{

    function cadastrarAutor(Autor $autor){
        $sql = "INSERT INTO autor(nome)
        VALUES('{$autor->getNome()}')";
            
        $conexao = ConexaoBD::getConexao();
        $conexao->exec($sql);
    }

    function listarAutores(){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT *
        FROM autor
        ORDER BY nome ASC";

        $stmt = $conexao->query($sql);

        $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $autores;
    }

    function obterIdNome(String $nome){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT id FROM autor WHERE nome LIKE '%$nome%'";

        $stmt = $conexao->query($sql);

        $id = $stmt->fetchColumn();

        return $id;
    }
    
}