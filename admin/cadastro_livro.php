<?php
    include "menu.php";
    
    require_once "src/model/Livro.php";
    require_once "src/dao/LivroDAO.php";
    require_once "src/model/Funcoes.php";
    require_once "src/dao/EditoraDAO.php";
    require_once "src/dao/AutorDAO.php";
    require_once "src/dao/GeneroDAO.php";
    
?>

<h2>Cadastro de Livro</h2>

<?php
    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $preco = floatval($_POST['preco']);
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $editora = $_POST['editora'];
    $quantidade = intval($_POST['quantidade']);
    $ano_publicacao = intval($_POST['ano_publicacao']);
    $descricao = $_POST['descricao'];
    $imagem = pegarImagem($_FILES);
    $promocao = $_POST['promocao'];

    $livro = new Livro();
    $livro->setIsbn($isbn);
    $livro->setTitulo($titulo);
    $livro->setPreco($preco);
    $livro->setEditora($editora);
    $livro->setQuantidade($quantidade);
    $livro->setAno_publicacao($ano_publicacao);
    $livro->setDescricao($descricao);
    $livro->setImagem($imagem);
    $livro->setPromocao($promocao);

    $livroDAO = new LivroDAO();
    $livroDAO->cadastraLivro($livro, $genero, $autor);
?>

<?php
    include "rodape.php"
?>