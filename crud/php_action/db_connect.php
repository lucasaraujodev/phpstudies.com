<?php
# conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

# abrindo conexão
$connect = mysqli_connect($servername, $username, $password, $db_name);

#corrigndo a escrita de caracteres especiais quando inseridos no data base
mysqli_set_charset($connect, "utf8");

# verificando se houve algum erro
if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;