<?php

declare(strict_types=1);
$data = [];
if (isset($_POST["enviar"])) {
    $limpio = json_decode($_POST["json_notas"], true);
    $data["resultado"] = obtenerNotas($limpio);
}
function obtenerNotas(array $original): array {
    $datos = [];
    $resultados = [];
    foreach ($original as $asignatura => $alumnos) {
        $media = 0;
        $alumnosTotales = 0;
        $CantSuspensos = 0;
        $CantAprobados = 0;
        $maximo = ["nome" => "", "nota" => 0];
        $minimo = ["nome" => "", "nota" => 10];
        foreach ($alumnos as $nombre => $conjuntoNotas) {
            $sumarMedia = 0;
            $dividirMedia = 0;
            foreach ($conjuntoNotas as $nota) {
                $sumarMedia += $nota;
                $dividirMedia++;
            }
            $nota = $sumarMedia / $dividirMedia;
            $media += $nota;
            $alumnosTotales++;

            if (!isset($resultados[$nombre])) {
                $resultados[$nombre] = ["aprobadas" => 0, "suspensas" => 0];
            }

            if ($nota >= 5) {
                $resultados[$nombre]["aprobadas"]++;
                $CantAprobados++;
            } else {
                $resultados[$nombre]["suspensas"]++;
                $CantSuspensos++;
            }

            if ($maximo["nota"] < $nota) {
                $maximo["nombre"] = $nombre;
                $maximo["nota"] = number_format($nota, 2, ",", ".");
            }
            if ($minimo["nota"] > $nota) {
                $minimo["nombre"] = $nombre;
                $minimo["nota"] = number_format($nota, 2, ",", ".");
            }
        }

        $datos[$asignatura] = [
            "media" => number_format(($media / $alumnosTotales), 2, ",", "."),
            "suspensosTotales" => $CantSuspensos,
            "aprobadosTotales" => $CantAprobados,
            "maxima" => $maximo,
            "minima" => $minimo
        ];
    }
    return ["datos" => $datos, "cualificaciones" => $resultados];
}
include 'views/templates/header.php';
include 'views/notasFran.view.php';
include 'views/templates/footer.php';