<?php
if (isset($_GET['id'])) {
    include "conexao.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM livros WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir o livro.";
        echo '<a href="index.php" class="btn btn-secondary">Voltar</a>';
    }
}
?>