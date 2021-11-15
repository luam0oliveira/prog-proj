<?php

// import model
require_once __DIR__ . "/../model/Livro.php";

// import dao
require_once "ConexaoBD.php";
require_once "GeneroDAO.php";
require_once "AutorDAO.php";
require_once "EditoraDAO.php";


class LivroDAO{
    function cadastraLivro(Livro $livro, array $generos, array $autores){
        $conexao = ConexaoBD::getConexao();

        $sql = "INSERT INTO livro(isbn,titulo,preco,editora,quantidade,ano_publicacao,descricao,imagem,promocao)
            VALUES('{$livro->getIsbn()}',
                '{$livro->getTitulo()}',
                '{$livro->getPreco()}',
                '{$livro->getEditora()}',
                '{$livro->getQuantidade()}',
                '{$livro->getAno_publicacao()}',
                '{$livro->getDescricao()}',
                '{$livro->getImagem()}',
                '{$livro->getPromocao()}');";    
        $sit = $conexao->exec($sql);

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

        return $sit;
    }

    function listarLivros(){   
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT L.id,L.titulo,L.preco,L.quantidade,L.promocao, L.imagem,
        GROUP_CONCAT(A.nome, '') AS autor
        FROM livro L
        INNER JOIN autores Aus
        ON L.id = Aus.livro_id
        INNER JOIN autor A
        ON Aus.autor_id = A.id
        GROUP BY L.id";

        $stmt = $conexao->query($sql);
        
        $discos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $discos;
    }

    function listarLivrosPromocacao(){ 
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT L.id,L.titulo,L.preco,L.quantidade,L.promocao, L.imagem,
        GROUP_CONCAT(A.nome, '') AS autor
        FROM livro L
        INNER JOIN autores Aus
        ON L.id = Aus.livro_id
        INNER JOIN autor A
        ON Aus.autor_id = A.id
        WHERE L.promocao = 1
        GROUP BY L.id";

        $stmt = $conexao->query($sql);
        
        $discos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $discos;
    }


    function deletarLivro(int $id){
        $conexao = ConexaoBD::getConexao();

        $sql = "DELETE FROM autores WHERE livro_id=$id;
            DELETE FROM lista_genero WHERE livro_id=$id;
            DELETE FROM livro WHERE id=$id";
        
        return $conexao->exec($sql);
    }

    function pesquisarLivro(String $pesquisa){
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT L.id,L.titulo,L.preco,L.quantidade,
        GROUP_CONCAT(A.nome, '') AS autor
        FROM livro L
        INNER JOIN autores Aus
        ON L.id = Aus.livro_id
        INNER JOIN autor A
        ON Aus.autor_id = A.id
        WHERE L.titulo LIKE '%$pesquisa%' or A.nome LIKE '%$pesquisa%'
        GROUP BY L.id";

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
        $conexao = ConexaoBD::getConexao();

        $sql = "SELECT L.*,
        GROUP_CONCAT(A.nome, '') AS autor
        FROM livro L
        INNER JOIN autores Aus
        ON L.id = Aus.livro_id
        INNER JOIN autor A
        ON Aus.autor_id = A.id
        WHERE L.id=$id
        GROUP BY L.id";

        $stmt = $conexao->query($sql);
        
        $discos = $stmt->fetch(PDO::FETCH_ASSOC);

        return $discos;
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
                imagem = {$livro->getImagem()},
                promocao = {$livro->getPromocao()}
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
                editora = '{$livro->getEditora()}',
                promocao = '{$livro->getPromocao()}'
                WHERE id = '{$livro->getId()}';
                
                DELETE FROM autores
                WHERE livro_id = {$livro->getId()};
                
                DELETE FROM lista_genero
                WHERE livro_id = {$livro->getId()}";
        }
        
        
        $sit = $conexao->exec($sql);

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

        return $sit;
    }
}