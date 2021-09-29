<?php
    include "menu.php";
    require_once "src/model/Funcoes.php";
    require_once "src/model/Livro.php";
    require_once "src/dao/LivroDAO.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $preco = floatval($_POST['preco']);
    $quantidade = $_POST['quantidade'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $descricao = $_POST['descricao'];

    $livro = new Livro();

    $livro->setId($id);
    $livro->setTitulo($titulo);
    $livro->setPreco($preco);
    $livro->setQuantidade($quantidade);
    $livro->setAno_publicacao($ano_publicacao);
    $livro->setDescricao($descricao);

    echo $livro->getPreco();
    
    $livroDAO = new LivroDAO();
    $livroDAO->alterarLivro($livro);

    include "rodape.php";
?>

