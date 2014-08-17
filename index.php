<?php
/**
 * Este es el archivo de entrada al sistema sobre el cual actúan todos los
 * módulos a travez del método GET, ejemplo <index.php?ir=algunlugar>,
 * mas información en @subpackage index.php
 * 
 * @package inicio
 * @version V3.0-RC1-RV1
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011 - 2014, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
*/
// Activa los mensajes de error (para testeos y optimización)
ini_set ('display_errors', TRUE );

// iniciamos el objeto (esto se debe colocar SI O SI al inicio del codigo
// para evitar errores al hacer multiples headers)
ob_start();

session_start();

/**
 * requerimos la clase Comunes
 */
require_once 'lib/comunes.class.php';

$comunes = new Comunes();
$comunes->dejarEntrar(TRUE);

if(@chdir('./install')) {
    Header('Location: install/index.php');
}
else {
    /**
     * Requerimos la clase ControladorFrontal
     */
    require_once 'controlador/clase_controlador.php';
    if(isset($_SESSION['nivelacceso'])) {
        $nivelacceso = $_SESSION['nivelacceso'];
    }
    else {
        $nivelacceso = 1;
    }
    ControladorFrontal::ctrlunico($nivelacceso);
}
?>
<hr />
<center>
<?php
// si te parece algo poco estético lo quitas y ya, esto tiene su razón de ser en
// el testeo y el desarrollo de aplicaciones para saber cual es su tiempo de
// carga, ya si en tu proyecto no te gusta como se ve pues lo quitas y ya
echo $comunes->TiempoDeCarga() . " | " . $comunes->getRealIP();
?>
<br />
<!-- licencia -->
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.es"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a> <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Demonia Engine Games</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="proyectodemonia.com.ar" property="cc:attributionName" rel="cc:attributionURL">Mauricio Jos&eacute; Tobares</a> se encuentra bajo una <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.es">Licencia Creative Commons Atribuci&oacute;n-CompartirIgual 3.0 Unported</a>.
</center>
<hr />
<?php
// finalizamos el flujo (esto se debe colocar para evitar errores al hacer multiples headers)
ob_end_flush();

