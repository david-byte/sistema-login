<?php
//Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "login_sistema";
//mysqli_connect por ser um sistema procedural
$connect = mysqli_connect($servername, $username, $password, $db_name);
//verificação da conexão
if(mysqli_connect_error()):
    echo "Falha na conexão ".mysqli_connect_error;
endif;