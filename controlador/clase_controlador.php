<?php
// seguridad contra acceso por url
if (!defined("_access")) {
	die("Error: You don't have permission to access here...");
}
/**
 * Este archivo es el controlador principal, mas info en @subpackage ControladorFrontal
 *
 * @package clase_controlador
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @version 1.0
 * @copyright (c) 2011 - 2014, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
*/
class ControladorFrontal {
    /**
     * 
     * @param string $nivelacceso
     * @param string $GET
     * @return string
     */
    public function ctrlunico($nivelacceso) {
        /**
         * se incluye clase_plantilla.php
         */
        include_once 'lib/clase_plantilla.php';
        if(isset($_GET['ir'])&&$_GET['ir'] == "logout") {
            session_start();
            session_unset();
            session_destroy();
            setcookie('id_extreme','x',time()-3600,'/');
            header("Location: index.php");
        }

        if(!isset($_GET['ir'])) {
            $get = 'inicio';
            $function = 'inicio';
        }
        else {
            $get = $_GET['ir'];
            if(isset($_GET['function'])) {
                $function = $_GET['function'];
            }
            else {
                $function = $get;
            }
        }

        $class_name = 'mod_' . $get;
        /**
         * se incluyen los modelos de forma dinamica desde modelo/(mod_nombre).php
         */
        include_once './modelo/' . $class_name . '.php';
        $class = new $class_name();
        $array_de_arrays = $class->$function($nivelacceso, $get);

        $configuraciones = $array_de_arrays['configuraciones'];
        foreach ($array_de_arrays as $value) {
            foreach ($value as $clave => $valor) {
                $idioma[$clave] = $valor;
            }
        }
        foreach($array_de_arrays['plantilla'] as $value) {
            if(!file_exists('idioma/' . $configuraciones['idioma'] . '/index' . $nivelacceso . '/' . $value . '.' . $configuraciones['idioma'])) {
            echo '<hr /><center>< < < plantilla \"' . $value . '\" sin carga de idioma > > ></center><hr />';
                /**
                 * se incluye el archivos de plantilla sin cargar el idioma 
                 */
                include_once 'idioma'.$configuraciones['temaindex'] . $nivelacceso . '/' . $value . '.tpl.php';
            }
            /**
             * se incluyen los archivos de idioma de forma dinamica desde ./idioma/(carpeta del idioma)/(nombre del idioma).(extension del idioma)
             * ejemplo ./idioma/es_AR/alguna_cosa.es_AR
             */
            include_once('idioma/' . $configuraciones['idioma'] . '/index' . $nivelacceso . '/' . $value . '.' . $configuraciones['idioma']);
            if(isset($idioma['aviso_de_retorno'])) { // si está definida entonces se sobreescribe
                $idioma['aviso'] = $idioma['aviso_de_retorno'];
            }
            $temaIndex = $configuraciones['temaindex'] . $nivelacceso . '/' . $value;
            $idioma['ruta_plantilla'] = $configuraciones['temaindex'] . $nivelacceso . '/';
            $tpl = new plantilla($temaIndex);
            $tpl->idioma($idioma);
            $mostrar = $tpl->muestra();
            echo $mostrar;
        }
    }
}

