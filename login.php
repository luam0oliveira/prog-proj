<?php
  require_once "src/dao/ClienteDAO.php";

  session_start();

  $clienteDAO = new ClienteDAO();

  $email = $_POST['email'];
  $password = $_POST['password'];

  $cliente = $clienteDAO->logarCliente($email, $password);

  $_SESSION['email'] = $email;
  $_SESSION['clienteId'] = $cliente['id'];
  $_SESSION['nome'] = $cliente['nome'];
  header("Location: index.php?msg=concluido");

