<?php
    include "menu.php";
    require_once "src/dao/LivroDAO.php";
    require_once "src/model/Funcoes.php";

    $id=$_GET['id'];
    $discoBD = new LivroDAO();
    $disco = $discoBD->obterLivro($id);

    $id = $disco['id'];
    $titulo = $disco['titulo'];
    $preco = $disco['preco'];
    $editora = $disco['editora'];
    $quantidade = $disco['quantidade'];
    $ano_publicacao = $disco['ano_publicacao'];
    $descricao = $disco['descricao'];
    $imagem = $disco['imagem'];
?>

    <h2>Alterar livro</h2>
    <form enctype="multipart/form-data" action="alterar_livro.php" method="POST">
        <input type="hidden" name="id" class="input-padrao desabilitado" value="<?=$id?>">

        <label for="tituloInput">Titulo: </label>
        <input type="text" name="titulo" id="tituloInput" class="input-padrao" require="true" size=50 value="<?=$titulo?>">
            
        <label for="valorInput">Preco: </label>
        <input type="text" name="preco" id="valorInput" class="input-padrao" required="true" size=5 value="<?=$preco?>">
        
        <label for="quantidadeInput">Quantidade: </label>
        <input type="text" name="quantidade" id="quantidadeInput" class="input-padrao" required="true" size=5 value="<?=$quantidade?>">

        <label for="anoPubInput">Ano de Publicação: </label>
        <input type="text" name="ano_publicacao" id="anoPubInput" class="input-padrao" required="true" size=5 value="<?=$ano_publicacao?>">
        
        <label for="descricaoInput">Descricão: </label>
        <textarea name="descricao" id="descricaoInput" cols="50" rows="10" require="true"><?=$descricao?></textarea>

        <label for="imagemInput">Imagem: </label>
        <input type="file" name="imagem" id="imagemInput" class="input-padrao", required="true">

        <button type="submit" id="botaoId">Alterar</button>
    </form>
<?php
    include "rodape.php";
?>

