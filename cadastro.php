<?php
    require_once 'usuario.php';
    $usuario = new Usuario();

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

        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confSenha = addslashes($_POST['confSenha']);

            if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confSenha))
            {
                $usuario->conectar("cadastrousuarioturma33","localhost","root","");
                if($usuario->msgErro == "")
                {
                    if($senha == $confSenha)
                    {
                        if($usuario->cadastrar($nome, $telefone, $email, $senha))
                        {
                            ?>

                                <!-- bloco de HTML -->
                                <div class="msg-sucesso">
                                    <p>Cadastrado com Sucesso</p>
                                    <p>Clique <a href="login.php">aqui</a>para logar.</p>
                                </div>

                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="msg_erro">
                                <p>Email já cadastrado.</p>
                            </div>
                        <?php 
                        }
                    }
                    else
                    {
                        ?>
                            <div class="msg_erro">
                                <p>Senhas não conferem.</p>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$usuario->msgErro?>
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="msg-erro">
                        <p>Preencha todos os campos.</p>
                    </div>
                <?php
            }
        
        }
    ?>

</body>
</html>