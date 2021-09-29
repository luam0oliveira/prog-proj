<?php

include "menu.php";

require_once "src/dao/AutorDAO.php";
require_once "src/model/Autor.php";
require_once "src/dao/EditoraDAO.php";
require_once "src/model/Editora.php";
require_once "src/dao/GeneroDAO.php";
require_once "src/model/Genero.php";

$autor = new Autor();
$autorDAO = new AutorDAO();
$autores = $autorDAO->listarAutores();

$editora = new Editora();
$editoraDAO = new EditoraDAO();
$editoras = $editoraDAO->listarEditoras();

$genero = new Genero();
$generoDAO = new GeneroDAO();
$generos = $generoDAO->listarGeneros();

if ($_GET['a']=='1'){
    $nome = $_POST['nome'];

    $autor->setNome($nome);

    $autorDAO->cadastrarAutor($autor);
}

if ($_GET['a']=='2'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $editora->setNome($nome);
    $editora->setEmail($email);
    $editora->setTelefone($telefone);

    $editoraDAO->cadastrarEditora($editora);
}

if ($_GET['a']=='3'){
    $nome = $_POST['nome'];
    
    $genero->setNome($nome);

    $generoDAO->cadastrarGenero($genero);
}

?>

<form enctype="multipart/form-data" action="cadastro_livro.php" method="POST">
        <label for="ISBNInput">ISBN: </label>
        <input type="text" name="isbn" id="ISBNInput" class="input-padrao" size=50>
            
        <label for="tituloInput">Título: </label>
        <input type="text" name="titulo" id="tituloInput" class="input-padrao" required="true" size=50>
        
        <label for="autor">Autor:</label>
        <input type="text" list="autores" name="autor" id="autor" class="input-padrao" required="true" size="30"> 
        <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarAutor">+</button>
        
        <label for="precoInput">Preço: </label>
        <input type="text" name="preco" id="precoInput" class="input-padrao" required="true" size=5>
       
        <label for="editoraInput">Editora:</label>
        <input type="text" list="editoras" name="editora" id="editoraInput" class="input-padrao" required="true" size="30"> 
        <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarEditora">+</button>

        <label for="generoInput">Genero:</label>
        <input type="text" list="generos" name="genero" id="generoInput" class="input-padrao" required="true" size="30"> 
        <button type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarGenero">+</button>

        <label for="quantidadeInput">Quantidade: </label>
        <input type="number" name="quantidade" id="quantidadeInput" class="input-padrao" required="true" size=5>
        
        <label for="anoPubInput">Ano de publicação: </label>
        <input type="number" name="ano_publicacao" id="anoPubInput" class="input-padrao" required="true" size=5>
        
        <label for="descricaoInput">Descricão: </label>
        <textarea name="descricao" id="descricaoInput" cols="50" rows="10"></textarea>

        <label for="imagemInput">Imagem: </label>
        <input type="file" name="imagem" id="imagemInput" class="input-padrao", required="true">

        <button type="submit" id="btn">Cadastrar</button>

        <datalist id="autores">
            <?php
                foreach($autores as $autor){
            ?>
                <option value="<?=$autor['nome']?>">
            <?php
                }
            ?>
        </datalist>

        <datalist id="editoras">
            <?php
                foreach($editoras as $editora){
            ?>
                <option value="<?=$editora['nome']?>">
            <?php
                }
            ?>
        </datalist>

        <datalist id="generos">
            <?php
                foreach($generos as $genero){
            ?>
                <option value="<?=$genero['nome']?>">
            <?php
                }
            ?>
        </datalist>


    </form>
    

    <!-- Cadastro de autor -->
    <div class="modal fade" id="adicionarAutor" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h1>Cadastrar autor</h1>
                    <form action="form_cadastro_livro.php?a=1" method="POST">
                        <label for="nomeInput">Nome:</label>
                        <input type="text" name="nome" id="nomeInput" class="input-padrao" required="true" size=20>
                        <button type="submit" id="botaoId">Cadastrar</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cadastro de editora -->
    <div class="modal fade" id="adicionarEditora" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h1>Cadastrar editora</h1>
                    <form action="form_cadastro_livro.php?a=2" method="POST">
                        <label for="nomeInput">Nome:</label>
                        <input type="text" name="nome" id="nomeInput" class="input-padrao" required="true" size=20>
                        <label for="emailInput">Email:</label>
                        <input type="text" name="email" id="emailInput" class="input-padrao" required="true" size=20>
                        <label for="telInput">Telefone:</label>
                        <input type="text" name="telefone" id="telInput" class="input-padrao" required="true" size=20>
                        <button type="submit" id="botaoId">Cadastrar</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cadastro de genero -->
    <div class="modal fade" id="adicionarGenero" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h1>Cadastrar genero</h1>
                    <form action="form_cadastro_livro.php?a=3" method="POST">
                        <label for="nomeInput">Nome:</label>
                        <input type="text" name="nome" id="nomeInput" class="input-padrao" required="true" size=20>
                        <button type="submit" id="botaoId">Cadastrar</button>
                    </form>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<?php

include "rodape.php";

?>