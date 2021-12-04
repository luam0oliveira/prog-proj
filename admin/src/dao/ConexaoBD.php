<?php

class ConexaoBD
{

    public static function getConexao(): PDO
    {
        $conexao = new PDO(
            "mysql:host=localhost;dbname=airarvil",
            "root",
            "coringa");
        return $conexao;
    }

}
