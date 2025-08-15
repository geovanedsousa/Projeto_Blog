<?php 

class Helpers
{

/**
 * Validador de CPF
 * @param string $cpf vai receber um valor qualquer
 * @return bool vai retorna se o $cpf é valido ou não 
 */
public static function validarCfp(string $cpf): bool
{   
    //chama a função limparNumero para tirar os caracteres regulares
    $cpf = self::limparNumero($cpf);
    //uma forma simples de validar um CPF
    if (mb_strlen($cpf) != 11 or preg_match('/(\d)\1{10}/',$cpf)){
        return false;
    }
    for ($t = 9; $t <11; $t++){
    for ($d = 0, $c = 0; $c < $t; $c++){
        $d += $cpf[$c] * (($t + 1) - $c);
    }
    $d = ((10 * $d) % 11) % 10;
    if ($cpf[$c] != $d){
        return false;
        }
    }

    return true;
}

/**
 * Limpar Numero
 * @param string $numero só recebe numeros com 9 digitos
 * @return string retorna o numero sem caracates 
 */
public static function limparNumero(string $numero): string
{   
    //vai procurar os caracteres regulares no $numero e trocalos por nada
    return preg_replace('/[^0-9]/', '', $numero);
}

/**
 * URL amigavel 
 * @param string $titulo 
 * @return string
 */
function slug(string $titulo): string
{ 
    // ARRAYS que vai guardar caracteres especiais 
    $mapa['a'] = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÕÖØÙÚÛÜÜÝÞBÀ àáâãäåæçèéêëìíîïðñòóõõöøùúûüüýþbà @#$%&*()_-+={[}]/?!'¨|;:.,\\\<>°ºª  ";
    // ARRAYS que vai guardar a substituição dos caractes de cima 
    $mapa['b'] = "aaaaaaaeceeeeiiiidnoooooouuuuytba aaaaaaaeceeeeiiiidnoooooouuuuytba                                     ";
    
    //Aqui vai substituir os caractes especiais do slug 
    $slug = strtr(mb_convert_encoding($titulo, 'ISO-8859-1', 'UTF-8'), mb_convert_encoding($mapa['a'], 'ISO-8859-1', 'UTF-8'), $mapa['b']);
    $slug = strip_tags(trim($slug));
    $slug = str_replace(' ', '-', $slug);
    $slug = str_replace(['-----', '----', '---', '--', '-'], '-', $slug);
    
    // E retorna o slug formatado 
    return strtolower(mb_convert_encoding($slug, 'ISO-8859-1', 'UTF-8'));
}

/**
 * Data formatada usando ARRAYS
 * @param string vai receber as datas
 * @return string retorna dinamicamente as datas fomatas
 */
function dataAtual() : string
{
    $diaMes = date('d');
    $diaSemana = date('w');
    $mes = date('n') -1;
    $ano = date('Y');

    $nomeDiasDaSemana = ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'];

    $nomeDosMeses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    $dataFormatada = $nomeDiasDaSemana[$diaSemana].', '.$diaMes.' de '.$nomeDosMeses[$mes].' de '.$ano;
    
    return $dataFormatada;

}

/**
 * Monto a url de acordo com o ambiente 
 * @param string $url parte da url ex. admin
 * @return string url compelta
 */
function url(string $url) : string
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
    $ambiente = $servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO;

    return $ambiente . $url;
}

/**
 * Identificar o nome do servidor
 * @param string 
 * @return bool vai retornar se o nome do servidor é 'localhost' 
 */
function localhost() : bool
{
    $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

    if ($servidor == 'localhost'){
        return true;
    }
    return false;
}

/**
 * Validar uma URL
 * @param string $url 
 * @return bool retorna se a url é true ou false
 */
function validarUrl(string $url) : bool
{
    if (mb_strlen($url < 10)){
        return false;
    }
    if (!str_contains($url, '.')){
        return false;
    }
    if (str_contains($url, 'http://') or str_contains($url, 'https://')){
        return true;
    }

    return false;
}
function validarUrlComFiltro(string $url) : bool
{
    return filter_var($url, FILTER_VALIDATE_URL);
}


/**
 * Validar Email
 * @param string $email
 * @return bool retorna se a email é true ou false
 */
function validarEmail(string $email) : bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Contador o tempo decorrido de uma data
 * @param string @data opcional-recebe uma data qualquer
 * @return string  retorna o tempo decorrido dessa data 
 */
function contarTempo(string $data) : string
{
    $agora = strtotime(date('Y-m-d H:i:s'));
    $tempo = strtotime($data);
    $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);

    if ($segundos <= 60){
        return 'Agora';

    } elseif ($minutos <= 60){
        return $minutos == 1 ? 'Há 1 minuto' : 'Há ' . $minutos . ' minutos';

    } elseif ($horas <= 24){
        return $horas == 1 ? 'Há 1 hora' : 'Há ' . $horas . ' horas';

    } elseif ($dias <= 7){
        return $dias == 1 ? 'Há 1 dia' : 'Há ' . $dias . ' dias';

    } elseif ($semanas <= 4){
        return $semanas == 1 ? 'Há 1 semana' : 'Há ' . $semanas . ' semanas';

    } elseif ($meses <= 12){
        return $meses == 1 ? 'Há 1 mês' : 'Há ' . $meses . ' meses';

    } else {
        return $anos == 1 ? 'Há 1 ano' : 'Há ' . $anos . ' anos';
    }

    
}

/**
 * Formatar Valor com ponto e virgula 
 * @param float $valor vai receber um valor null
 * @return string vai retornar um valor formatado
 */
function formatarValor(float $valor = null) : string
{
    return number_format(($valor ? $valor : 1), 2, ',','.');
}

/**
 * Formatar um número com ponto
 * @param int $numero
 * @return string 
 */
function formatarNumero(int $numero = null) : string
{
    return number_format(($numero ? $numero : 1), 0, '.','.');
}
/**
 * Saudação de acordo com o horário 
 * @return string $saudação 
 * @return string 
 */
function saudacao() : string
{
    $hora = date('H');

/*
    if ($hora >= 0 AND $hora <= 5){
        $saudacao = "boa madrugada";
    } elseif ($hora >= 6 && $hora <= 12){
        $saudacao = "bom dia";
    } elseif ($hora >= 13 && $hora <= 18){
        $saudacao = "boa tarde";
    } else {
        $saudacao = "boa noite";
    }

    switch($hora){
        case $hora >= 0 AND $hora <= 5:
            $saudacao = "boa madrugada";
            break;
        case $hora >= 6 && $hora <= 12:
            $saudacao = "bom dia";
            break;
        case $hora >= 13 && $hora <= 18:
            $saudacao = "boa tarde";
            break;
        default:
            $saudacao = "boa noite";

    }
*/

    $saudacao = match(true){
        $hora >= 0 && $hora <= 5 => 'boa madrugada',
        $hora >= 6 && $hora <= 12 => 'bom dia',
        $hora >= 13 && $hora <= 18 => 'boa tarde',
        default => 'boa noite'
    };

    return $saudacao;
}

/**
 * Resumir texto 
 * 
 * @param string $texto texto para ser resumido
 * @param int $limite o limite de caracteres do texto 
 * @param string $continue opcional - o que vai ser exibido no final do texto 
 */
function resumirTexto(string $texto, int $limite, string $continue = "...") : string
{
    
    $textoLimpo = trim(strip_tags($texto));
    if (mb_strlen($textoLimpo) <= $limite){
        return $textoLimpo;
    }
    //localizar o ultimo espaço antes de $limite e cortar o $textoLimpo
    $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ""));

    return $resumirTexto.$continue;
}

}

?>