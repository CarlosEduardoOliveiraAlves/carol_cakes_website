<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carol Cakes - Home</title>
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    include "templates/header.php"
?>
<main>
<section id="pedido">
    <form id="form-pedido" action="envio_pedido.php" method="POST">
        <div class="container mb-5 p-5">
            <div class="col-12">
                <h3 class="main-tittle">Faça seu pedido</h3>
            </div>
            <!--Tamanho-->
            <div id="subtitulos" class="about-title mb-4">
                Escolha o tamanho
            </div>
            <div name="tamanho" id="tamanho" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioTamanho" id="inlineRadio1"
                        value="15cm - 12 fatias - 1,5kg">
                    <label class="form-check-label" for="inlineRadio1">15cm - 12 fatias - 1,5kg</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioTamanho" id="inlineRadio2"
                        value="20cm - 20 fatias - 2kg">
                    <label class="form-check-label" for="inlineRadio2">20cm - 20 fatias - 2kg</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioTamanho" id="inlineRadio3"
                        value="25cm - 30 fatias - 3kg">
                    <label class="form-check-label" for="inlineRadio3">25cm - 30 fatias - 3kg</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioTamanho" id="inlineRadio4"
                        value="30cm - 50 fatias - 5kg">
                    <label class="form-check-label" for="inlineRadio3">30cm - 50 fatias - 5kg</label>
                </div>
            </div>
            <!--Valores Tamanho-->
            <div id="valorTamanhos" class="row align-items-center">
                <p class="col">R$ 135,00 Tradicional / R$ 155,00 Especial</p>
                <p class="col">R$ 155,00 Tradicional / R$ 180,00 Especial</p>
                <p class="col">R$ 215,00 Tradicional / R$ 245,00 Especial</p>
                <p class="col">R$ 340,00 Tradicional / R$ 380,00 Especial</p>
            </div>


            <!--Massa-->
            <div id="subtitulos" class="about-title mt-4 mb-4">
                Escolha a Massa
            </div>
            <div name="massas" id="massas" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioMassa" id="inlineRadio1"
                        value="Massa fofinha de Baunilha">
                    <label class="form-check-label" for="inlineRadio1">Massa fofinha de Baunilha</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioMassa" id="inlineRadio2"
                        value="Massa Chocolatuda">
                    <label class="form-check-label" for="inlineRadio2">Massa Chocolatuda</label>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
            <!--Obs-->
            <div id="valorTamanhos" class="row align-items-center">
                <p class="col-12 justify-content-end">Todos os bolos possuem 3 camadas de bolo e 2 de recheio.</p>
                <p class="col-12 justify-content-end">Tem em media 10 a 12cm de altura após decorado.</p>
                <p class="col-12 justify-content-end">A quantidade de fatias é uma média podendo variar para mais ou
                    menos dependendo da espessura que se corta.</p>
                <p class="col-12 justify-content-end">Para alturas maiores favor consultar o valor!</p>
            </div>

            <!--Recheio Tradicional-->
            <div id="subtitulos" class="about-title mt-4 mb-4">
                Escolha a combinação de recheios tradicional
            </div>
            <div name="sabor" id="recheiotTrad1" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio1"
                        value="Beijinho de Côco e Brigadeiro Cacau 50%">
                    <label class="form-check-label" for="inlineRadio1">Beijinho de Côco e Brigadeiro Cacau
                        50%</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio2"
                        value="Beijinho de Côco e Doce de leite">
                    <label class="form-check-label" for="inlineRadio2">Beijinho de Côco e Doce de leite</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio3"
                        value='Mousse de Chocolate e "Brigadeiro Bicho de pé" (creme danoninho)'>
                    <label class="form-check-label" for="inlineRadio3">Mousse de Chocolate e "Brigadeiro Bicho de
                        pé" (creme danoninho)</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio4"
                        value="Mousse de Maracujá e Brigadeiro cacau 50%">
                    <label class="form-check-label" for="inlineRadio3">Mousse de Maracujá e Brigadeiro cacau
                        50%</label>
                </div>
            </div>
            <div name="sabor" id="recheiotTrad2" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio1"
                        value="Creme de Moça com abacaxi e doce de leite caseiro">
                    <label class="form-check-label" for="inlineRadio1">Creme de Moça com abacaxi e doce de leite
                        caseiro</label>
                </div>
                <div class="col p-3 form-check form-check-inline ">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio2"
                        value="Côco com Abacaxi e doce de leite caseiro">
                    <label class="form-check-label" for="inlineRadio2">Côco com Abacaxi e doce de leite
                        caseiro</label>
                </div>
                <div class="col p-3 form-check form-check-inline ">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio3"
                        value="Côco com Abacaxi e doce de leite caseiro com ameixas">
                    <label class="form-check-label" for="inlineRadio2">Côco com Abacaxi e doce de leite caseiro com
                        ameixas</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio4" value="Ninho com Abacaxi e Doce de leite caseiro>
                    <label class=" form-check-label" for="inlineRadio3">Ninho com Abacaxi e Doce de leite
                    caseiro</label>
                </div>
            </div>
            <div name="sabor" id="recheiotTrad3" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio1"
                        value="Brigadeiro Oreo e Mousse de Chocolate">
                    <label class="form-check-label" for="inlineRadio3">Brigadeiro Oreo e Mousse de Chocolate</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio2"
                        value="Ninho com geléia de morangos caseira e mousse de chocolate">
                    <label class="form-check-label" for="inlineRadio1">Ninho com geléia de morangos caseira e mousse
                        de chocolate</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioRecheio" id="inlineRadio3"
                        value="Ninho com Nutella e Mousse de chocolate">
                    <label class="form-check-label" for="inlineRadio1">Ninho com Nutella e Mousse de
                        chocolate</label>
                </div>
                <div class="col"></div>
            </div>
            <!--Decoração-->
            <div id="subtitulos" class="about-title mb-4">
                Escolha a decoração
            </div>
            <p>No meu instagram <a class="link" href="https://www.instagram.com/carolcakes.vix/">@carolcakes.vix</a>
                tenho diversos modelos de decorações, todavia não se prenda a apenas estes modelos, podemos e
                queremos ter outras referências também, basta me enviar!!!</p>
            <p>Trabalhamos exclusivamente com cobertura em:</p>
            <div name="decoracao" id="decoracao" class="row align-items-center">
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioDecoracao" id="inlineRadio1"
                        value="Chantininho">
                    <label class="form-check-label" for="inlineRadio1">Chantininho</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioDecoracao" id="inlineRadio2"
                        value="Naked Cake no acetato">
                    <label class="form-check-label" for="inlineRadio2">Naked Cake no acetato</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioDecoracao" id="inlineRadio3"
                        value="Lascas de Chocolate(Tipo tronquinho)">
                    <label class="form-check-label" for="inlineRadio3">Lascas de Chocolate(Tipo tronquinho)</label>
                </div>
                <div class="col p-3 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioDecoracao" id="inlineRadio4"
                        value="Ganache de Chocolate Nobre (Consultar Valor)">
                    <label class="form-check-label" for="inlineRadio3">Ganache de Chocolate Nobre (Consultar
                        Valor)</label>
                </div>
            </div>
            <div class="col-12 mt-5 row justify-content-center">
                <button class="btn_pag_pedido" type="button" onclick="showPopup(event)">Confirmar Pedido</button>
            </div>
        </div>
    </form>
</section>
    
        <?php
            include "templates/footer.php";
        ?>

        <div id="popup-overlay" onclick="closePopup()"></div>
        <div id="popup">
            <h3>Confirme seu pedido:</h3>
            <p>Tamanho: <span id="tamanhoPedido"></span></p>
            <p>Massa: <span id="massaPedido"></span></p>
            <p>Recheio: <span id="recheioPedido"></span></p>
            <p>Decoração: <span id="decoracaoPedido"></span></p>
            <button onclick="closePopup()">Fechar</button>
            <button type="button" onclick="enviarPedido()">Confirmar</button>
        </div>

        

        <!--Mensagem de Sucesso-->
        <div id="mensagem_sucesso_cadastro">
            <?php
            if(isset($_SESSION['msgCorreta']))  {
                echo '<div class="alert alert-sucess" role="alert">' . $_SESSION['msgCorreta'] . '</div>';
                unset($_SESSION['msgCorreta']);
            }
            ?>
        </div>

        <!-- Mensagem de erro -->
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>


    </main>

    <!--Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/16de2e9eda.js" crossorigin="anonymous"></script>
    <script src="js/funcoes.js"></script>

</body>

</html>