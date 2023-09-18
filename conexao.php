<?php
    //criando as variáveis de conexão
    $host = "localhost";
    $dbname = "livrariai2a";
    $username = "root";
    $password = "root";

    $conn = new mysqli($host, $username, $password, $dbname); //Nessa ordem
    
    if($conn->connect_errno != 0){
        echo "Falha ao conectar: (".$conn->connect_errno. ")";
    }else{
        //echo "Conectado ao banco";
    }
?>