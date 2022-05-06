<?php
// conexão com banco de dados
$servername = "localhost";
$username = "root";
$password ="";
$db_name = "sistemalogin";

$connect = mysqli_connect($servername, $username, $password, $db_name);
//mysqli pode ser usado no php procedural quanto na orientação a objetos

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;