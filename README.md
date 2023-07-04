# carol_cakes_website

Scripts para o banco de dados:

Tabela de Usuários - 
CREATE TABLE `usuarios` (`idUsuario` INT(220) NOT NULL AUTO_INCREMENT , `primeiroNome` VARCHAR(220) NOT NULL , `sobrenome` VARCHAR(220) NOT NULL , `email` VARCHAR(220) NOT NULL , `senha` VARCHAR(220) NOT NULL , `codigo_autenticacao` INT(220) NOT NULL , `data_codigo_autenticacao` DATETIME(6) NOT NULL , PRIMARY KEY (`idUsuario`)) ENGINE = InnoDB CHARSET=utf16 COLLATE utf16_unicode_ci;

Tabela de Pedidos -
CREATE TABLE `pedido` (`idPedido` INT(220) NOT NULL AUTO_INCREMENT , `idUsuario` INT(220) NOT NULL , `tamanho` VARCHAR(220) NOT NULL , `massa` VARCHAR(220) NOT NULL , `recheio` VARCHAR(220) NOT NULL , `decoracao` VARCHAR(220) NOT NULL , PRIMARY KEY (`idPedido`)) ENGINE = InnoDB CHARSET=utf16 COLLATE utf16_unicode_ci;
