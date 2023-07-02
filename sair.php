<?php
// PARA USAR ESSE ARQUIVO BASTA ABRIR UM LINK <a> E NO CAMPO href PASSAR ESTE ARQUIVO. 

// INICIAR A SESSÃO
session_start();

// DESTRUIR AS SESSÕES
unset($_SESSION['idUsuario'], $_SESSION['primeiroNome']);

// ACESSAR O IF QUANDO O USUÁRIO NÃO ESTIVER LOGADO E REDIRECIONAR PARA PÁGINA DE LOGIN
if(!isset($_SESSION['idUsuario']) and !isset($_SESSION['primeiroNome'])){
    // MENSAGEM
    $_SESSION['msg'] = "<p style-'color=#f00'> Erro: Necessário realizar o login para acessar a página! </p>";
    
    // REDIRECIONA O USUÁRIO
    header('location: login.php');
    
    // PAUSAR O PROCESSAMENTO
    exit();
}
?>