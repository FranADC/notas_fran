<?php

declare(strict_types=1);
$data = [];

if (isset($_POST["enviar"])) {
    $errores = checkForm($_POST["json_notas"]);
    $data["errores"] = $errores;
    $data["input"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($errores);
    if (empty($errores["json_notas"])) {
        $limpio = json_decode($_POST["json_notas"], true);
        $data["resultado"] = obtenerNotas($limpio);
    }
}

function checkForm(string $original) {
    $errores = "";
    if (empty($original)) {
        $errores = "Obligatorio</br>";
    } else {
        $post = json_decode($original, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errores = "No cumple formato JSON</br>";
        } else {
            foreach ($post as $asignatura => $alumno) {
                if (empty($asignatura)) {
                    $errores .= "Una " . $asignatura . " esta vacia</br>";
                }
                if (!is_array($alumno)) {
                    $errores .= "Un array de alumnos de " . $asignatura . " da problemas</br>";
                } else {
                    foreach ($alumno as $nombre => $notas) {
                        if (empty($nombre)) {
                            $errores .= "un alumno no tiene nombre</br>";
                        }
                        if (!is_array($notas)) {
                            $errores .= "el alumno" . $nombre . "no tiene array de notas</br>";
                        } else {
                            foreach ($notas as $nota) {
                                if (!is_float($nota) && !is_int($nota)) {
                                    $errores .= "el alumno" . $nombre . "no tiene una nota correcta</br>";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return ["json_notas" => $errores];
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
