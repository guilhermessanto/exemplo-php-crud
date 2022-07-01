<?php
namespace utilitario;
final class Utilitarios {

    private float $valor;
    

    public function formataMoeda():string{
        return "R$: ". number_format($this->valor,2, ',','.');   
    }

  
// Funções utilitárias
/* function dump($dados){
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";
} */

    public function getValor(): float
    {
        return $this->valor;
    }
  
    public function setValor(float $valor)
    {
        $this->valor = $valor;
    }
}