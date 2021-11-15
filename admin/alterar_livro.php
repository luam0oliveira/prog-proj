<?php
    include "menu.php";
    
    // import dao
    require_once "src/dao/LivroDAO.php";

    // import model
    require_once "src/model/Funcoes.php";
    require_once "src/model/Livro.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $preco = floatval($_POST['preco']);
    $quantidade = $_POST['quantidade'];
    $ano_publicacao = $_POST['ano_publicacao'];
    $descricao = $_POST['descricao'];
    $editora = $_POST['editora'];
    $promocao = $_POST['promocao'];
    if($_FILES['imagem']['size']!=0){
        $temImagem=true;
        $imagem = pegarImagem($_FILES);
    }else{
        $temImagem=false;
    }

    $genero = $_POST['genero'];
    $autor = $_POST['autor'];

    $livro = new Livro();
    $livro->setId($id);
    $livro->setTitulo($titulo);
    $livro->setPreco($preco);
    $livro->setQuantidade($quantidade);
    $livro->setAno_publicacao($ano_publicacao);
    $livro->setDescricao($descricao);
    $livro->setEditora($editora);
    $livro->setPromocao($promocao);
    if($temImagem){
        $livro->setImagem($imagem);
    }    
    
    $livroDAO = new LivroDAO();
    $livroDAO->alterarLivro($livro, $genero, $autor, $temImagem);

    include "rodape.php";
?>

