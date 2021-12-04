<?php
  require_once "src/dao/ClienteDAO.php";
  require_once "src/model/Cliente.php";

  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();

  $cliente->setNome($_POST['nome']);
  $cliente->setSobrenome($_POST['sobrenome']);
  $cliente->setEmail($_POST['email']);
  $cliente->setPassword($_POST['password']);
  $cliente->setTelefone($_POST['telefone']);

  $clienteDAO->cadastrarCliente($cliente);

  header("Location: form_login.php");