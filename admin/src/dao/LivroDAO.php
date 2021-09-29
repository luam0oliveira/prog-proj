<?php

require_once __DIR__ . "/../model/Livro.php";
require_once "ConexaoBD.php";
require_once "GeneroDAO.php";
require_once "AutorDAO.php";
require_once "EditoraDAO.php";


class LivroDAO{
    function cadastraLivro(Livro $livro, int $idGenero, int $idAutor){
        $conexao = ConexaoBD::getConexao();

        $sql = "INSERT INTO livro(isbn,titulo,preco,editora,quantidade,ano_publicacao,descricao,imagem)
            VALUES('{$livro->getIsbn()}',
                '{$livro->getTitulo()}',
                '{$livro->getPreco()}',
                '{$livro->getEditora()}',
                '{$livro->getQuantidade()}',
                '{$livro->getAno_publicacao()}',
                '{$livro->getDescricao()}',
                '{$livro->getImagem()}');
            ";
        

        
        $conexao->exec($sql);

        $sql = "SELECT id FROM livro WHERE isbn = {$livro->getIsbn()}";
        
        $stmt = $conexao->query($sql);
        $idLivro = $stmt->fetchColumn();

        $sql = "INSERT INTO lista_genero(genero_id,livro_id)
            VALUES({$idGenero},
                {$idLivro});

        INSERT INTO autores(autor_id,livro_id)
            VALUES({$idAutor},
                {$idLivro})";
                
        $conexao->exec($sql);
    }

    function listarLivros(){   
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT A.id,A.titulo,A.preco,A.quantidade,C.nome FROM livro A
        INNER JOIN autores B on A.id=B.livro_id
        INNER JOIN autor C ON B.autor_id=C.id";

        $stmt = $conexao->query($sql);

        $discos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $discos;
    }

    function deletarLivro(int $id){
        $conexao = ConexaoBD::getConexao();

        $sql = "DELETE FROM autores WHERE livro_id=$id;
            DELETE FROM lista_genero WHERE livro_id=$id;
            DELETE FROM livro WHERE id=$id";
        
        $conexao->exec($sql);
    }

    function pesquisarLivro(String $pesquisa){
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT A.id,A.titulo,A.preco,A.quantidade,C.nome FROM livro A
        INNER JOIN autores B on A.id=B.livro_id
        INNER JOIN autor C ON B.autor_id=C.id
        WHERE A.titulo LIKE '%$pesquisa%' or C.nome LIKE '%$pesquisa%'";

        $stmt = $conexao->query($sql);

        $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $livros;
    }

    function obterLivro(int $id){
        $sql = "SELECT * FROM livro WHERE id=$id";

        $conexao = ConexaoBD::getConexao();
        $stmt = $conexao->query($sql);

        $disco = $stmt->fetch(PDO::FETCH_ASSOC);

        return $disco;
    }

    function alterarLivro(Livro $livro){
        $sql = "UPDATE livro
            SET titulo = '{$livro->getTitulo()}',
                preco = '{$livro->getPreco()}',
                quantidade = '{$livro->getQuantidade()}',
                ano_publicacao = '{$livro->getAno_publicacao()}',
                descricao = '{$livro->getDescricao()}'
                WHERE id = '{$livro->getId()}'";
        $conexao = ConexaoBD::getConexao();
        $conexao->exec($sql);
    }
}