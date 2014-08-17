<?php
// seguridad contra acceso por url
if (!defined("_access")) {
	die("Error: You don't have permission to access here...");
}
/**
 * requerimos PDO.class.php
 */
require_once 'lib/PDO.class.php';
/**
 * Description of sis_config
 *
 * @author Mauricio
 */
class sis_config extends PDO_class {
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

