<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = '';
    $dbName = "cadastrousuarioturma33";

    $conexao = new mysqli("localhost", "root", "", "cadastrousuarioturma33" );

    if($conexao->connect_errno)
    {
        echo"falha ao conectar.".$mysqli->connect_errno;
    }
    else
    {
        echo "Conectado com sucesso.";
    }

    $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";

    $result = $conexao->query($sql);

    print_r($result);
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">id</th>
                 <th scope="col">Nome</th>
                 <th scope="col">Telefone</th>
                 <th scope="col">Email</th>
                 <th scope="col">Senha</th>
                 <th scope ="col">Editar/Excluir</th>
             </tr>
         </thead>
         <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['senha'] ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td>
                        <!-- Botão de Editar -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
                            <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
                            <button type="submit" name="editar">Editar</button>
                        </form>
                        <!-- Botão de Deletar -->
                        <a href="?deletar=<?= $usuario['id'] ?>">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
         </tbody>
     </table>
 </body>
 </html>

 <!-- <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$user_data['id_usuario']."</td>";
                    echo "<td>".$user_data['nome']."</td>";
                    echo "<td>".$user_data['telefone']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['senha']."</td>";
                    echo "<td>
                        <a class='btn btn-edit' href=edit.php?id=$user_data[id_usuario]'>
                        <i class='fa-regular fa-pen-to-square'></i>
                    </td>";
                    echo"</tr>";

                }
             ?> -->