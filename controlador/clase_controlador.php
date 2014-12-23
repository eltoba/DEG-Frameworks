<?php
// seguridad contra acceso por url
if (!defined("_access")) {
    die("Error: You don't have permission to access here...");
}
/**
 * 
 * Este archivo es el controlador principal,
 * mas info en @subpackage ControladorFrontal
 *
 * @name DEG Framework
 * @package controlador.clase_controlador
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
*/
class ControladorFrontal {
    /**
     * @param int $nivelacceso nivel del usuario
     * @param string $GET el valor de $_GET['ir']
     * @return string
     */
    public function ctrlunico($nivelacceso) {
        /**
         * se incluye la clase PDO_class
         */
        require_once 'lib/PDO_class.php';
        $get = 'inicio';
        /**
         * se incluye clase_plantilla.php
         */
        include_once 'lib/clase_plantilla.php';
// si está definido $_GET
        if (isset($_GET['ir'])) {
// si el usuario estaba logueado y quiere salir se ejecuta el siguiente bloque
            if ($_GET['ir'] == 'logout') {
                session_start();
                session_unset();
                session_destroy();
                setcookie('id_extreme', 'x', time()-3600, '/');
                header('Location: index.php');
            }
// revisamos que $_GET['ir'] NO esté vacío
            if (!empty($_GET['ir'])) {
// cargamos el recurso
                $get = $_GET['ir'];
            }
            else {
// se podría personalizar de otra forma, pero por motivos practicos se deja así
                echo 'ERROR: si bien \"ir\" est&aacute; definido no tiene ningun valor asignado';
                header('Location: index.php');
                die();
            }
        }
// se le da un nombre al módulo con el que trabajar
        $class_name = 'mod_' . $get;
        if (file_exists('./modelo/' . $class_name . '.php')) {
/**
 * se incluyen los modelos de forma dinamica desde modelo/(mod_nombre).php
 */
            include_once './modelo/' . $class_name . '.php';
        }
        else {
            echo 'algo anda mal :(';
// en caso que se marque alguna ruta extraña que queira ingresar a un modulo
// inexistente se redirecciona a index.php
            header('Location: index.php');
            die();
        }
// creamos el nombre de la clase y la utilizamos
        $nombre_clase = 'Mod_' . $get; // nótese que se podría haber utilizado $class_name pero en lugar de utilizar class Mod_algo hubiera llamado a class mod_algo y eso podría causar conflictos
        $class = new $nombre_clase();
        $array_de_arrays = $class->$get($nivelacceso, $get);
// se carga el array de configuraciones
        $configuraciones = $array_de_arrays['configuraciones'];
// se crea una función anónima encargada de cargar el array de idiomas
        foreach ($array_de_arrays as $value) {
            foreach ($value as $clave => $valor) {
                $idioma[$clave] = $valor;
            }
        }
// ciclo encargado de cargar las plantillas y archivos de idioma adecuados
        foreach($array_de_arrays['plantilla'] as $value) {
            if(!file_exists('idioma/' . $configuraciones['idioma'] . '/index' . $nivelacceso . '/' . $value . '.' . $configuraciones['idioma'])) {
            echo '<hr /><center>< < < plantilla \"' . $value . '\" sin carga de idioma > > ></center><hr />';
                /**
                 * se incluye el archivos de plantilla sin cargar el idioma 
                 */
                include_once 'idioma' . $configuraciones['temaindex'] . $nivelacceso . '/' . $value . '.tpl.php';
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
            $tpl = new Plantilla($temaIndex);
            $tpl->idioma($idioma);
            $mostrar = $tpl->muestra();
            echo $mostrar;
        }
    }
}
