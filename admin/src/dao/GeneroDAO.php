<?php

class GeneroDAO{
    function cadastrarGenero(Genero $genero){
        $sql = "INSERT INTO genero(nome)
            VALUES('{$genero->getNome()}')";

        $conexao = ConexaoBD::getConexao();
        $conexao->exec($sql);
    }

    function listarGeneros(){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT *
        FROM genero
        ORDER BY nome ASC";

        $stmt = $conexao->query($sql);

        $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $generos;
    }

    function obterIdNome(String $nome){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT id FROM genero WHERE nome LIKE '%$nome%'";

        $stmt = $conexao->query($sql);

        $id = $stmt->fetchColumn();

        return $id;
    }
}