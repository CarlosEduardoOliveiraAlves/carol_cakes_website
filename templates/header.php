<header class="p-3 border-bottom sticky-top bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="index.php" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img src="img/logo.png" width="150" height="70" role="img" alt="Logo Carol Cakes">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" id="menu">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 link-body-emphasis border-bottom pb-1 mx-2" id="home-menu">Home</a></li>
                <li class="nav-item"><a class="nav-link px-2 link-body-emphasis border-bottom pb-1 mx-2" id="sobre-menu" onclick="scrollToPosition('#sobre')">Sobre</a></li>
                <li class="nav-item"><a class="nav-link px-2 link-body-emphasis border-bottom pb-1 mx-2" id="sobre-menu" onclick="scrollToPosition('#produtos')">Nossos Produtos</a></li>
                <li class="nav-item"><a class="nav-link px-2 link-body-emphasis border-bottom pb-1 mx-2" id="sobre-menu" onclick="scrollToPosition('#localizacao')">Localização</a></li>
                <li class="nav-item"><a href="pedido.php" class="nav-link px-2 link-body-emphasis border-bottom pb-1">Fazer pedido</a></li>
            </ul>



            <p class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <?php   echo $_SESSION['primeiroNome'];
                        echo " ";
                        echo $_SESSION['sobrenome'];
                ?>
            </p>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="meus_pedidos.php">Meus Pedidos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="sair.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
