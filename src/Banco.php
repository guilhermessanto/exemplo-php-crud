<?php
namespace CrudPoo;
abstract class Banco {
    /* Proppriedades ou atributos de acesso ao servidor de banco de dados*/
    private static string  $servidor = "localhost";
    private static string  $usuario = "root";
    private static string  $senha = "";
    private static string  $banco = "vendas";
    private static PDO $conexao;
}
