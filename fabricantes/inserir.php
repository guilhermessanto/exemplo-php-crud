<?php
use CrudPoo\Fabricante;
require_once "../vendor/autoload.php";

    if(isset($_POST['inserir'])){
        $fabricante = new Fabricante;
        $fabricante->setNome($_POST['nome']);
        $fabricante->inserirFabricante();

    header("location:listar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </p>
            <p>
                <button type="submit" name="inserir">Inserir fabricante</button>
            </p>
        </form>
    </div>
    <p><a href="listar.php">Voltar para lista de fabricantes</a></p>
    <p><a href="../index.php">home</a></p>     
</body>
</html>