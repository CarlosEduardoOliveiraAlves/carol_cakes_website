<?php
// ARQUIVO PARA REALIZAR A CONSULTA DOS PEDIDOS

session_start();

include 'conexao.php';
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

<?php include 'templates/header.php'; ?>

<section id="pedidos" class="container mt-5">
    <h1>Meus Pedidos</h1>

    <div class="row">
        <?php
        // CONSULTA SQL PARA OBTER OS PEDIDOS DO USUÁRIO LOGADO
        $sql = "SELECT idPedido, tamanho, massa, recheio, decoracao FROM pedido WHERE idUsuario = :idUsuario";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $_SESSION['idUsuario']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Utilizamos as classes do Bootstrap para formatar a aparência dos pedidos
                echo '<div class="col-md-6">';
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Número do Pedido: ' . $row["idPedido"] . '</h5>';
                echo '<p class="card-text"><strong>Tamanho do bolo:</strong> ' . $row["tamanho"] . '</p>';
                echo '<p class="card-text"><strong>Tipo de massa:</strong> ' . $row["massa"] . '</p>';
                echo '<p class="card-text"><strong>Sabor do recheio:</strong> ' . $row["recheio"] . '</p>';
                echo '<p class="card-text6"><strong>Decoração:</strong> ' . $row["decoracao"] . '</p>';
                echo '<button class="btn btn-danger btn-deletar" data-id="' . $row["idPedido"] . '">Deletar Pedido</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Nenhum pedido encontrado.</p>';
        }
        ?>
    </div>

    <div class="text-center mt-3 mb-3">
        <a href="pedido.php" class="btn btn-primary">
            <i class="fas fa-plus-square"></i> Adicionar Novo Pedido
        </a>
    </div>
</section>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    // Capturar o evento de clique no botão de exclusão
    $('.btn-deletar').click(function() {
        // Obter o ID do pedido a partir do atributo data-id
        var idPedido = $(this).data('id');
        
        // Confirmar se o usuário deseja realmente excluir o pedido
        if (confirm('Tem certeza que deseja excluir o pedido?')) {
            // Referência ao elemento atual
            var $botao = $(this);
            
            // Enviar uma requisição AJAX para excluir o pedido no banco de dados
            $.ajax({
                url: 'excluir_pedido.php',
                method: 'POST',
                data: { idPedido: idPedido },
                success: function(response) {
                    // Verificar se a exclusão foi bem-sucedida
                    if (response == 'success') {
                        // Remover o elemento do pedido da página
                        $botao.closest('.card').remove();
                        alert('Pedido excluído com sucesso!');
                    } else {
                        alert('Erro ao excluir o pedido. Tente novamente.');
                    }
                }
            });
        }
    });
});
</script>
</body>
</html>
