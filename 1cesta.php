<?php
    require_once 'admin/src/dao/LivroDAO.php';
    include 'components/header.php';

    $cesta = $_SESSION['cesta'];

    if($_GET['a']=='i'){
        $id = $_GET['id'];
        $exists = false;
        if($cesta){
            for ($i=0; $i<=array_key_last($cesta??0); $i++){
                if($cesta[$i]['id']==$id){
                    $cesta[$i]['quantidade'] +=1;
                    $exists=true;
                }
            }
        }   

        if(!$exists){
            $livroDAO = new LivroDAO();

            $livro = $livroDAO->obterLivro($_GET['id']);

            $item = [
                "id"=> $_GET['id'],
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
    }
?>
<main class="my-5">
    <div class="container">
        <h2>Cesta de compras</h2>
        <form class="row" action="index.html">
            <div class="col-12 col-lg-8">
                <div class="mb-5">
                    <?php
                        $total = 0;
                        foreach($cesta as $item):
                        $total+= $item['preco'];
                    ?>
                        <div class="form-check d-flex mb-4">
                            <div class="my-auto">
                                <input class="form-check-input align-content-center" type="checkbox" value="item-1"
                                    id="item-1">
                            </div>
                            <label class="form-check-label" for="item-1">
                                <div>
                                    <div class="card w-100">
                                        <div class="row g-0">
                                            <div class="col-md-2">
                                                <img src="data:image/png;base64, <?=base64_encode($item['imagem']) ?>"
                                                    class="img-fluid rounded-start" alt="Capa de 1984 de George Orwell">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-body p-1">
                                                    <h5 class="card-title fw-bold"><?=$item['titulo']?> |
                                                    <?=$item['autor']?> | <?=$item['editora']?></h5>
                                                    <p class="card-text fw-bolder fs-5 mb-0">R$<?=$item['preco']?></p>
                                                    <!-- <p class="card-text">em 5x 11,98</p> -->
                                                    <p class="card-text"><small class="text-success fw-bold">Frete
                                                            grátis</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>

                        </div>
                    <?php
                        endforeach;
                    ?>
                    <hr>
                    <h2 class="text-end">Subtotal: R$$ <?=$total?></h2>
                </div>

            </div>
            <aside id="dados" class="col-12 col-lg-4 rounded">
                <div class="m-2 mb-4">
                    <div class="accordion accordion-flush mb-3" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button according-but" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#endereco" aria-expanded="true"
                                    aria-controls="endereco">
                                    Endereço
                                </button>
                            </h2>
                            <div id="endereco" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="mb-2 col-lg-12 col-9">
                                            <input type="text" class="form-control" id="rua" name="rua"
                                                placeholder="Rua">
                                        </div>
                                        <div class="mb-2 col-lg-12 col-3">
                                            <input type="text" class="form-control" id="numero" name="numero"
                                                placeholder="Número">
                                        </div>
                                        <div class="mb-2 col-lg-12 col-6">
                                            <input type="text" class="form-control" id="bairro" name="bairro"
                                                placeholder="Bairro">
                                        </div>
                                        <div class="mb-2 col-lg-12 col-6">
                                            <input type="text" class="form-control" id="cidade" name="cidade"
                                                placeholder="Cidade">
                                        </div>
                                        <div class="mb-2 col-lg-12 col-7">
                                            <input type="text" class="form-control" id="estado" name="estado"
                                                placeholder="Estado">
                                        </div>
                                        <div class="mb-2 col-lg-12 col-5">
                                            <input type="text" class="form-control" id="cep" name="cep"
                                                placeholder="CEP">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <h5>Selecione a forma de envio:</h5>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-envio" id="sedex" value="sedex"
                                checked>
                            <label class="form-check-label" for="sedex">
                                SEDEX (Correios)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-envio" id="pac" value="pac">
                            <label class="form-check-label" for="pac">
                                PAC (Correios)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-envio" id="transportadora"
                                value="transportadora">
                            <label class="form-check-label" for="transportadora">
                                Transportadora
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-envio" id="retirar-loja"
                                value="retirar-loja">
                            <label class="form-check-label" for="retirar-loja">
                                Retirar na loja
                            </label>
                        </div>
                    </div>

                    <h5>Deseja adicionar seguro de envio?</h5>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seguro" id="seguro-ativo"
                                value="seguro-ativo" checked>
                            <label class="form-check-label" for="seguro-ativo">
                                Sim
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="seguro" id="seguro-desativo"
                                value="seguro-desativo">
                            <label class="form-check-label" for="seguro-desativo">
                                Não
                            </label>
                        </div>
                    </div>

                    <h5>Selecione a forma de pagamento</h5>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-pagamento" id="cartao-credito"
                                value="cartao-credito" value="cartao-credito" checked>
                            <label class="form-check-label" for="cartao-credito">
                                Cartão de crédito
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-pagamento" id="boleto"
                                value="boleto">
                            <label class="form-check-label" for="boleto">
                                Boleto
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-pagamento" id="transf-bancaria"
                                value="transf-bancaria">
                            <label class="form-check-label" for="transf-bancaria">
                                Transferência Bancária
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-pagamento" id="paypal"
                                value="paypal">
                            <label class="form-check-label" for="paypal">
                                Paypal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="forma-pagamento" id="picpay"
                                value="picpay">
                            <label class="form-check-label" for="picpay">
                                PicPay
                            </label>
                        </div>
                    </div>
                </div>
                <div class=" text-center mb-4">
                    <button type="submit" class="btn btn-success">FINALIZAR</button>
                </div>
            </aside>
        </form>
    </div>
</main>

<?php
    include 'components/footer.php';
?>