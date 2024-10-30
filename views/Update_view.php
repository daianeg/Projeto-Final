<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
</head>
<body>

<h1>Atualizar Livro</h1>
<form action="/meu_projeto_livraria/update-book" method="POST">
    <input type="hidden" name="id" value="<?php echo $bookInfo['id']; ?>">

    <label for="title">Título:</label>
    <input type="text" id="title" name="title" value="<?php echo $bookInfo['title']; ?>" required><br><br>

    <label for="author">Autor:</label>
    <input type="text" id="author" name="author" value="<?php echo $bookInfo['author']; ?>" required><br><br>

    <label for="publication_year">Ano de Publicação:</label>
    <input type="number" id="publication_year" name="publication_year" value="<?php echo $bookInfo['publication_year']; ?>" required><br><br>

    <label for="genre">Gênero:</label>
    <input type="text" id="genre" name="genre" value="<?php echo $bookInfo['genre']; ?>"><br><br>

    <label for="price">Preço (R$):</label>
    <input type="number" step="0.01" id="price" name="price" value="<?php echo $bookInfo['price']; ?>" required><br><br>

    <input type="submit" value="Atualizar Livro">
</form>

<a href="/meu_projeto_livraria/list-books">Voltar para a lista</a>

</body>
</html>
