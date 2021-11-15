<?php
    include "menu.php";
    // import dao
    require_once "src/dao/LivroDAO.php";
    require_once "src/model/Funcoes.php";
    require_once "src/dao/AutorDAO.php";
    require_once "src/dao/GeneroDAO.php";
    require_once "src/dao/EditoraDAO.php";

    // import model
    require_once "src/model/Autor.php";
    require_once "src/model/Editora.php";
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

    $id = $_GET['id'];
    $livroDB = new LivroDAO();
    $livro = $livroDB->obterLivro($id);
    $list_autores = $livroDB->obterAutor($id);
    $list_generos = $livroDB->obterGenero($id);

    $id = $livro['id'];
    $titulo = $livro['titulo'];
    $preco = $livro['preco'];
    $editoraA = $livro['editora'];
    $promocao = $livro['promocao'];
    $quantidade = $livro['quantidade'];
    $ano_publicacao = $livro['ano_publicacao'];
    $descricao = $livro['descricao'];
    $imagem = $livro['imagem']; 

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

<h2>Alterar livro</h2>
<form class="form row" enctype="multipart/form-data" action="alterar_livro.php" method="POST">
    <input type="hidden" name="id" class="input-padrao" value="<?=$id?>">

    <!-- titulo -->
    <div class="form-group col-12">
        <label class="form-label" for="tituloInput">Título: </label>
        <input class="form-control" type="text" name="titulo" id="tituloInput" class="input-padrao" required="true" value="<?=$titulo?>">
    </div>
        
    <!-- autor -->
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
            <?php
                foreach($list_autores as $autor){
            ?>
                <input type="checkbox" name="autor[]" value="<?=$autor['autor_id']?>" id="a<?=$autor['autor_id']?>" class="btn-check" checked>
                <label for="a<?=$autor['autor_id']?>" class="btn btn-outline-primary"><?=$autor['nome']?></label>
            <?php
                }
            ?>
            <button class="btn btn-outline-primary rounded-circle" type="button" class="btn btn-info rounded-circle btn-sm" data-toggle="modal" data-target="#adicionarAutor">+</button>
        </div>
    </div>

    <!-- genero -->
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
            <?php
                    foreach($list_generos as $genero){
                ?>
                    <input type="checkbox" name="genero[]" value="<?=$genero['genero_id']?>" id="g<?=$genero['genero_id']?>" class="btn-check" checked>
                    <label for="g<?=$genero['genero_id']?>" class="btn btn-outline-primary"><?=$genero['nome']?></label>
                <?php
                    }
                ?>
            <button class="btn btn-outline-primary rounded-circle" type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarGenero">+</button>
        </div>        
    </div>

    <!-- editora -->
    <div class="form-group col-4">
        <label class="form-label" for="editoraSelect">Editora:</label>

        <div class="d-flex flex-row">
            <select class="form-select me-2" name="editora" id="editoraSelect">
                <?php
                    foreach($editoras as $editora){
                        if($editora['id']==$editoraA){      
                ?>
                    <option value="<?=$editora['id']?>" selected><?=$editora['nome']?></option>
                <?php
                        }
                ?>

                    <option value="<?=$editora['id']?>"><?=$editora['nome']?></option>
                <?php
                    }
                ?>
            </select> 

            <button class="btn btn-outline-primary rounded-circle my-0" type="button" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#adicionarEditora">+</button>
        </div>   
    </div>

    <!-- preco -->
    <div class="form-group col-2">
        <label class="form-label" for="precoInput">Preço: </label>
        <input class="form-control" type="text" name="preco" id="precoInput" class="input-padrao" required="true" value="<?=$preco?>">
    </div>

    <!-- promocao -->
    <div class="form-group col-2">
        <label for="form-label" for="promocaoSelect">Promocão: </label>
        <select class="form-select" name="promocao" id="promocaoSelect">
            <?php
                if($promocao):
            ?>
                <option value="0">Inativo</option>
                <option value="1" selected>Ativo</option>
            <?php
                else:
            ?>
                <option value="0" selected>Inativo</option>
                <option value="1">Ativo</option>
            <?php
                endif;
            ?>
        </select>
    </div>

    <!-- quantidade -->
    <div class="form-group col-2">
        <label class="form-label" for="quantidadeInput">Quantidade: </label>
        <input class="form-control" type="number" name="quantidade" id="quantidadeInput" class="input-padrao" required="true" value="<?=$quantidade?>">
    </div>

    <!-- ano de publicacao -->
    <div class="form-group col-2">
        <label class="form-label" for="anoPubInput">Ano de publicação: </label>
        <input class="form-control" type="number" name="ano_publicacao" id="anoPubInput" class="input-padrao" required="true" value="<?=$ano_publicacao?>">
    </div>
 
    <!-- descricao -->
    <div class="form-group col-12">
        <label class="form-label" for="descricaoInput">Descricão: </label>
        <textarea class="form-control" name="descricao" id="descricaoInput" cols="50" rows="10"><?=$descricao?></textarea>
    </div>

    <!-- imagem -->
    <div class="col-12">
        <label for="imagemInput">Imagem: </label>
        <input class="form-control" type="file" name="imagem" id="imagemInput" class="input-padrao">
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
                <form action="form_alterar_livro.php?id=<?=$id?>&a=1" method="POST">
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
                <form action="form_alterar_livro.php?id=<?=$id?>&a=2" method="POST">
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
                <form action="form_alterar_livro.php?id=<?=$id?>&a=3" method="POST">
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

