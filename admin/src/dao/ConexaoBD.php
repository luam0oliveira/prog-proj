<?php

class ConexaoBD
{

    public static function getConexao(): PDO
    {
        $conexao = new PDO(
            "mysql:host=localhost:3306;dbname=airarvil",
            "root",
            "");
        return $conexao;
    }

}
