<?php
    require_once 'admin/src/dao/LivroDAO.php';
    include 'components/header.php';

    $livroDAO = new LivroDAO();

    $livro = $livroDAO->obterLivro($_GET['id']);
    $livros = $livroDAO->listarLivrosPromocacao();
?>

    <main class="my-5">
        <div class="container p-0">
            <div class="row justify-content-center m-0 justify-content-lg-between">
                <div id="produto" class="col-12 col-lg-9  mb-lg-0 mb-5">
                    <div class="row">
                        <div class="mb-3 col-12 d-lg-none">
                            <h3 class="m-0"> <?=$livro['titulo']?></h3>
                            <a class="text-decoration-none text-black-50" href="#"><?=$livro['autor']?></a>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-12 col-lg-5 mb-lg-0 mb-3">
                                    <img  class="w-100" src=" data:img/png;base64, <?=base64_encode($livro['imagem'])?>" alt="">
                                </div>

                                <div class="col-12 col-lg-7 d-flex  flex-column justify-content-between b">
                                    <div>
                                        <div class="d-lg-block d-none">
                                            <h3 class="m-0"><?=$livro['titulo']?></h3>
                                            <a class="text-decoration-none text-black-50" href="#"><?=$livro['autor']?></a>
                                        </div>

                                        <p class="fs-6 resumo mb-5"><?=$livro['descricao']?>
                                        </p>

                                        <h4 class="fw-bold">R$<?=$livro['preco']?></h4>
                                    </div>

                                    <div class="botoes-compra">
                                        <div class="mb-2">
                                            <a class="w-100 py-4 btn btn-success botoes fs-3" href="cesta.php?id=<?=$livro['id']?>&a=i">
                                                COMPRAR PRODUTO
                                            </a>
                                        </div>
                                        <div class="d-flex">
                                            <a class="btn btn-outline-primary w-100 me-4 botoes fs-5 py-2" href="">
                                                CARRINHO</a>
                                            <a class="btn btn-outline-warning align-middle w-100 botoes fs-5 py-2"
                                                href="">
                                                FAVORITAR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="descricao col-12">
                            <h2 class="mb-5">Detalhes do produto</h2>
                            <p><?=$livro['descricao']?></p>
                        </div>
                    </div>

                </div>

                <aside class="col-12 col-lg-3 row row-cols-lg-3 row-cols-5 mb-3 align-content-start" id="indicacoes">
                    <?php
                        foreach($livros as $livro):
                    ?>    
                        <a class="card col" href="produto.php?id=<?=$livro['id']?>">
                            <img src="data:img/png;base64, <?=base64_encode($livro['imagem'])?>" alt="">
                        </a>
                    <?php 
                        endforeach;
                    ?>
                </aside>
            </div>
        </div>
    </main>

<?php include 'components/footer.php' ?>