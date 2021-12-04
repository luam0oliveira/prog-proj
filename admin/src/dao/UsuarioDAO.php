<?php

// import model
require_once __DIR__ . "/../model/Autor.php";

// import dao
require_once "ConexaoBD.php";
require_once "GeneroDAO.php";
require_once "AutorDAO.php";
require_once "EditoraDAO.php";



class UsuarioDAO{
  function cadastrarUsuario(Usuario $usuario){
    $conexao = ConexaoBD::getConexao();

    $sql = "INSERT INTO Usuario(nome,sobrenome,email,login,password,rua,numero,bairro,cep,telefone)
      VALUES($usuario->getNome(),$usuario->getNome(),$usuario)";
  }
}