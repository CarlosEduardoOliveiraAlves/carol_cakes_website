<?php

// INICIAR A SESSÃO
session_start();

// DEFINIR UM FUSO HORÁRIO PADRÃO
date_default_timezone_set('America/Sao_Paulo');

// INCLUIR O ARQUIVO COM A CONEXÃO COM BANCO DE DADOS
include_once "conexao.php";

// RECEBER OS DADOS DO FORMULÁRIO E REALIZAR A SANITIZAÇÃO DOS CAMPOS
$dados = filter_input_array(INPUT_POST, [
    'primeiroNome' => FILTER_SANITIZE_STRING,
    'sobrenome' => FILTER_SANITIZE_STRING,
    'email' => FILTER_VALIDATE_EMAIL,
    'senha' => FILTER_SANITIZE_STRING,
    'confirmarSenha' => FILTER_SANITIZE_STRING
]);

// ARRAY PARA ARMAZENAR ERROS
$erros = array();

// ACESSA O IF QUANDO O USUÁRIO CLICAR NO BOTÃO CADASTRAR E REALIZAR A VALIDAÇÃO DOS CAMPOS COM A MENSAGEM DE ERRO
if (!empty($dados['primeiroNome'])) {

    // VERIFICAÇÃO DOS CAMPOS OBRIGATÓRIOS
    /*
    if (empty($dados['primeiroNome'])) {
        $_SESSION['msg'] = "O primeiro nome é obrigatório!";
    }

    if (empty($dados['sobrenome'])) {
        $_SESSION['msg'] = "O sobrenome é obrigatório!";
    }

    if (empty($dados['senha'])) {
        $_SESSION['msg'] = "A senha é obrigatória!";
    }

    if($dados['senha'] != $dados['confirmarSenha']) {
        $_SESSION['msg'] = "Erro na confirmação da senha";
    }
    */
    // VERIFICAR SE O EMAIL JÁ EXISTE NO BANCO DE DADOS
    $query_verificar_email = "SELECT email FROM usuarios WHERE email = :email";
    $verificar_email = $conn->prepare($query_verificar_email);
    $verificar_email->bindParam(':email', $dados['email']);
    $verificar_email->execute();

    if ($verificar_email->rowCount() > 0) {
        $_SESSION['msg'] = "O e-mail informado já está cadastrado!";
    }

    // SE NÃO HOUVER ERROS, REALIZAR O CADASTRO NO BANCO DE DADOS
    if (!isset($_SESSION['msg'])) {
        // CRIPTOGRAFAR A SENHA
        $senha = $dados['senha'];
        $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

        // CRIAR A QUERY PARA CADASTRAR NO BANCO DE DADOS
        $query_usuario = "INSERT INTO usuarios (primeiroNome, sobrenome, email, senha) VALUES (:primeiroNome, :sobrenome, :email, :senha)";
        $cad_usuario = $conn->prepare($query_usuario);

        // SUBSTITUIR O LINK PELO VALOR QUE VEM DO FORMULÁRIO
        $cad_usuario->bindParam(':primeiroNome', $dados['primeiroNome']);
        $cad_usuario->bindParam(':sobrenome', $dados['sobrenome']);
        $cad_usuario->bindParam(':email', $dados['email']);
        $cad_usuario->bindParam(':senha', $senha_cripto);

        // EXECUTAR A QUERY
        $cad_usuario->execute();

        // ACESSA O IF QUANDO CADASTRAR O REGISTRO NO BANCO DE DADOS
        if ($cad_usuario->rowCount()) {
            // CRIAR MENSAGEM E ATRIBUIR PARA VARIÁVEL GLOBAL
            $_SESSION['msgCorreta'] = "<p style='color: green'> Usuário cadastrado com sucesso! </p>";

            // REDIRECIONAR O USUÁRIO PARA A PÁGINA DE LOGIN 
            header("location: login.php");
            exit(); // Termina o script após o redirecionamento
        } else {
            // CRIAR MENSAGEM E ATRIBUIR PARA VARIÁVEL GLOBAL
            $_SESSION['msg'] = "<p style='color: red'> Erro ao cadastrar o usuário </p>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carol Cakes</title>
        
        <!--Font-->
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Roboto:wght@300;400;700&display=swap"
            rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>

<?php
    include "templates/headerDeslogado.php";
?>

<!--Formulário Cadastro-->
<section id="cadastro">
    <main class="container square-box d-flex justify-content-center align-items-center mt-5 mb-5">
        <form id="form-cadastro" action="" method="POST" class="row g-3">
            <div class="col-md-12 mt-3">
                <legend class="main-tittle ">Cadastro</legend>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <label for="formGroupExampleInput" class="form-label">Primeiro Nome</label>
                <input id="primeiroNome" name="primeiroNome" type="text" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <label for="formGroupExampleInput2" class="form-label">Sobrenome</label>
                <input id="sobrenome" name="sobrenome" type="text" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <label for="inputPassword4" class="form-label">Senha</label>
                <input id="senha" name="senha" type="password" class="form-control" required>
            </div>
            <div class="col-md-6 mt-3 mb-3">
                <label for="inputPassword4" class="form-label">Confirmar Senha</label>
                <input name="confirmarSenha" type="password" class="form-control" required>
            </div>
            <div id="btncenter" class="col-md-2 mt-5 mb-3 ">
                <button id="btn" type="submit" class="btn_pag_cadastrar btn bg-sucess">Criar Conta</button>
            </div>
        </form>
    </main>
</section>

<!--Mensagem de Erro-->
<div id="mensagem_erro_cadastro">
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