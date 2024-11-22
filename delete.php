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
if (isset($_POST['excluir']))
{
    $usuario->excluirUsuario($id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCLUIR USUÁRIO</title>
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
                <p>Deseja mesmo excluir esse usuário?</p>
                <button type="submit" name="excluir" >Excluir</button>
            </form>

            <?php

        if(isset($_POST['excluir']))
        {
            ?>
                <!-- bloco de HTML -->
                <div class="msg-sucesso">
                    <p>Usuário excluído com sucesso</p>
                    <p>Clique <a href="arearestrita.php">aqui</a>para voltar.</p>
                </div>
            <?php
        }
            ?>           
        </div>
    </section>
</body>
</html>