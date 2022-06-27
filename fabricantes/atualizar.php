<?php

use CrudPoo\Fabricante;
require_once '../vendor/autoload.php';
$fabricate = new Fabricante;

$fabricate->getId(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
/* $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT); */
$fabricante ->lerUmFabricante();
if(isset($_POST['atualizar'])){
    $fabricante->setNome($_POST['nome']);
    $fabricante->atualizarFabricante();
    
    header("location:listar.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="<?=$fabricante['id']?>">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?=$fabricante['nome']?>">
            </p>
            <p>
                <button type="submit" name="atualizar">Atualizar fabricante</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de fabricantes</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>