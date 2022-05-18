<?php
require_once "conecta.php";
//Ler os dados dps fabricantes
function lerFabricantes(PDO $conexao):array{
    $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";//string com o comando sql
    try{
    $consulta = $conexao->prepare($sql); //preparação do comando
    $consulta->execute(); //execução do comando 
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);//capturar os resultados
    }catch(Exception $erro){ 
        die("Erro: ".$erro->getMessage());
    }
    return $resultado;
}

//Inserir um fabricante

function inserirFabricante(PDO $conexao, string $nome):void{
    // :qualquer_coisa named parameters
    $sql = "INSERT INTO fabricantes(nome)  VALUES (:nome)";
    try {
        $consulta = $conexao ->prepare($sql);
        // bindParam('nome do parametro',$variavel_com_valor, constante de verificação)
        $consulta->bindParam(':nome',$nome,PDO::PARAM_STR);
        $consulta ->execute();
    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}