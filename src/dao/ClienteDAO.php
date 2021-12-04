<?php

require_once __DIR__ . "/../model/Cliente.php";
require_once __DIR__ . "/../../admin/src/dao/ConexaoBD.php";

class ClienteDAO{
  function cadastrarCliente(Cliente $cliente){
    $conexao = ConexaoBD::getConexao();

    $password = md5($cliente->getPassword());
    
    $sql = "INSERT INTO cliente(nome,sobrenome,email,password,telefone)
      VALUES('{$cliente->getNome()}',
      '{$cliente->getSobrenome()}',
      '{$cliente->getEmail()}',
      '{$password}',
      '{$cliente->getTelefone()}')";

    return $conexao->exec($sql);
  }

  function logarCliente(String $email, String $password){
    $conexao = ConexaoBD::getConexao();

    $password = md5($password);
    
    $sql = "SELECT id, email, nome
    FROM cliente
    WHERE email = '{$email}'
    AND password = '{$password}'";

    $stmt = $conexao->query($sql);

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}