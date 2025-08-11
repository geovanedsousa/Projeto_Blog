<?php 

/**
 * Classe Mensagem- responsável por exibir as mensagens do sistema
 * @author Geovane Sousa <geovanedesousa203@gmail.com>
 * @copyright Copyright (c) 2025, Geovane
 */
class Mensagem 
{
    private $texto;
    private $css;

    public function sucesso(string $mensagem): Mensagem
    {
        $this -> css = 'alert alert-success';
        $this -> texto = $this -> filtrar($mensagem);
        return $this;
    }

    public function erro(string $mensagem): Mensagem
    {
        $this -> css = 'alert alert-danger';
        $this -> texto = $this -> filtrar($mensagem);
        return $this;
    }

    /**
     * Renderizar Mensagem
     * @param string $texto
     * @return string retorna o texto com filtro
     */
    public function renderizar(): string
    {   
        return "<div class= '{$this-> css}'>{$this -> texto}</div>";
    }
    /**
     * Filtro de mensagem
     * @param string $mesagem
     * @return string 
     */
    private function filtrar(string $mensagem): string
    {
        //filtro privado para que a mensagem não seja modificada com scripts
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}



?>