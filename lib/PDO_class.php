<?php
// seguridad contra acceso por url
if (!defined('_access')) {
	die('Error: You don\'t have permission to access here...');
}
/**
 * 
 * Este archivo sirve para brindar una conexion a la base de datos mediante PDO,
 * mas info en @subpackage PDO_class
 * 
 * @name DEG Framework
 * @package lib.PDO_class
 * @version v4.0
 * @author Mauricio Jose Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
abstract class PDO_class {
/**
 * constructor
 */
    public function __construct() {
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
/**
 * * aquí irán cargados los datos de configuración especiales si el módulo lo requiere
 * en el caso de que disponga de configuraciones especiales distintas a las del sistema base
 */
    }
/**
 * 
 * @return \PDO retorna la conexión a la base de datos
 */
    function conectarDB() {
/**
 * * NOTA IMPORTANTE 1:
 * 
 * define('DB_ALGO') or define('DB_ALGO', 'valor_de_algo'); lo que hace es una
 * doble manera de conectarse a la base de datos, en otras palabras hay 2 formas
 * de darle los datos a la conexión para que se establezca, una es mediante un
 * archivo de constantes externo y el otro método es mediante la segunda
 * constante definida in-situ, por ejemplo define('DB_HOST') or
 * define('DB_HOST', 'localhost'); la segunda constante está definida en ESTE
 * archivo mientras que la primera está definida en un archivo de constantes externo
 */
/**
 * * NOTA IMPORTANTE 2:
 * si en el archivo lib/constantes.php se introducen estos datos toma como
 * referencia los datos del archivo lib/constantes.php y no los que están como
 * segunda opción en esta clase
 */
/**
 * * (!) NOTA IMPORTANTE 3: si se va a trabajar en un servidor local la línea 56
 * include 'lib/constantes.php'; deberá ser comentada mediante // de lo contrario
 * aunque en el archivo externo se coloquen valores vacíos la conexión tomará los
 * valores vacíos del archivo externo en lugar de los valores in-situ que se
 * encuentran en este archivo!!
 */
        /**
         * se incluye el archivo de constantes lib/constantes.php
         */
//        include_once 'lib/constantes.php';
        defined('DB_HOST') or define('DB_HOST', 'localhost'); // host
        defined('DB_USER') or define('DB_USER', 'tu_usuario'); // usuario MySQL
        defined('DB_PASS') or define('DB_PASS', 'tu_clave'); // clave del usuario MySQL
        defined('DB_NAME') or define('DB_NAME', 'tu_db'); // nómbre de la base de datos
// se insertan los valores dentro de variables
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        $usuario = DB_USER;
        $clave = DB_PASS;
        try {
             $db = new PDO($dsn, $usuario, $clave);
             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             return $db;
        }
        catch (PDOException $e) {
            print "Error: ".$e->getMessage()." ".$e->getTraceAsString()."\n";
            exit();
        }
    }
    /**
     * 
     * @param int $nivelacceso nivel del usuario
     * @param string $ir el valor de $_GET['ir']
     * @return array
     */
    protected function setPlantilla($nivelacceso, $ir) {
        require_once 'modelo/sis_plantilla.php';
        $plantilla = new sis_plantilla();
        return $plantilla->setPlantilla($nivelacceso, $ir); // traemos las plantillas
    }
    /**
     * 
     * @param int $nivelacceso nivel del usuario
     * @return array
     */
    protected function setMenu($nivelacceso) {
        require_once 'modelo/sis_menu.php';
        $menu = new sis_menu();
        return $menu->setMenu($nivelacceso); // traemos los menu necesarios
    }
    /**
     * 
     * @return array
     */
    protected function setConfig() {
        require_once 'modelo/sis_config.php';
        $config = new sis_config();
        return $config->setConfig(); // traemos las configuraciones del sistema

    }
}
