<?php
  require_once "src/dao/ClienteDAO.php";

  session_start();

  $clienteDAO = new ClienteDAO();

  $email = 'luamoliveira@gmail.com';
  $password = 'teste';

  $cliente = $clienteDAO->logarCliente($email, $password);

  $_SESSION['email'] = $email;
  $_SESSION['clienteId'] = $cliente['id'];
  $_SESSION['nome'] = $cliente['nome'];

  print_r($_SESSION);