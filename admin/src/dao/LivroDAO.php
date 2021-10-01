<?php

require_once __DIR__ . "/../model/Livro.php";
require_once "ConexaoBD.php";
require_once "GeneroDAO.php";
require_once "AutorDAO.php";
require_once "EditoraDAO.php";


class LivroDAO{
    function cadastraLivro(Livro $livro, array $generos, array $autores){
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

        $idLivro = intval($conexao->lastInsertId());

        foreach($generos as $genero){
            $sql = "INSERT INTO lista_genero(genero_id,livro_id)
            VALUES({$genero},
                {$idLivro});";
            
            $conexao->exec($sql);
        }

        foreach($autores as $autor){
            $sql = "INSERT INTO autores(autor_id,livro_id)
            VALUES({$autor},
                {$idLivro})";

            $conexao->exec($sql);
        }
    }

    function listarLivros(){   
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT id,titulo,preco, quantidade FROM livro";

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

    function obterAutor($id){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT A.autor_id, B.nome FROM autores A
            INNER JOIN autor B on A.autor_id = B.id
            WHERE livro_id=$id";

        $stmt = $conexao->query($sql);
        $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $autores;
    }

    function obterGenero($id){
        $conexao = ConexaoBD::getConexao();
        
        $sql = "SELECT A.genero_id, B.nome FROM lista_genero A
            INNER JOIN genero B on A.genero_id = B.id
            WHERE livro_id=$id";

        $stmt = $conexao->query($sql);
        $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $generos;
    }

    function obterLivro(int $id){
        $sql = "SELECT * FROM livro WHERE id=$id";

        $conexao = ConexaoBD::getConexao();
        $stmt = $conexao->query($sql);

        $disco = $stmt->fetch(PDO::FETCH_ASSOC);

        return $disco;
    }

    function alterarLivro(Livro $livro, array $generos, array $autores, bool $imagem){
        $conexao = ConexaoBD::getConexao();
        if($imagem){
            $sql = "UPDATE livro
            SET titulo = '{$livro->getTitulo()}',
                preco = '{$livro->getPreco()}',
                quantidade = '{$livro->getQuantidade()}',
                ano_publicacao = '{$livro->getAno_publicacao()}',
                descricao = '{$livro->getDescricao()},
                editora = {$livro->getEditora()}',
                imagem = {$livro->getImagem()}
                WHERE id = '{$livro->getId()}';
                
                DELETE FROM autores
                WHERE livro_id = {$livro->getId()};
                
                DELETE FROM lista_genero
                WHERE livro_id = {$livro->getId()}";
        }else{
            $sql = "UPDATE livro
            SET titulo = '{$livro->getTitulo()}',
                preco = '{$livro->getPreco()}',
                quantidade = '{$livro->getQuantidade()}',
                ano_publicacao = '{$livro->getAno_publicacao()}',
                descricao = '{$livro->getDescricao()}',
                editora = '{$livro->getEditora()}'
                WHERE id = '{$livro->getId()}';
                
                DELETE FROM autores
                WHERE livro_id = {$livro->getId()};
                
                DELETE FROM lista_genero
                WHERE livro_id = {$livro->getId()}";
        }
        
        
        $conexao->exec($sql);

        foreach($generos as $genero){
            $sql = "INSERT INTO lista_genero(genero_id,livro_id)
            VALUES({$genero},
                {$livro->getId()});";
            
            $conexao->exec($sql);
        }

        foreach($autores as $autor){
            $sql = "INSERT INTO autores(autor_id,livro_id)
            VALUES({$autor},
                {$livro->getId()})";

            $conexao->exec($sql);
        }
    }
}