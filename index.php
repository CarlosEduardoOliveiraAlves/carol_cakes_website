<?php
// INICIAR A SESSÃO
session_start();

if(!isset($_SESSION['idUsuario']) and !isset($_SESSION['primeiroNome'])){
    
    // MENSAGEM
    $_SESSION['msg'] = "<p style-'color=#f00'> Erro: Necessário realizar o login para acessar a página! </p>";
    
    // REDIRECIONA O USUÁRIO
    header('location: login.php');
    
    // PAUSAR O PROCESSAMENTO
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carol Cakes - Home</title>
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!--Cabeçalho-->
<?php
    include 'templates/header.php';
?>

<!--Conteúdo Principal-->
<main>

<!--Sobre a Carol Cakes-->
<section id="sobre">
    <div class="container pb-3">
        <div class="row">
            <!--Título Sobre Carol Cakes-->
            <div class="col-12">
                <h3 class="main-tittle col-4">Sobre a Carol Cakes</h3>
            </div>
            <!--Imagem Sobre Carol Cakes-->
            <div class="col-md-6">
                <div class="img-center">
                    <img class="img-fluid" src="img/confeitaria-carolcakes.png" alt="Confeitaria Carol Cakes">
                </div>
            </div>
            <!--Texto Sobre Carol Cakes-->
            <div class="col-md-6">
                <div class="about-text">
                    <h3 class="about-title">Nossa História</h3>
                    <p></p>
                    <p>
                        Nossa história é uma trajetória antiga, que começou em 2004, na encantadora cidade de Vitória, Espírito Santo, Brasil.
                        Foi lá que a talentosa confeiteira capixaba Caroline de Oliveira Melo deu início a uma jornada doce e apaixonante na confeitaria.
                        Há mais de 19 anos, Caroline tem encantado paladares e conquistado corações com seus deliciosos bolos e doces,
                        construindo uma clientela fiel que se delicia com cada criação.
                    </p>
                    <p>                     
                        Ao longo desses anos, Caroline aprimorou suas habilidades, aperfeiçoou técnicas e explorou novas tendências,
                        sempre em busca de levar o melhor para seus clientes.
                        Sua paixão pela confeitaria transparece em cada detalhe de suas criações,
                        desde a escolha dos ingredientes de alta qualidade até a cuidadosa execução de cada doce.
                    </p>                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nossos Produtos -->
<section id='produtos'>
    <div class="container pb-3">
        <div class="row">
            <div class="col-8">
            </div>
            <!--Título Produtos-->
            <div class="col-4">
                <h3 class="main-tittle">Nossos Produtos</h3>
            </div>
            <!--Texto Produtos-->
            <div class="col-md-6">
                <div class="about-text">
                    <h3 class="about-title">Qualidade em primeiro lugar</h3>
                    <p></p>
                    <p>
                        Na Confeitaria Carol Cakes, valorizamos a qualidade dos nossos produtos acima de tudo.
                        Nosso compromisso é oferecer aos nossos clientes uma experiência excepcional, onde cada mordida é um deleite para os sentidos.
                    <p>
                        Nosso segredo está no cuidado minucioso que dedicamos à seleção dos melhores materiais disponíveis.
                        Utilizamos ingredientes de altíssima qualidade, desde os mais frescos e saborosos frutos até os chocolates mais refinados e nobres.
                        Acreditamos que a escolha dos ingredientes certos é fundamental para garantir a excelência do sabor em cada doce que produzimos.
                    </p>
                </div>
            </div>
            <!--Imagem Produtos-->
            <div class="col-md-6">
                <div class="img-center">
                    <img class="img-fluid" src="img/nossos_produtos.jpeg" alt="Confeitaria Carol Cakes">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Localizacao -->
<section id='localizacao'>
    <div class="container pb-3">
        <div class="row">
            <!--Título Localização-->
            <div class="col-12">
                <h3 class="main-tittle col-3">Localização</h3>
            </div>
            <!--Mapa Google Maps-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <iframe height="300"  width="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=R.%20Francisco%20Rubim,%20188%20-%20Bento%20Ferreira,%20Vit%C3%B3ria%20-%20ES,%2029050-680+(Ed%20Pedro%20Feu%20Rosa)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
            <!--Texto Localização-->
            <div class="col-md-6">
                <div class="about-text">
                    <h3 class="about-title">Endereço</h3>
                    <p></p>
                    <p>
                        A Confeitaria Carol Cakes está atualmente operando a partir de um modelo de negócio baseado em casa.
                        Embora não tenhamos uma localização física, todos os pedidos são retirados na rua Francisco Rubim, em Bento Ferreira, número 188,
                        estamos trabalhando arduamente para alcançar esse objetivo no futuro.
                        Atualmente, atendemos nossos clientes de forma personalizada por meio das plataformas Instagram e WhatsApp.
                    </p>
                    <p>
                        Valorizamos muito o contato direto com nossos clientes,
                        garantindo um atendimento atencioso e dedicado a cada pedido.
                        Estamos ansiosos para evoluir e oferecer uma confeitaria física em breve,
                        para que todos possam desfrutar dos nossos deliciosos produtos em um espaço acolhedor e encantador.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<!--Rodapé-->
<?php include "templates/footer.php";?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="js/scroll.js"></script>

</body>
</html>