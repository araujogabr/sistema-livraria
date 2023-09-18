<?php
    include "conexao.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM livros WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <div class="container">
        <?php if($row): ?>
           <h2>Detalhes do Livro</h2>
           <p><strong>ID:</strong><?php echo $row['id']?></p>
           <p><strong>Titulo:</strong><?php echo $row['titulo']?></p>
           <p><strong>Autor:</strong><?php echo $row['autor']?></p>
           <p><strong>Ano:</strong><?php echo $row['ano']?></p>
           <p><strong>Gênero:</strong><?php echo $row['genero']?></p>
           <p><strong>Editora:</strong><?php echo $row['editora']?></p>

           <a class="btn btn-secondary" href="index.php">Voltar</a>

        <?php else: ?>
            <p>Livro não encontrado</p>
            
        <?php endif; ?>
    </div>
</body>
</html>