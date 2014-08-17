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
class sis_plantilla extends PDO_class {
// para uso de la conexión a la db
/**
 *
 * @var type 
 */
    private $db;
/**
 * 
 */
    public function __construct() {
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
    }
/**
 * setPlantilla es el cargador de plantillas
 * @param int $nivelacceso nivel del usuario
 * @param str $ir el valor de $_GET['ir']
 * @return type
 */
    function setPlantilla($nivelacceso, $ir) {
        $this->ir = $ir;
        $result1 = $this->db->prepare('SELECT * FROM ctrl_menu WHERE menu_tipo=:tipo AND menu_estado=:estado AND menu_ruta=:ruta');
        $result1->execute(array(
                ':tipo' => $nivelacceso,
                ':estado' => 1,
                ':ruta' => $this->ir
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
                $contenido = array();
                foreach ($result2 as $row) {
                    $contenido = array('sec_contenido' => $row['plantilla']);
                }
            }
            $result = $this->db->prepare('SELECT * FROM ctrl_plantilla WHERE tipo=:tipo AND estado=:estado ORDER BY plantilla_orden ASC');
            $result->execute(array(
                ':tipo' => $nivelacceso,
                ':estado' => 1 // si cambia este valor por 0 mostrará los no publicados, favor de NO CAMBIAR!!!! estás advertido!!
            ));
            if(!$result) {
                print '<p>Error en la consulta.</p>\n';
                die();
            }
            $plantillas = array();
            foreach($result as $row) {
                $plantillas[$row['clave']] = $row['nombre'];
            }
        }
        return $dato = array_merge($plantillas, $contenido); // lo que hace es sobrescribir la plantilla de contenido ensima de la de plantillas y lo que causa es reemplazar "sec_contenido"=>"inicio" por "sec_contenido"=>"la ruta de la seccion que se quiere cargar"
    }
}

