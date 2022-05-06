<?php
// sessão
session_start();

// conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):

    $id = mysqli_escape_string($connect, $_POST['id']);

    //inserindo dados no database
    $sql = "DELETE FROM clientes WHERE id = '$id'";
    if(mysqli_query($connect, $sql)):
        // header('Location: ../index.php?sucesso'); (demo) ? para add outro parâmetro
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        // header('Location: ../index.php?erro');
        $_SESSION['mensagem'] = "Erro ao deletar";
        header('Location: ../index.php');
    endif;
endif;