<?php include 'components/header.php' ?>
    <main class="mb-5">
        <section id="carrousel" class="w-100 mb-3 ">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/Background/book_hands_reading_134405_3840x2400.jpg"
                            class="d-block w-100 carrousel-img" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Os melhores LIvros do Brasil</h5>
                            <p>Você encontra em um só lugar</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/Background/books_library_reading_211249_1280x720.jpg"
                            class="d-block w-100 carrousel-img" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>A melhor quando o assunto é livors</h5>
                            <p>Cliente satisfeito é o nosso lema</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/Background/joel-muniz-XqXJJhK-c08-unsplash.jpg"
                            class="d-block w-100 carrousel-img" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Livros em promoção todos os dias</h5>
                            <p>Venha já adquirir seu livro</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        
        <section class="mb-5">
            <article id="destaque" class="w-100 mb-4">
                <div class="container">
                    <h2 class="text-center">Livros destaques</h2>
                    <hr class="mb-4">
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 g-4 ">
                        <?php
                            require_once "admin/src/dao/LivroDAO.php";
                            
                            $livroDAO = new LivroDAO();
                            $livros = $livroDAO->listarLivros();

                            foreach ($livros as $livro):
                        ?>
                        <div class="col">
                            <div class="card box">
                                <a href="produto.php?id=<?=$livro['id']?>" class="card-link card-image pt-3">
                                    <img class="card-image" src="data:image/png;base64, <?=base64_encode($livro['imagem']) ?>"  alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="titulo-autor mb-2">
                                        <a class="text-decoration-none fs-5 fw-normal text-dark ">
                                            <?= $livro['titulo']?>
                                        </a><br>
                                        <a href="produto.php?id=<?=$livro['id']?>" class="text-decoration-none fs-6 text-black-50 text-center">
                                            <?= $livro['autor']?>
                                        </a>
                                    </div>
                                    
                                </div>
                                <a href="produto.php?id=<?=$livro['id']?>"
                                    class="preco text-decoration-none fs-5 fw-bold text-dark mb-3">
                                    R$<?= $livro['preco']?>
                                </a>
                                <a href="produto.php?id=<?=$livro['id']?>" class="btn btn-success w-100 ">Comprar</a>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </article>
            <article id="destaque" class="w-100 mb-4">
                <div class="container">
                    <h2 class="text-center">Promoção</h2>
                    <hr class="mb-4">
                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 g-4 ">
                        <?php
                            $livros = $livroDAO->listarLivrosPromocacao();

                            foreach ($livros as $livro):
                        ?>
                        <div class="col">
                            <div class="card box">
                                <a href="produto.php?id=<?=$livro['id']?>" class="card-link card-image pt-3">
                                    <img class="card-image" src="data:image/png;base64, <?=base64_encode($livro['imagem']) ?>"  alt="...">
                                </a>
                                <div class="card-body">
                                    <div class="titulo-autor mb-2">
                                        <a class="text-decoration-none fs-5 fw-normal text-dark ">
                                            <?= $livro['titulo']?>
                                        </a><br>
                                        <a href="produto.php?id=<?=$livro['id']?>" class="text-decoration-none fs-6 text-black-50 text-center">
                                            <?= $livro['autor']?>
                                        </a>
                                    </div>
                                </div>
                                <a href="produto.php?id=<?=$livro['id']?>"
                                    class="preco text-decoration-none fs-5 fw-bold text-dark mb-3">
                                    R$<?= $livro['preco']?>
                                </a>
                                <a href="produto.php?id=<?=$livro['id']?>" class="btn btn-success w-100 ">Comprar</a>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </article>
        </section>
    </main>

<?php include 'components/footer.php' ?>