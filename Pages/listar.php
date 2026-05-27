<?php
    require "../Classes/usuario.php";
    $usuario = new Usuario();
    $usuario->conectar("crud544", "localhost", "root", "");

    $dados = $usuario->ListarDados();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
</head>
<body>
    <h2 class="titulo-pagina">Listar Usuarios</h2>

    <a href="cadastro.php"><button>CADASTRAR</button></a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID USUARIO</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
            </tr>
        </thead>
        <?php
            foreach($dados as $pessoas)
            {

        ?>
        <tbody>
            <tr>
                <td>
                    <!-- Informações sobre o ID do usuário. -->
                     <?php echo $pessoas['id_usuario']?>
                </td>
                <td>
                    <!-- Informações sobre o NOME do usuário. -->
                    <?php echo $pessoas['nome']?>
                </td>
                <td>
                    <!-- Informações sobre o EMAIL do usuário. -->
                    <?php echo $pessoas['email']?>
                </td>
                <td>
                    <!-- Informações sobre o TELEFONE do usuário. -->
                    <?php echo $pessoas['telefone']?>
                </td>
                <td>
                    <a href="editar.php?id_usuario=<?php echo $pessoas['id_usuario']; ?>">EDITAR</a>
                    <a href="excluir.php?id_usuario=<?php echo $pessoas['id_usuario']; ?>">EXCLUIR</a>
                </td>
            </tr>

        </tbody>
        <?php
            }
        ?>
    </table>
    
</body>
</html>