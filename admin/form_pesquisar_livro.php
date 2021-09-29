<?php include "menu.php"; ?>

<h2>Pesquisar Livros</h2>
<form action="form_lista_livros.php">
        <label for="pesquisaInput">Digite nome do autor ou título do livro:  </label>
        <input type="text" name="pesquisa" id="pesquisaInput" class="input-padrao" required="true" size=50>
                    
        <button type="submit" id="botaoId">Pesquisar</button>
</form>

<?php include "rodape.php"; ?>