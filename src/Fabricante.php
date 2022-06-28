<?php
namespace CrudPoo;
use PDO,Exception;
final class Fabricante{
    private int $id;
    private string $nome;
    /* Esta propriedades receberá os recursos PDO através da classe Banco (dependência do projeto) */
    private PDO $conexao; 

    public function __construct()
    {
        /* No momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o banco. */
        $this->conexao = Banco::conecta();    
    }
    /* LER FABRICANTE */
    public function lerFabricantes():array{
        $sql = "SELECT id, nome FROM fabricantes ORDER BY nome";//string com o comando sql
        try{
        $consulta = $this->conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $erro){ 
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }
    
    /* INSERIR FABRICANTE */
    public function inserirFabricante():void{
        $sql = "INSERT INTO fabricantes(nome)  VALUES (:nome)";
        try {
            $consulta = $this->conexao ->prepare($sql);
            $consulta->bindParam(':nome',$this->nome,PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }

    /* LER UM FABRICANTE */
    public function lerUmFabricante():array{
        $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
        return $resultado;
    }
    /* Atualizar Fabricante */
    public function atualizarFabricante():void{
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':id',$this->id, PDO::PARAM_INT );
            $consulta->bindParam(':nome',$this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }
    }
    /* Excluir Fabricante */
    
    public function excluirFabricante():void{
        $sql = "DELETE FROM fabricantes WHERE id = :id";
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta -> bindParam(':id',$this->id,PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }

    }






   public function getId(): int
   {
      return $this->id;
   }

   public function setId(int $id)
   {
      $this->id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
   }

   public function getNome(): string
   {
      return $this->nome;
   }

   public function setNome(string $nome)
   {
      $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
   }
}