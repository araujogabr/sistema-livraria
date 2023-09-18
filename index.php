<?php
include "conexao.php";

$sql = "SELECT * FROM livros";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Minha Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <div class="container">
    <h2>Minha Livraria</h2>
    <a href="create.php"><button class="btn btn-primary">Registrar novo Livro</button></a>
    <table class="table">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano de Publicação</th>
            <th>Gênero</th>
            <th>Editora</th>
            <th>Operações</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?> <!--Recupera cada linha do resultado como um array associativo-->
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['ano']; ?></td>
                <td><?php echo $row['genero']; ?></td>
                <td><?php echo $row['editora']; ?></td>
                <td>
                    <a href="read.php?id=<?php echo $row['id']; ?>"><button class="btn btn-secondary">Detalhes</button></a>
                    <a href="update.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning">Editar</button></a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Tem certeza que deseja excluir este registro?')"><button type="button" class="btn btn-danger">Excluir</button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>
</body>
</html>
