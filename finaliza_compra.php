<?php
  require "src/dao/CompraDAO.php";

  session_start();
  $compraDAO = new CompraDAO();

  $resp = $compraDAO->cadastrarCompra($_SESSION);

  if($resp>0){

  }