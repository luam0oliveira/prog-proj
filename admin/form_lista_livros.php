<?php
    include "menu.php";
    
    require_once "src/dao/LivroDAO.php";

    $livroDAO = new LivroDAO();
    if($_GET!=null){
        $livros = $livroDAO->pesquisarLivro($_GET['pesquisa']);
    }else{
        $livros = $livroDAO->listarLivros();
    }
?>

    <table>
        <tr>   
            <th>#</th>         
            <th>titulo</th>
            <th>preco</th>
            <th>quantidade</th>
            <th>promocao</th>
            <th>---</th>
        </tr>

        <?php
            foreach($livros as $livro){
        ?>
    
        <tr>
            <td><?=$livro['id']?></td>          
            <td><?=$livro['titulo']?></td>
            <td>R$<?=$livro['preco']?></td>
            <td><?=$livro['quantidade']?></td>
            <td><?php echo ($livro['promocao']) ? "Ativo" : "Inativo" ?></td>      
            <td>
                <a href="remove_livro.php?id=<?=$livro['id']?>&a=0" class="btn btn-danger btn-sm">Remover</a>
                <a href="form_alterar_livro.php?id=<?=$livro['id']?>&a=0" class="btn btn-warning btn-sm">Alterar</a>
            </td>
        </tr>
        <?php
             }
        ?>

    </table>


<?php

    include "rodape.php";
?>