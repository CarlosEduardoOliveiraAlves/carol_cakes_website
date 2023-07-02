function enviarPedido() {
    // Obtenha os valores dos campos do pedido
    var tamanho = document.getElementById('tamanhoPedido').textContent;
    var massa = document.getElementById('massaPedido').textContent;
    var recheio = document.getElementById('recheioPedido').textContent;
    var decoracao = document.getElementById('decoracaoPedido').textContent;

    // Crie um objeto FormData para enviar os dados ao arquivo processar_pedido.php
    var formData = new FormData();
    formData.append('tamanho', tamanho);
    formData.append('massa', massa);
    formData.append('recheio', recheio);
    formData.append('decoracao', decoracao);

    // Faça a requisição AJAX para enviar os dados ao arquivo processar_pedido.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'envio_pedido.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // Exiba a resposta do servidor (opcional)
            closePopup(); // Feche o pop-up após o envio do pedido
            document.getElementById('form-pedido').reset();
        } else {
            console.log('Erro ao enviar o pedido');
        }
    };
    xhr.send(formData);
}

function enviarCadastro() {
    // Obtenha os valores dos campos do cadastro
    var primeiroNome = document.getElementById('primeiroNome').value;
    var sobrenome = document.getElementById('sobrenome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;

    // Crie um objeto FormData para enviar os dados ao arquivo processar_pedido.php
    var formData = new FormData();
    formData.append('primeiroNome', primeiroNome);
    formData.append('sobrenome', sobrenome);
    formData.append('email', email);
    formData.append('senha', senha);

    // Faça a requisição AJAX para enviar os dados ao arquivo processar_pedido.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'envio_cadastro.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText); // Exiba a resposta do servidor (opcional)
        } else {
            console.log('Erro ao enviar ao cadastrar');
        }
    };
    xhr.send(formData);
}

function showPopup(event) {
    event.preventDefault(); // Evita o comportamento padrão do envio do formulário

    // Resto do código permanece o mesmo...
    var tamanho = document.querySelector('input[name="inlineRadioTamanho"]:checked').value;
    var massa = document.querySelector('input[name="inlineRadioMassa"]:checked').value;
    var recheio = document.querySelector('input[name="inlineRadioRecheio"]:checked').value;
    var decoracao = document.querySelector('input[name="inlineRadioDecoracao"]:checked').value;
    
    // Preencha as informações no pop-up
    document.getElementById('tamanhoPedido').textContent = tamanho;
    document.getElementById('massaPedido').textContent = massa;
    document.getElementById('recheioPedido').textContent = recheio;
    document.getElementById('decoracaoPedido').textContent = decoracao;

    // Exiba o pop-up e o fundo escuro
    document.getElementById('popup').style.display = 'block';
    document.getElementById('popup-overlay').style.display = 'block';
}

function closePopup() {
    // Oculte o pop-up e o fundo escuro
    document.getElementById('popup').style.display = 'none';
    document.getElementById('popup-overlay').style.display = 'none';
}