<?php
// ARQUIVO PARA EXCLUIR O PEDIDO DO BANCO DE DADOS

include 'conexao.php';

// Verificar se o ID do pedido foi enviado
if (isset($_POST['idPedido'])) {
    // Obter o ID do pedido enviado via POST
    $idPedido = $_POST['idPedido'];

    // Consulta SQL para excluir o pedido pelo ID
    $sql = "DELETE FROM pedido WHERE idPedido = :idPedido";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idPedido', $idPedido);

    if ($stmt->execute()) {
        // Se a exclusão for bem-sucedida, retornar uma resposta de sucesso
        echo 'success';
    } else {
        // Se ocorrer algum erro ao excluir o pedido, retornar uma resposta de erro
        echo 'error';
    }
} else {
    // Se o ID do pedido não for enviado, retornar uma resposta de erro
    echo 'error';
}
?>