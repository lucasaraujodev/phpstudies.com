<?php
//conexão 
require_once 'db_connect.php';
//sessão
session_start();

// botão enviar
if (isset($_POST['btn-entrar'])):
    // echo "clicou"; (demo)
    $erros = array();
    //pegar o login e senha digitados pelo usuário
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']); 

    if(empty($login) or empty($senha)):
        $erros[] = "<li> O campo login/senha precisa ser preenchido </li>"; 
    else: //verificando se o login/senha digitados existem no data base
        $sql = "SELECT login FROM usuarios WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0): //se o número de linhas de $resultado for maior doq 0, é pq está presente no data base
            $senha = md5($senha); //antes de inserir a senha no mysql é preciso criptografar
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'"; // * significa todos os campos
            $resultado = mysqli_query($connect, $sql);
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect); //fechando consulta ao data base
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: home.php');
                else: $erros[] = "<li> Usuário e senha não conferem </li>";
                endif;
        else:
            $erros[] = "<li> Usuário inexistente </li>";
        endif;
    endif;
endif;


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1> Login </h1>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
        echo "<hr>";

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Login: <input type="text" name="login"><br>
        Senha: <input type="password" name="senha"><br>
        <button type="submit" name="btn-entrar"> Entrar </button>
    </form>
</body>
</html>