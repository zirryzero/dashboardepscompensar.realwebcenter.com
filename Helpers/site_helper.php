<?php
// Para debuguear
function var_dump_linebreak($arg, $name = null)
{
    if (isset($name)) {
        echo '<b>' . ucfirst($name) . '</b>: ';
    }
    var_dump($arg);
    echo '<br><br>';
}

/**
 * --------------------------------------------------------------------------
 * Var Dump desarrollo Create by: Harold Perez
 * --------------------------------------------------------------------------
 * Este metodo imrpime un var dump
 * 
 * @param mixed $elem El elemento a imprimir.
 * @param string $titulo El titulo de lo que se va a imprimir.
 * @param bool $die Booleando para saber si se corta la ejecucion.
 *  
 */
function var_dump_dev($elem, string $titulo, bool $die)
{
    if (isset($elem)) {
        var_dump_linebreak($elem, $titulo);
    } else {
        var_dump_linebreak("NULL", $titulo);
    }
    if ($die) {
        die;
    }
}

function site_url($uri = '')
{
    return base_url() . '/' . $uri;
}
