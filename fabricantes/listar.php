<?php

use CrudPoo\Fabricante;

require_once "../vendor/autoload.php";

$fabricante = new Fabricante;
$listaDeFabricantes = $fabricante->lerFabricantes();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista </title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT</h1> 
        <a href="../index.php">HOME</a>
        <hr>
        <h2>Lendo e carregando todos os fabricantes</h2>
        <p>
            <a href="inserir.php">Inserir um novo fabriante</a>
             |
            <?php 
            /* Verificando se o parâmetro existe */
            if(isset($_GET['exportarPDF'])){
                /* echo "EXPORTAR..."; teste */
                //inicializar uma sessão PHP
                session_start();
                //Criando uma variável de sessão
                $_SESSION["dados"] = $listaDeFabricantes;

                //Redirecionamento para o script de expotação
                header("location:../exportar-pdf.php");
            }
            
            ?>
            <!-- flag/sinalizador com parâmetro exportarPDF -->
            <a href="?exportarPDF">Exportar para PDF</a>
        </p>

    <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso'){?>
        <p>Fabricantes atualizado com sucesso!</p>
    <?php }?>

         <table>
             <caption>Lista de Fabricantes</caption>
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Nome</th>
                     <th colspan="2">Operações</th>
                 </tr>
             </thead>
             <tbody>
<?php foreach($listaDeFabricantes as $fabricante){?>
    <tr>
    <td><?=$fabricante['id']?></td>    
    <td><?=$fabricante['nome']?></td>  
    <td><a href="atualizar.php?id=<?=$fabricante['id']?>" style="color:blue;">Atualizar</a></td>
    <td><a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>" style="color:red;">Excluir</a></td>
    <!-- onclic direto no html -->
    <!-- <td><a onclick="return confirm('Deseja realmente excluir?')" class="exclusao" href="excluir.php?id=" style="color:red;">Excluir</a></td> -->
    </tr>  
<?php }?>

</tbody>
</table>
</div>
<script src="../src/excluir.js"></script>
</body>
</html>