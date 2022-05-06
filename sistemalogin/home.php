<?php
//conexão 
require_once 'db_connect.php';
//sessão
session_start();
// verificação (para impedir o acesso a página restrita por meio da url)
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;
// dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'" ;
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado); // a variável dados contém todos os dados que estão armazenados no data base
mysqli_close($connect); //fechando consulta ao data base
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Página Restrita</title>
</head>
<body>
    <h1>Olá <?php echo /*$_SESSION['id_usuario'] (demo)*/ $dados['nome']; ?> </h1>
    <a href="logout.php">Sair</a>
</body>
</html>