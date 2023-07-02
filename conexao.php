<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'testes';
    
try{
    
    $conn = new PDO("mysql:host=$host;dbname=" . $database, $user, $pass);
    //echo "Conexão efetuada com sucesso!";

} catch(PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado" . $err->getMessage();
}
?>