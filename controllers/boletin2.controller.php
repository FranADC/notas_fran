<?php
define('SEGUNDOS_DIA', 24 * 3600);
define('SEGUNDOS_HORA', 3600);
define('SEGUNDOS_MINUTO', 60);

/*
 * Ejercicio 01
 */
$data['ej01_div_titulo'] = "Ejercicio 01";
$ej01_numero = 12;
$ej01_divisor = 3;
$ej01_resultado = $ej01_numero % $ej01_divisor == 0 ? "" : " no";
$data['ej01_textoresultado'] = "<p>El número $ej01_numero $ej01_resultado es divisible por $ej01_divisor.</p>";

/*
 * Ejercicio02
 */
$data['ej02_div_titulo'] = "Ejercicio 02";
$numero1 = -16;
$numero2 = -18;
$numero3 = -20;

$mayor = cualMayor($numero1, $numero2, $numero3);

$data['ej02_textoresultado'] = str_replace(" ".$mayor, "<strong> $mayor</strong>", "El mayor es $numero1, $numero2, $numero3");

/*
 * Ejercicio 3
 */
$data['ej03_div_titulo'] = "Ejercicio 03";
$totalSegundos = 264265;
$stringFinal = "$totalSegundos equivalen a:";
if($totalSegundos >= SEGUNDOS_DIA){
    $dias = intval($totalSegundos / SEGUNDOS_DIA);
    $stringFinal .= " $dias días";
}
$segundosRestantes = $totalSegundos % SEGUNDOS_DIA;
if($segundosRestantes >= SEGUNDOS_HORA){
    $horas = intval($segundosRestantes / SEGUNDOS_HORA);
    $stringFinal .= " $horas horas";
}
$segundosRestantes = $totalSegundos % SEGUNDOS_HORA;
if($segundosRestantes >= SEGUNDOS_HORA){
    $minutos = intval($segundosRestantes / SEGUNDOS_MINUTO);
    $stringFinal .= " $minutos minutos";
}
$segundosRestantes = $totalSegundos % SEGUNDOS_MINUTO;
if($segundosRestantes > 0){
    $stringFinal .= " $segundosRestantes segundos";
}
$data['ej03_textoresultado'] = $stringFinal;

/*
 * Ejercicio 4 
 */

$data['ej04_div_titulo'] = "Ejercicio 04";
$anhoInput = 2020;
$esBisiesto = (($anhoInput % 4 == 0 && $anhoInput % 100 != 0) || ($anhoInput % 400 == 0));
$data['ej04_p_class'] = $esBisiesto ? 'text-success' : 'text-danger';
$data['ej04_textoresultado'] = $esBisiesto ? "El año $anhoInput es bisiesto" : "El año $anhoInput no es bisiesto";

/*
 * Ejercicio 6
 */
$salarioActual = 2500;
$impuestos = calcularDescuentoTramo(0.0, 1000.0, 0.10, $salarioActual) 
        + calcularDescuentoTramo(1000.0, 2000.0, 0.15, $salarioActual)
        + calcularDescuentoTramo(2000.0, INF, 0.18, $salarioActual);
$data['ej06_div_titulo'] = "Ejercicio 06";
$neto = $salarioActual - $impuestos;
$data['ej06_neto'] = $neto;
$data['ej06_textoresultado'] = sprintf("El salario neto es %.2f€ tras descontar %.2f€ en impuestos", $neto, $impuestos);


/*
 * Ejercicio 7
 */
$nota = 8;
$data['ej07_div_titulo'] = "Ejercicio 06";
$data['ej07_alert_color'] = getNotaColor($nota);
$data['ej07_nota_texto'] = getNotaTexto($nota);

/*
 * Ejercicio 8
 */

$data['ej08_div_titulo'] = "Ejercicio 08";
$data['ej08_entrada'] = "Bonka";
$data['ej08_salida'] = getTipoPedido($data['ej08_entrada']);

function calcularDescuentoTramo(float $min, float $max, float $porcentaje, float $salario) : float{
    if($salario > $min){
        if($salario <= $max){
            $aAplicar = $salario - $min;
        }
        else{
            $aAplicar = $max - $min;
        }
        return $aAplicar * $porcentaje;
    }
    else{
        return 0;
    }
}

function cualMayor(int $a, int $b, int $c) : int{
    if($a >= $b){
        if($a >= $c){
            return $a;
        }
        else{
            return $c;
        }
    }
    else{
        if($b >= $c){
            return $b;
        }
        else{
            return $c;
        }
    }
}

function getNotaTexto(int $nota) : string{
    if($nota < 5){
        return "suspenso";
    }
    elseif($nota < 6){
        return "aprobado";
    }
    elseif($nota < 7){
        return "bien";
    }
    elseif($nota < 8.75){
        return "notable";
    }
    elseif($nota < 10){
        return "sobresaliente";
    }
    else{
        return "matrícula";
    }
}

function getNotaColor(int $nota) : string{
    if($nota < 5){
        return "danger";
    }
    elseif($nota < 6){
        return "warning";
    }    
    elseif($nota < 8.75){
        return "info";
    }
    elseif($nota < 10){
        return "success";
    }
    else{
        return "success";
    }
}

function getTipoPedido(string $pedido) : string{
    switch($pedido){
        case "Marcilla":
        case "Bonka":
            return "café";
        case "Coca-cola":
        case "Pepsi":
        case "Kas":
            return "refresco";
        case "Mondariz":
        case "Sousas":
        case "Cabreiroá":
            return "agua";
        default: 
            return "Producto erróneo";
    }
}

/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/boletin02.view.php';
include 'views/templates/footer.php';
