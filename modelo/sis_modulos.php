<?php
// seguridad contra acceso por url
if (!defined('_access')) {
    die('Error: You don\'t have permission to access here...');
}
/**
 * 
 */
class sis_modulos extends PDO_class {
/**
 *
 * @var type 
 */
    private $db;
/**
 *
 * @var type 
 */
    private $ir;
/**
 * 
 */
    public function __construct() {
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
    }
/**
 * 
 * @param type $nivelacceso
 * @param type $ir
 * @return type
 */
    function funciones($nivelacceso, $ir) {
        $this->ir = $ir;
        $result1 = $this->db->prepare('SELECT * FROM ctrl_menu WHERE menu_tipo=:tipo AND menu_estado=:estado AND menu_ruta=:ruta');
        $result1->execute(array(
                ':tipo'   => $nivelacceso,
                ':estado' => 1,
                ':ruta'   => $this->ir
        ));
        if(!$result1) {
            print 'ERRORRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR';
        }
        else {
            $result2 = $this->db->prepare('SELECT * FROM ctrl_contenido WHERE tipo=:tipo AND estado=:estado AND ruta=:ruta');
            $result2->execute(array(
                ':tipo' => $nivelacceso,
                ':estado' => 1,
                ':ruta' => $this->ir
            ));
            if(!$result2) {
                $array1 = array();
            }
            else {
// creamos el array1
                $array1 = array();
                foreach ($result2 as $row) {
                    $array1[$row['funcion']] = $row['funcion'];
                }
            }
// ahora procesamos las funciones estáticas (modulos que no varían segun el contenido)
            $result3 = $this->db->prepare('SELECT * FROM ctrl_modulos WHERE tipo=:tipo AND estado=:estado');
            $result3->execute(array(
                ':tipo'   => $nivelacceso, // nivel del usuario
                ':estado' => 1 // estado de publicado
            ));
            if(!$result3) {
                /* pensaba poner este error pero es mejor cargar un array vacío
                print "<p>Error en la consulta.</p>\n";
                die();
                */
                $array2 = array();
            }
            else {
// ahora si, creamos el array2
                $array2 = array();
                foreach ($result3 as $row) {
                    $array2[$row['funcion']] = $row['funcion'];
                }
            }
        }
// una vez que tenemos los 2 arrays creados los pegamos :D facil... ¿verdad?
        return $funciones = array_merge($array1, $array2);
    }
}
