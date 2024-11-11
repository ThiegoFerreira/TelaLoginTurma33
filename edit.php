<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
    $usuario->conectar("cadastrousuarioturma33", "localhost","root","");
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro</title>
    
</head>
<body>
    <h2>CADASTRO DO USUÁRIO</h2><br>
    <form action="" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" id="" placeholder="Nome Completo."><br>
        <label>Email:</label><br>
        <input type="email" name="email" id="" placeholder="Digite o Email."><br>
        <label>Telefone:</label><br>
        <input type="tel" name="telefone" id="" placeholder="Telefone Completo."><br>
        <label>Senha:</label><br>
        <input type="password" name="senha" id="" placeholder="Digite sua senha."><br>
        <label>Confirmar Senha:</label><br>
        <input type="password" name="confSenha" id="" placeholder="Confirme sua Senha"><br><br>

        <input type="submit" value="CADASTRAR">
    </form>    

    <?php

        if(!empty($_GET['id_usuario']))
        {
            $usuario->conectar("cadastrousuarioturma33","localhost","root","");
            
            $id = $_GET['id_usuario'];

            $sqlSelect = "SELECT * FROM usuario WHERE id_usuario = $id;";

            $result = $conectar->query($sqlSelect);

            print_r($result);

            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confSenha = addslashes($_POST['confSenha']);

            
        
        }
    ?>

</body>
</html>