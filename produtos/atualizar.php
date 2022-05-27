<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";
$listaDefabricantes = lerFabricantes ($conexao);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$produto = lerUmProduto($conexao, $id);
dump($produto);



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT | UPDATE</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome" >Nome:</label>
                <input type="text" name="nome" id="nome" required value="<?=$produto['nome']?>">
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" max="10000" step="0.01" required value="<?=$produto['preco']?>">
            </p>
            <p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" max="100" required value="<?=$produto['quantidade']?>">
            </p>
            <p>
            <label for="fabricante_id">Fabricante:</label>
            <select name="fabricante_id" id="fabricante_id" required > 
                <option value=""></option>
              <?php 
              foreach($listaDefabricantes as $fabricante){?>  
                <option value="<?= $fabricante['id']?>">
                    <?= $fabricante['nome']?>
                </option>
                <?php }?>
            </select>
            </p>
            <p>
            <label for="descricao">Descrição:</label><br>
            <textarea required name="descricao" id="descricao" cols="30" rows="3s" ><?=$produto['descricao']?></textarea>
            </p>
            <p>
                <button type="submit" name="atualizar">Atualizar produtos</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de produtos</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>