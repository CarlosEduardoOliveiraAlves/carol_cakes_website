<?php
// INICIAR A SESSÃO
session_start();

// DEFINIR UM FUSO HORÁRIO PADRÃO
date_default_timezone_set('America/Sao_Paulo');

//INCLUIR O ARQUIVO COM A CONEXÃO COM O BD
include_once "conexao.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// ACESSA O IF QUANDO O USUÁRIO CLICAR NO BOTÃO DE LOGIN
if (!empty($dados['sendLogin'])) {

    // RECUPERAR OS DADOS DO USUÁRIO DO BANCO DE DADOS
    $query_usuario = "SELECT idUsuario, primeiroNome, sobrenome, email, senha FROM usuarios WHERE email = :email LIMIT 1" ;
    
    // PREPARAR A QUERY
    $result_usuario = $conn->prepare($query_usuario);

    // SUBSTITUIR O LINK DA QUERY PELO VALOR QUE VEM DO FORMULÁRIO
    $result_usuario->bindParam(":email", $dados['email']);
    
    // EXECUTAR A QUERY
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        
        // LER OS REGISTROS RETORNADOS DO BANCO DE DADOS
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC); 

        // ACESSAR O IF QUANDO A SENHA É VÁLIDA
        if(password_verify($dados['senha'], $row_usuario['senha'])) {
            
        /*  REQUISITO {
            Utilize sessão para armazenar o código do usuário logado no sistema. Mostre o
            nome do usuário logado na barra de título da página. O nome do usuário não
            deve ser armazenado na sessão. O nome do usuário deve ser consultado a partir
            do código do usuário armazenado na sessão.  
            }*/

            // SALVAR DADOS DO USUÁRIO NA SESSÃO
            $_SESSION['idUsuario'] = $row_usuario['idUsuario'];
            $_SESSION['primeiroNome'] = $row_usuario['primeiroNome'];
            $_SESSION['sobrenome'] = $row_usuario['sobrenome'];
            $_SESSION['email'] = $row_usuario['email'];

            /*
            // QUERY PARA CAPTURAR NOME DE USUÁRIO
            $query_nome_usuario = "SELECT primeiroNome from usuarios WHERE idUsuario = :idUsuario";

            // PREPARAR A QUERY
            $result_nome_usuario = $conn->prepare($query_nome_usuario);

            // SUBSTITUIR O PARÂMETRO PELO VALOR REAL
            $result_nome_usuario->bindParam(':idUsuario', $_SESSION['idUsuario']);

            // EXECUTAR A QUERY
            $result_nome_usuario->execute();
            */
        
            // RECUPERAR A DATA ATUAL
            $data = date('Y-m-d H:i:s');

            // GERAR UM NÚMERO RANDÔMICO ENTRE 100000 E 999999
            $codigo_autenticacao = mt_rand(100000, 999999);

            // QUERY PARA SALVAR NO BANCO DE DADOS O CÓDIGO E A DATA GERADA
            $query_up_usuario = "UPDATE usuarios SET
            codigo_autenticacao =:codigo_autenticacao,
            data_codigo_autenticacao =:data_codigo_autenticacao
            WHERE idUsuario =:idUsuario
            LIMIT 1";

            // PREPARAR A QUERY
            $result_up_usuario = $conn->prepare($query_up_usuario);

            // SUBSTITUIR O LINK DA QUERY PELOS VALORES
            $result_up_usuario->bindParam(':codigo_autenticacao', $codigo_autenticacao);
            $result_up_usuario->bindParam(':data_codigo_autenticacao', $data);
            $result_up_usuario->bindParam(':idUsuario', $row_usuario['idUsuario']);

            // EXECUTAR A QUERY
            $result_up_usuario->execute();
            
            header('location: index.php');
        } else {
            $_SESSION['msg'] = "<p>Autenticação falhou. Usuário ou senha inválida!</p>";
        }

    } else {
        // USUÁRIO NÃO ENCONTRADO NO BANCO DE DADOS
        $_SESSION['msg'] = "<p>Autenticação falhou. Usuário não encontrado!</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carol Cakes - Login</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body id="body_login" class="vh-100">

<?php
    include "templates/headerDeslogado.php"
?>

<!--Formulário Login-->
<section id="login">
    <main class="container square-box d-flex justify-content-center align-items-center mt-5 mb-5">
        <form action="" method="POST" id="form_login" class="row justify-content-center" >
            <div class="col-md-12 mt-3">
                <legend class="main-tittle">Login</legend>
            </div>
            <div class="col-md-12 mb-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="inputPassword4" class="form-label">Senha</label>
                <input type="password" class="form-control" id="inputPassword4" name="senha" required>
            </div>
            <div class="col-2 mx-5 align-self-center mt-2">
                <input type="submit" class="btn_pag_login_entrar" name="sendLogin" value="Entrar"></input>
            </div>
            <div class="col-4 align-self-center mt-2">
                <a href="cadastro.php" class="btn_pag_login_cadastrar" id="link-cadastrar">Cadastrar-se</a>
            </div>
        </form>
    </main>
</section>



<!--Mensagem de Erro-->
<div id="mensagem_erro_login">
    <?php
    if(isset($_SESSION['msg'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['msg'] . '</div>';
        unset($_SESSION['msg']);
    }
    ?>
</div>




    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</body>
</html>