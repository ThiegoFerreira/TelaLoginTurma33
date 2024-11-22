<?php
require_once 'usuario.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $usuario = new Usuario();
    $usuario->conectar("cadastrousuarioturma33", "localhost", "root", "");
    $dados = $usuario->getUsuario($id);
    
}
else
{
    echo "Sem registro";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Document</title>
</head>
<body>
    <section>
    <a href="arearestrita.php">VOLTAR</a>
        <div class="area-gggg">
            <form action="" method="post">
                <label>Nome:</label><br>
                <input type="text" name="nome" id="" placeholder="Nome Completo."value = "<?php echo $dados['nome'];?>"><br>
                <label>Email:</label><br>
                <input type="email" name="email" id="" placeholder="Digite o Email."value = "<?php echo $dados['email'];?>"><br>
                <label>Telefone:</label><br>
                <input type="tel" name="telefone" id="" placeholder="Telefone Completo." value = "<?php echo $dados['telefone'];?>"><br>
            
                <input type="submit" value="CADASTRAR">
            </form>

            <?php

        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];

            if(!empty($nome) && !empty($email) && !empty($telefone))
            {
                $usuario->conectar("cadastrousuarioturma33","localhost","root","");
                if($usuario->msgErro == "")
                {
                    if($usuario->editarUsuario($id,$nome,$email,$telefone))
                    {
                        ?>
                            <!-- bloco de HTML -->
                            <div class="msg-sucesso">
                                <p>Dados atualizado com sucesso!</p>
                                <p>Clique <a href="arearestrita.php">aqui</a>para voltar.</p>
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
            
        </div>
    </section>
    
</body>
</html>