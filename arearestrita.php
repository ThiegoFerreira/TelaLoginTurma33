<?php
require_once 'usuario.php';
$usuario = new Usuario();
$usuario->conectar("cadastrousuarioturma33","localhost","root","");
$dados = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Dados</title>
</head>
<body>
    <h1>Listar Usuário</h1>
    <table>
        <thead>
            <tr>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($dados))
                {
                    foreach($dados as $pessoa):
            ?>
                <tr>
                    <td><?php echo $pessoa['nome'];?></td>
                    <td><?php echo $pessoa['email'];?></td>
                    <td><?php echo $pessoa['telefone'];?></td>
                </tr>
            <?php endforeach;
                }
                else
                {
                    echo "Nenhum usuário cadastrado.";
                }
            ?>

        </tbody>
    </table>
    

</body>
</html>