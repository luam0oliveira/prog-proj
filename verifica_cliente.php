<?php

  session_start();

  if(!isset($_SESSION['email'])){
    $msg="Efetue login, por favor!";
    $_SESSION['msg']=$msg;
    header("Location:login.php");
  }