<?php

// INICIAR A SESSÃO
session_start();

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do pedido do formulário
    $tamanho = $_POST['tamanho'];
    $massa = $_POST['massa'];
    $recheio = $_POST['recheio'];
    $decoracao = $_POST['decoracao'];

    // Prepare a consulta SQL para inserir os dados na tabela do banco de dados
    $sql = "INSERT INTO pedido (idUsuario, tamanho, massa, recheio, decoracao) VALUES (:idUsuario, :tamanho, :massa, :recheio, :decoracao)";
    $stmt = $conn->prepare($sql);
    
    // Substitua os parâmetros pelos valores reais
    $stmt->bindParam(':idUsuario', $_SESSION['idUsuario']);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':massa', $massa);
    $stmt->bindParam(':recheio', $recheio);
    $stmt->bindParam(':decoracao', $decoracao);

    if ($stmt->execute()) {
        echo "<p>Pedido registrado com sucesso!</p>";
    } else {
        echo "Erro ao registrar o pedido: " . $stmt->errorInfo()[2];
    }
}
$conn = null;
?>