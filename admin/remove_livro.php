<?php
    include "menu.php";
    
    require_once "src/dao/LivroDAO.php";

    $livrosDAO = new LivroDAO();
    $id = $_GET['id'];

    $livrosDAO->deletarLivro($id);


    include "rodape.php";
?>