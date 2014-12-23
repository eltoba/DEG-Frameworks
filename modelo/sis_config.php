<?php
// seguridad contra acceso por url
if (!defined("_access")) {
	die("Error: You don't have permission to access here...");
}
/**
 * 
 * Este archivo es el encargado de cargar las configuraciones necesarias desde la base de datos, mas info en @subpackage Sis_config
 * 
 * @name DEG Framework
 * @package modelo.sis_config
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
class Sis_config extends PDO_class {
/**
 * 
 * @return array
 */
    function setConfig() {
        $result = $this->db->prepare('SELECT * FROM ctrl_config');
        $result->execute();
        if (!$result) {
            print '<p>Error en la consulta.</p>\n';
            die();
        }
        foreach ($result as $row) {
            $retornar[$row['config']] = $row['valor'];
        }
        return $retornar;
    }
}
