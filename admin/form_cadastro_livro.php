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

        header("Location: form_cadastro_livro.php?a=0");
    }

    if ($_GET['a']=='2'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $editora->setNome($nome);
        $editora->setEmail($email);
        $editora->setTelefone($telefone);

        $editoraDAO->cadastrarEditora($editora);
        header("Location: form_cadastro_livro.php?a=0");
    }

    if ($_GET['a']=='3'){
        $nome = $_POST['nome'];
        
        $genero->setNome($nome);

        $generoDAO->cadastrarGenero($genero);

        header("Location: form_cadastro_livro.php?a=0");
    }


    ?>

    <form class="form row" enctype="multipart/form-data" action="cadastro_livro.php" method="POST">
        <div class="form-group col-6">
            <label class="form-label" for="ISBNInput">ISBN: </label>
            <input class="form-control" type="text" name="isbn" id="ISBNInput" class="input-padrao" size=50>
        </div>

        <div class="form-group col-6">
            <label class="form-label" for="tituloInput">Título: </label>
            <input class="form-control" type="text" name="titulo" id="tituloInput" class="input-padrao" required="true" size=50>
        </div>

            
        <div class="form-group col-6">
            <label class="form-label" for="autorSelect">Autor:</label>
            
            <div class="d-flex flex-row">
                <select class="form-select me-3" name="autor" id="autorSelect">
                    <?php
                        foreach($autores as $autor){
                    ?>
                        <option value="<?=$autor['id']?>"><?=$autor['nome']?></option>
                    <?php
                        }
                    ?>
                </select>
                <button type="button" class="btn btn-info btn-circle btn-sm my-0" onclick="adicionarAutor()">Adicionar</button>
            </div>
            <div id="autor-tags">
                <button class="btn btn-outline-primary rounded-circle" type="button" class="btn btn-info rounded-circle btn-sm" data-toggle="modal" data-target="#adicionarAutor">+</button>
            </div>
        </div>

        <div class="form-group col-6">
            <label class="form-label" for="generoSelect">Genero:</label>

            <div class="d-flex flex-row">
                <select class="form-select me-3" name="genero" id="generoSelect">
                    <?php
                        foreach($generos as $genero){
                    ?>
                        <option value="<?=$genero['id']?>"><?=$genero['nome']?></option>
                    <?php
                        }
                    ?>
                </select> 
                <button type="button" class="btn btn-info btn-circle btn-sm my-0" onclick="adicionarGenero()">Adicionar</button>
            </div>

            <div id="genero-tags">
                <button class="btn btn-outline-primary rounded-circle" type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarGenero">+</button>
            </div>
        </div>

        <div class="form-group col-4">
            <label class="form-label" for="editoraSelect">Editora:</label>

            <div class="d-flex flex-row">
                <select class="form-select me-2" name="editora" id="editoraSelect">
                    <?php
                        foreach($editoras as $editora){
                    ?>
                        <option value="<?=$editora['id']?>"><?=$editora['nome']?></option>
                    <?php
                        }
                    ?>
                </select> 

                <button class="btn btn-outline-primary rounded-circle my-0" type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarEditora">+</button>
            </div>            
        </div>
        
        
        <div class="form-group col-2">
            <label class="form-label" for="precoInput">Preço: </label>
            <input class="form-control" type="text" name="preco" id="precoInput" class="input-padrao" required="true" size=5>
        </div>

        <div class="form-group col-2">
            <label class="form-label" for="promocaoSelect">Promoção: </label>
            <select class="form-select" name="promocao" id="promocaoSelect">
                <option value="0" selected>Inativo</option>
                <option value="1">Ativo</option>
            </select>
        </div>
        

        <div class="form-group col-2">
            <label class="form-label" for="quantidadeInput">Quantidade: </label>
            <input class="form-control" type="number" name="quantidade" id="quantidadeInput" class="input-padrao" required="true" size=5>
        </div>
        
        <div class="form-group col-2">
            <label class="form-label" for="anoPubInput">Ano de publicação: </label>
            <input class="form-control" type="number" name="ano_publicacao" id="anoPubInput" class="input-padrao" required="true" size=5>
        </div>
        
        <div class="form-group col-12">
            <label class="form-label" for="descricaoInput">Descricão: </label>
            <textarea class="form-control" name="descricao" id="descricaoInput" cols="50" rows="10"></textarea>
        </div>
        
        <div class="col-12">
            <label for="imagemInput">Imagem: </label>
            <input class="form-control" type="file" name="imagem" id="imagemInput" class="input-padrao" required="true">
        </div>

        <div class="mt-4 d-flex justify-content-center col-12">
            <button class="btn btn-success w-25" type="submit" id="btn">Cadastrar</button>
        </div>
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
                        <div class="form-group mb-4">
                            <label for="nomeInput">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nomeInput" class="input-padrao" required="true">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary btn-lg" type="submit" id="botaoId">Cadastrar</button>
                        </div>
                        
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
                        <div class="form-group mb-4">
                            <label for="nomeInput">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nomeInput" class="input-padrao" required="true">
                        </div>

                        <div class="form-group mb-4">
                            <label for="emailInput">Email:</label>
                            <input class="form-control" type="text" name="email" id="emailInput" class="input-padrao" required="true" size=20>
                        </div>

                        <div class="form-group mb-4">
                            <label for="telInput">Telefone:</label>
                            <input class="form-control" type="text" name="telefone" id="telInput" class="input-padrao" required="true" size=20>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary btn-lg" type="submit" id="botaoId">Cadastrar</button>
                        </div>
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
                        <div class="form-group mb-4">
                            <label for="nomeInput">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nomeInput" class="input-padrao" required="true" size=20>
                        </div>    
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary btn-lg" type="submit" id="botaoId">Cadastrar</button>
                        </div>
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