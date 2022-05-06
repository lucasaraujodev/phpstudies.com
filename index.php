<?php
echo "Hello World <br>";

$nome = 123;
print $nome;
echo "<hr>";

$destino = "cidade";
$$destino = "Paris";

echo "$destino <br>";
echo $cidade;

var_dump($nome);
if (is_string($nome)):
    echo "É uma string";
else:
    echo "Não é uma string";
endif;

echo "<hr>";

// condicionais if, else, elseif, switch/case

$numero = 50;
if ($numero == 10):
    echo "É igual a 10";
elseif($numero <= 9):
    echo "É menor do que 10";
else:
    echo "É maior do que 10";
endif;

echo "<hr>";

$media = 7;
echo ($media >= 7) ? "Aprovado!" : "Reprovado!"; // ? simboliza if e : simboliza else

echo "<hr>";

$color = "red";
switch ($color):
    case "red":
        echo "Your favorite color is red";
    break;
    case "blue":
        echo "Your favorite color is blue";
    break;
    default:
        echo "Your favorite color isn't red nor blue";

    endswitch;

echo "<hr>";

// INCREMENTOS
$valor = 45;
// pré-incremento
echo ++$valor."<br>";
echo --$valor."<br>";
// pós-incremento
echo $valor++."<br>";
echo $valor--."<br>";

echo "<hr>";

// OPERADORES DE ATRIBUIÇÃO
$a = 4;
$b = 5;
echo $a += $b; // $a = $a + $b
echo "<hr>";

// OPERADORES DE COMPARAÇÃO

if (6 <= 10):
    echo "Positivo";
else:
    echo "Negativo";
endif;
echo "<hr>";

// OPERADORES LÓGICOS
// and - &, or - ||, xor (exclusive or), ! (negação)

$idade = 22;
$nome = "Lucas";

if (($idade =25) xor ($nome == "Lucas")):
    echo "True";
else:
    echo "False";
endif;
echo "<hr>";

// while & do while
$contador = 1;

while ($contador <=10):
    echo "contador (while) é $contador <br>";
    $contador++;
endwhile;
echo "<hr>";
$contador = 1;
do {
    echo "contador (do while) é $contador <br>";
    $contador++;
} while ($contador <= 10);

echo "<hr>";

// for & foreach
for ($contador = 0; $contador <= 10; $contador++):
    echo "O contador (for) é $contador <br>";
endfor;

echo "<hr>";

$cores = array("green", "red", "blue", "black");

foreach($cores as $indice => $valor):
    echo $indice." - ".$valor."<br>";
endforeach;

echo "<hr>";

// functions

function exibirNome($nome) {
    echo "Meu nome é $nome";
}
exibirNome("Nathaly Oliveira");

echo "<hr>";

function calcularMedia ($nome, $n1, $n2, $n3) {
    $media = ($n1+$n2+$n3)/3;
    if ($media >= 7):
        echo "$nome foi aprovada com média $media. <br>";
    else:
        echo "$nome foi reprovado com média $media. <br>";
    endif;
}
calcularMedia("Nathy", 10, 10, 10);
calcularMedia("Bob", 7, 8, 0);

echo "<hr>";

// variáveis SUPERGLOBAIS
$x = 10;
$y = 15;
function soma () {
    echo $GLOBALS['x'] + $GLOBALS['y'];
}
soma();
echo "<hr>";

?>

<!-- $_POST -->
<html>
    <body>
        <form action="forms/dados.php" method="POST">
            Nome(POST): <input type="text" name="nome"><br>
            Email(POST): <input type="email" name="email"><br>
            <button type="submit"> Enviar </button>
        </form>
    </body>
</html>

<!-- $_GET -->
<html>
    <body>
        <form action="forms/dados.php" method="GET">
            Nome (GET): <input type="text" name="nome"><br>
            Email(GET): <input type="email" name="email"><br>
            <button type="submit"> Enviar </button>
        </form>
    </body>
</html>

<?php

//validação e filtro de dados (aula 35 e 36)
//upload de arquivos (aula 37 e 38)

//Sessões
echo "<hr>";

session_start(); //para começar sessão

$_SESSION['cor'] = "verde";
$_SESSION['carro'] = "tesla";

echo $_SESSION['cor']."<br>".$_SESSION['carro']."<br>".session_id();
//para limpar a sessão session_unset();
//para destruir a sessão session_destroy();

echo "<hr>";

//CRIPTOGRAFIA

// base64 - tipo de criptografia de mão dupla (encode-decode)
$password = "123456";
$newPassword = base64_encode($password);
echo "Base64: ".$newPassword."<br>";
echo "Sua senha é: ".base64_decode($newPassword)."<br>";

// md5 & sha1 - tipo de criptografia de mão única (encode)
echo "Md5: ".md5($password)."<br>";
echo "Sha1: ".sha1($password)."<br>";
//essas não são tão seguras...

// password hash
$options = [
    'cost' => 10, //10 é o valor padrão, quanto mais vc aumentar mais a máquina vai gastar para gerar uma senha mais forte
];
$senhaSegura = password_hash($password, PASSWORD_DEFAULT, $options);
echo "Hash: ".$senhaSegura."<br>";
//autenticação hash seguro
$senha_db = '$2y$10$mzb6MFWqXWpuzmE0P1fPneJ26NBGkF4mc/XJZvKZz9w763ZUsez8y';
if(password_verify($password, $senha_db)):
    echo "senha válida";
else:
    echo "senha inválida";
endif;

// sql injection é um tipo de ataque que pode ser evitado fazendo a filtração de dados no input, segurança nunca é demais, se precisar reveja a aula. O mesmo para sxx.

//DATAS 
echo "<hr>";

echo date('d')."<br>"; // dia atual, dois digitos
echo date('D')."<br>"; // dia atual, formato textual
echo date('m')."<br>"; // mês atual, dois digitos
echo date('M')."<br>"; // mês atual, formato textual
echo date('y')."<br>"; // ano atual, dois digitos
echo date('Y')."<br>"; // ano atual, 4 digitos
echo date('l')."<br>"; // dia atual, formato textual completo
echo date('d/m/Y')."<br>";
echo date('d/m/Y H:i:s')."<br>";

date_default_timezone_set('America/Sao_Paulo'); //para ajeitar a hora
// para armazenar a data no data base
$date = date('Y-m-d');
echo $date."<br>";
$datetime = date('Y-m-d H:i:s');
echo $datetime."<br>";

$time = time();
echo date('d/m/Y', $time)."<br>"; 

//mktime
$data_pagamento = mktime(15, 30, 00, 02, 15, 2023);
echo date('d/m/y- h:i', $data_pagamento);
//strtotime - converter string para time
$data = '2019-04-10 13:30:00';
$data = strtotime($data);
echo date('d/m/Y', $data);






