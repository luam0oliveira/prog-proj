<?php
    include 'components/header.php';

    require_once 'admin/src/dao/LivroDAO.php';

    
    $cesta = $_SESSION['cesta'];
    if (isset($_GET['a'])){
        if ($_GET['a'] == 'i') {
            $id = $_GET['id'];
            $exists = false;
            if ($cesta) {
                for ($i = 0; $i <= array_key_last($cesta ?? 0); $i++) {
                    if ($cesta[$i]['id'] == $id) {
                        $cesta[$i]['quantidade'] += 1;
                        $exists = true;
                    }
                }
            }

            if (!$exists) {
                $livroDAO = new LivroDAO();

                $livro = $livroDAO->obterLivro($_GET['id']);

                $item = [
                    "id" => $_GET['id'],
                    "titulo" => $livro['titulo'],
                    "autor" => $livro['autor'],
                    "preco" => $livro['preco'],
                    "editora" => $livro['editora'],
                    "quantidade" => 1,
                    "imagem" => $livro['imagem']
                ];

                $cesta[] = $item;
            }
            $_SESSION['cesta'] = $cesta;
            $util->redirect('cesta.php');
        }
        else if($_GET['a']=='r'){
            $id = $_GET['id'];
            if($cesta){
                for($i = 0; $i <= array_key_last($cesta ?? 0); $i++){
                    if($_SESSION['cesta'][$i]['id']==$id){
                        $_SESSION['cesta'][$i]['quantidade']--;
                        if($_SESSION['cesta'][$i]['quantidade']==0){
                            unset($_SESSION['cesta'][$i]);
                        }
                        $util->redirect('cesta.php');
                    }
                }
            }
        }
    }
    ?>
    <main class="my-5">
        <div class="container">
            <h2>Cesta de compras</h2>
            <table class="w-100">
                <tr>
                    <th></th>
                    <th></th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
                <?php
                    $total=0;
                    foreach($cesta as $item):
                ?>
                
                <tr class='border-bottom border-top '>
                    <td>
                        <img class="py-3 m-0 item-img" src="data:image/png;base64, <?=base64_encode($item['imagem']) ?>"
                                        alt="Capa de <?=$item['titulo']?>">
                    </td>
                    <td class='align-top pt-4'>
                        <h2><?= $item['titulo']?></h2>
                        <p>R$<?= $item['preco']?></p>
                        <p><?= $item['autor']?></p>
                    </td>
                    <td>
                        <p><?=$item['quantidade']?></p>
                    </td>
                    <td class="align-center ">
                        <p class="text-center">R$<?=$item['preco']?></p>
                    </td>
                    <td>
                        <a href='cesta.php?a=r&id=<?=$item['id']?>'>Remover</a>
                    </td>
                </tr>
                
                <?php
                    $total+=$item['preco']*$item['quantidade'];
                    endforeach;
                ?>
                <tfoot>
                    <tr >
                        <td colspan="3" class="text-end">
                            <h2 class='mt-3'>Total ashdkashdkjah: R$<?=$total?></h2>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>

<?php
    include 'components/footer.php';