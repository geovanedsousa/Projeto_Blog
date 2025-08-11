<?php 

/**
 * Classe Mensagem- responsável por exibir as mensagens do sistema
 * @author Geovane Sousa <geovanedesousa203@gmail.com>
 * @copyright Copyright (c) 2025, Geovane
 */
class Mensagem 
{
    private $texto;
    public $css;

    /**
     * Renderizar Mensagem
     * @param string $texto
     * @return string retorna o texto com filtro
     */
    public function renderizar(): string
    {   
        return $this -> texto = $this -> filtrar('<h1>mensagem de teste');
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