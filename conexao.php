<?php

    $host = 'us-cdbr-east-06.cleardb.net';
    $user = 'b962d2b24d3840';
    $pass = '327ebd67';
    $database = 'heroku_e8f4dbbbfb0170a';
    
try{
    
    $conn = new PDO("mysql:host=$host;dbname=" . $database, $user, $pass);
    //echo "Conexão efetuada com sucesso!";

} catch(PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado" . $err->getMessage();
}
?>