<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        include "conexao.php";

        if (!$conn) {
            die("Erro na conexão: " . mysqli_connect_error());
        }

        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];
        $genero = $_POST['genero'];
        $editora = $_POST['editora'];

        $sql = "UPDATE livros SET titulo='$titulo', autor='$autor', ano='$ano', genero='$genero', editora='$editora' WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if($result){
            header('Location: index.php');
            exit();
        }else{
            echo "Erro ao atualizar dados do livro";
            die(mysqli_error($conn));
        }
    }elseif(isset($_GET['id'])){
        include "conexao.php";

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
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <div class="container">
        <?php if($row): ?>
            <h2>Atualizar Dados Livro</h2>
            <form method="POST" action="">

            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

            <div class="mb-3">
                <label class="form-label" for="titulo">Título:</label>
                <input class="form-control" type="text" name="titulo" maxlength="40" required value="<?php echo $row['titulo'] ?>"><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="titulo">Autor:</label>
                <input class="form-control" type="text" name="autor" maxlength="30" required value="<?php echo $row['autor'] ?>"><br>
            </div>

            <div class="mb-3">
                <label class="form-label" for="ano">Ano de Publicação:</label>
                <input class="form-control" type="number" name="ano" maxlength="4" required value="<?php echo $row['ano']?>"><br>
            </div>

            <div class="mb-3">
                <label class="form-label" for="genero">Gênero:</label>
                <input class="form-control" type="text" name="genero" maxlength="40" required value="<?php echo $row['genero']?>"><br>
            </div>


            <div class="mb-3">
                <label class="form-label" for="editora">Editora:</label>
                <input class="form-control" type="text" name="editora" maxlength="40" required value="<?php echo $row['editora'] ?>"><br>
            </div>

            <input class="btn btn-primary" type="submit" value="Atualizar Livro">
            <a class="btn btn-secondary" href="index.php">Voltar</a>
        </form>

        <?php else: ?>
            <p>Erro ao atualizar o livro</p>
        <?php endif; ?>
    </div>

</body>

</html>