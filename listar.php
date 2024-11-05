<?php
    // $dbHost = "localhost";
    // $dbUsername = "root";
    // $dbPassword = '';
    // $dbName = "cadastrousuarioturma33";

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

    // print_r($result);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            </tr>
        </thead>
        <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$user_data['id_usuario']."</td>";
                    echo "<td>".$user_data['nome']."</td>";
                    echo "<td>".$user_data['telefone']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['senha']."</td>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>