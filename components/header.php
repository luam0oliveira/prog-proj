<?php
    require_once __DIR__ . "/../utils.php";
    session_start();

    $util = new Utils();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="shortcut icon" href="img/icones/baby-book.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="bg-dark">
        <div class="container d-flex justify-content-between align-items-center gap-3 py-3 px-0">
            <a href="index.php">
                <img src="img/logo/baby-book.png" alt="" width="75px">
            </a>
            <div class="d-flex">
                <form class="d-none align-self-center me-4 d-lg-flex" action="catalogo.php">
                    <button class="btn btn-outline-light me-2" type="submit">Search</button>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
                <a href="cesta.php" class=" align-self-center header-icons me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-cart header-icons-svg" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </a>
                <a href="form_login.php" class=" align-self-center header-icons">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                </a>
                <nav class="navbar navbar-expand-lg navbar-light d-lg-none">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="nav-list m-0 p-0">
                                <li class="nav-item">
                                    <a class="nav-link px-3 text-white fw-bolder" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 text-white " href="catalogo.php">Catálogo</a>
                                </li>
                            </ul>
                            <form class=" d-flex align-self-center">
                                <button class="btn btn-outline-light me-2" type="submit">Search</button>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>



        </div>

        <nav class="navbar py-1 d-lg-block d-none">
            <div class="container p-0 border-top">
                <ul class="nav-list d-flex m-0 p-0">
                    <li class="nav-item">
                        <a class="nav-link px-3 text-white fw-bolder" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 text-white " href="catalogo.php">Catálogo</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>