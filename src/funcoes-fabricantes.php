<?php
require_once "conecta.php";
//Ler os dados dps fabricantes
function lerFabricantes(PDO $conexao):array{
    try{
    $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";//string com o comando sql
    $consulta = $conexao->prepare($sql); //preparação do comando
    $consulta->execute(); //execução do comando 
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);//capturar os resultados
    }catch(Exception $erro){ 
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

//Inserir um fabricante

function inserirFabricante(PDO $conexao, string $nome){
    
}