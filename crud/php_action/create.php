<?php
// sessão
session_start();

// conexão
require_once 'db_connect.php';

// clear
function clear($input) {
    global $connect;
    // para proteger do mysql injection
    $var = mysqli_escape_string($connect, $input);
    // para proteger do xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])):
    $nome = clear($_POST['nome']); 
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);

    //inserindo dados no database
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
    if(mysqli_query($connect, $sql)):
        // header('Location: ../index.php?sucesso'); (demo) ? para add outro parâmetro
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        // header('Location: ../index.php?erro');
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;
endif;