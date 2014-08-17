<?php
// seguridad contra acceso por url
if (!defined("_access")) {
	die("Error: You don't have permission to access here...");
}
/**
 * 
 * @author Mauricio Jose Tobares <carrozadelamuerte@gmail.com>
 * @version 1.0
 * @copyright (c) 2011, Mauricio Jose Tobares
 */
abstract class PDO_class {
/**
 * constructor
 */
    public function __construct() {
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
/*
 * aquí irán cargados los datos de configuración especiales si el moódulo lo requiere
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
 * * (!) NOTA IMPORTANTE 3: si se va a trabajar en local el siguiente include deberia comentarse!!
 */
        /**
         * se incluye el archivo de constantes lib/constantes.php
         */
//        include_once 'lib/constantes.php';
        defined('DB_HOST') or define('DB_HOST', 'tu host local'); // host
        defined('DB_USER') or define('DB_USER', 'usuario'); // usuario MySQL
        defined('DB_PASS') or define('DB_PASS', 'clave'); // clave del usuario MySQL
        defined('DB_NAME') or define('DB_NAME', 'base de datos'); // nómbre de la base de datos
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
}

