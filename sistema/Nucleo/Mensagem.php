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

    /**
     * Método mágico 
     * @param __toString
     */
    public function __toString()
    {
        //método usado para simplificar a renderização da classe Mensagem
        return $this-> renderizar();
    }

    /**
     * Função responsável pela mensagem de Sucesso
     * @param string $mensagem
     * @return Mensagem
     */
    public function sucesso(string $mensagem): Mensagem
    {
        //$this vai acessar css e receber o texto e comando do 
        $this -> css = 'alert alert-success';
        //$this pseudo variavel vai acessar texto q vai receber outro $this para acessar filtrar
        $this -> texto = $this -> filtrar($mensagem);
        return $this;
    }

    /**
     * Função responsável pela mensagem de Erro
     * @param string $mensagem
     * @return Mensagem
     */
    public function erro(string $mensagem): Mensagem
    {
        $this -> css = 'alert alert-danger';
        $this -> texto = $this -> filtrar($mensagem);
        return $this;
    }

    /**
     * Função responsável pela mensagem de Alerta
     * @param string $mensagem
     * @return Mensagem
     */
    public function alerta(string $mensagem): Mensagem
    {
        $this -> css = 'alert alert-warning';
        $this -> texto = $this -> filtrar($mensagem);
        return $this;
    }

    /**
     * Função responsável pela mensagem de Informação
     * @param string $mensagem
     * @return Mensagem
     */
    public function informa(string $mensagem): Mensagem
    {
        $this -> css = 'alert alert-primary';
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