<?php

require_once __DIR__ . "/../model/Editora.php";
require_once "ConexaoBD.php";

class EditoraDAO{
    function cadastrarEditora(Editora $editora){
        $sql = "INSERT INTO editora(nome,email,telefone)
        VALUES('{$editora->getNome()}',
            '{$editora->getEmail()}',
            '{$editora->getTelefone()}')";
            
        $conexao = ConexaoBD::getConexao();
        $conexao->exec($sql);
    }

    function listarEditoras(){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT *
        FROM editora
        ORDER BY nome ASC";

        $stmt = $conexao->query($sql);

        $editoras = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $editoras;
    }

    function obterIdNome(String $nome){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT id FROM editora WHERE nome LIKE '%$nome%'";

        $stmt = $conexao->query($sql);

        $id = $stmt->fetchColumn();

        return intval($id);
    }
}