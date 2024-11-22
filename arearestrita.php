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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Listar Dados</title>
</head>
<body>
    <h1>Listar Usuário</h1>
    <table>
        <thead>
            <tr><th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>EDITAR</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($dados))
                {
                    foreach($dados as $pessoa):
            ?>
                <tr>
                        <td><?php echo $pessoa['id_usuario'];?></td>
                        <td><?php echo $pessoa['nome'];?></td>
                        <td><?php echo $pessoa['email'];?></td>
                        <td><?php echo $pessoa['telefone'];?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $pessoa['id_usuario']; ?>">Editar</a> 
                            <a href="delete.php?id=<?php echo $pessoa['id_usuario']; ?>">Excluir</a>
                        </td>         
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