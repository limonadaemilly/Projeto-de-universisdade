<?php
$nome = $_GET['nome'];
$matricula = $_GET['matricula'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Matrícula</title>

<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(2, 0, 36), rgb(9, 121, 121), rgb(0, 212, 255));
   
}

.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgb(91, 153, 214);
    padding: 30px;
    border-radius: 20px;
    color: white;
    width: 350px;
    text-align: center;
    border: 3px solid rgba(14, 62, 110, 0.979);
}

.container h2{
    margin-bottom: 20px;
}

.matricula{
    background-color: rgb(52, 240, 253);
    color: black;
    padding: 15px;
    border-radius: 10px;
    font-size: 22px;
    font-weight: bold;
    margin: 20px 0;
}

.mensagem{
    font-size: 14px;
    margin-top: 10px;
}

.botao{
    margin-top: 20px;
    background-color: rgb(43,189,140);
    border: none;
    padding: 12px 25px;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    cursor: pointer;
}

.botao:hover{
    background-color: rgb(0, 99, 66);
}
</style>

</head>
<body>

<div class="container">
    <h2>Olá, <?php echo htmlspecialchars($nome); ?>!</h2>

    <div class="matricula">
        <?php echo htmlspecialchars($matricula); ?>
    </div>

    <div class="mensagem">
        Essa é sua matrícula.<br>
        Ela é obrigatoriamente usada para entrada no portal.<br>
        Caso esqueça, entre em contato com o suporte.
    </div>

    <button class="botao" onclick="window.location.href='login.php'">
        Voltar a tela de login
    </button>
</div>

</body>
</html>