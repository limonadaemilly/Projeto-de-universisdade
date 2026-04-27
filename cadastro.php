<?php
if(isset($_POST['submit'])) {

    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];            
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
   
    do {
    $matricula = rand(100000, 999999);

    $check = $conexao->prepare("SELECT id FROM alunos WHERE matricula = ?");
    $check->bind_param("s", $matricula);
    $check->execute();
    $check->store_result();

} while($check->num_rows > 0);

    $sql = "INSERT INTO alunos (nome, cpf, sexo, nascimento, matricula) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação: " . $conexao->error);
    }

    $stmt->bind_param("sssss", $nome, $cpf, $sexo, $nascimento, $matricula);

    if($stmt->execute()) {
        header("Location: acessocad.php?nome=" . urlencode($nome) . "&matricula=" . $matricula);
        exit();
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Cadastro de alunos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif ;
            background-image: linear-gradient( to right, rgb(2, 0, 36), rgb(9, 121, 121), rgb(0, 212, 255))
          ;
        }
        .form{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgb(91, 153, 214);
            border-radius: 17px;
            padding: 10px;
    
        }
        fieldset{
            border: 3px solid rgba(14, 62, 110, 0.979);

        }
        legend{
            border: 1px solid rgba(14, 62, 110, 0.979);
            text-align: center;
            background-color: rgb(52, 240, 253);
            padding: 10px;
            border-radius: 10px;
            color: black;       
         }
         .inputform{
            position: relative;
            top:25px;
         }
         .inputuser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            font-size: 15px;
            padding-top: 15px;
            width:100%;
           
         }
          .labelinput{

                 position: absolute; 
                 top:0px;
                 left:0px;  
                 pointer-events:none;   
                 transition:.5s;

            }
            .inputuser:focus ~ .labelinput, .inputuser:valid ~ .labelinput{
                top: -20px;
                font-size: 12px;
                color:black;
                }
           #nascimento{
                    border-radius: 15px;
                    padding: 8px;
                    outline: none;
                    font-size: 15px;
                    border: none;
                }
        button{
            background-color: rgb(43,189,140);
            border:none;
            padding: 15px;
            cursor: pointer;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif ;
            font-size: 15px;
            color: white;
            font-weight: bold;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            margin:0 auto;
            padding-left: 50px;
            padding-right: 50px;
            border: 1px solid rgba(14, 62, 110, 0.979);

        }
        button:hover{
            background-color:  rgb(0, 99, 66);
            cursor:pointer;
            border: 1px solid rgba(14, 62, 110, 0.979);
          
            
           

        }

    </style>
</head>
<body>
    <div class="form">
        <form action="cadastro.php" method="post">
            <fieldset>
                <legend><B>CADASTRE-SE</B></legend>
                <div class="inputform">
                    <input type="text" name="nome" id="nome" class="inputuser" required>
                    <label for="nome" class="labelinput">NOME SOCIAL<label>
                    
                </div>
                <br><br>

                <div class="mensagem">
                <?php
                
                
                
                ?>      
                </div>

                <div class="inputform">
                    <input type="text" name="cpf" id="cpf" class="inputuser" required>
                    <label for="cpf" class="labelinput">CPF </label>
                    
                </div>
                <br><br>
                <P>Sexo:</P>
                <input type="radio" id="feminino" name="sexo" value="feminino" required>
                <label for="feminino">FEMININO</label>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">MASCULINO</label>
                <input type="radio" id="outro" name="sexo" value="outro" required>
                <label for="Outro">OUTRO</label>
                <br><br>

                  <div class="inputform">
                    <label for="nascimento"><b>DATA DE NASCIMENTO</b> </label>
                    <input type="date" name="nascimento" id="nascimento"  required>
                </div>

                <br><br>


              <button type="submit" name="submit" id="submit">CADASTRAR</button>

                  






            </fieldset>
        </form>
    
</body>
</html>
