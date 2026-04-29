<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("config.php"); 

    $matricula = $_POST['matricula'];
    $cpf = $_POST['cpf']; 
    $sql = "SELECT * FROM alunos WHERE matricula = ? AND cpf = ? LIMIT 1";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $matricula, $cpf);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        
        $dados_aluno = $resultado->fetch_assoc();
        
        
        $_SESSION['aluno_id'] = $dados_aluno['id']; 
        $_SESSION['aluno_nome'] = $dados_aluno['nome'];
        
        
        header("Location: acesso.html"); 
        exit();
    } else {
        
        $erro = "Matrícula ou CPF incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/originalstyle.css">

    <title>Portal do aluno</title>
    <style>
        .cabeçalho {
            display: flex; 
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 35px;
         }
         .campos   {
            position: relative;
            top: 5px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            outline: 0;    
            margin: auto;
           
   
   }
          body{
            background-image: url(img/81f4f117dd6efd86d49fc3bc2d0371256d7393bd.jpg);
            background-position: center 90px;
            background-repeat: no-repeat;
            background-size:1400px 500px;
            background-attachment: fixed;
    }
          .campos input{
                
                width: 220px;
                height: 2px;
                padding: 20px;
                font-size:15px;
                border-radius: 10px;
                background-color: transparent;
                top: 80px;
                position: relative;                
                color:white;
                border:none;
                 border-bottom: 1px solid white;
                     
    }
         .campos button{ 

                width: 265px;
                border-radius: 10px;
                height: 35px;
                background-color:rgb(43,189,140);
                color: white;
                border:3px solid rgb(43,189,140);
                font-size: 15px;
                position: relative;
                top: 80px;
                

                }
                button:hover{
                    background-color:  rgb(0, 99, 66);
                    cursor:pointer;
                    
                    border: rgb(231, 106, 106);

                }
   
                h1{
                font-size: 55px;
                color:silver ; 
                font-family: Arial, Helvetica, sans-serif;
                position: relative;
                top: 30px;
                left:1px;
    }

                h2 {
                    color: silver;
                    left: 1px;
                    position: relative;
                    top: 70px;
                    font-size: 17px;


    }
                
                   .cadastro{
                        
                        position: relative; 
                        color:red;
                        top:80px;
                        left:80px;
                        cursor: pointer;

                    }
                    .cadastro:hover{
                        color: rgb(177, 9, 9);
                      

                    }
               
                
                
    </style> 
</head>
<body>
 <div class="cabeçalho">
    <div>UNIDEV</div>
    <div>PORTAL DO ALUNO</div>
 </div>
 <h1>LOGIN</h1>
 <h2>Olá, informe seus dados abaixo e faça seu login.</h2>
      <form class="campos" method="post" >
          
                      
          <input type="text" name="matricula" placeholder="MATRICULA" required>
          <label for="matricula" ></label>
         
          <input type="text" name="cpf" placeholder="CPF" required>  
          <label for="cpf" ></label>
         
         
          <button  type="submit">ENTRAR</button><br><br>

          <a href="cadastro.php" class="cadastro">CADASTRE-SE</a>

            </form> 
            

          
      
        
     
       
      </div>
    </div>
        </form>

</body>
</html>