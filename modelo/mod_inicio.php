<?php
// seguridad contra acceso por url
if (!defined("_access")) {
	die("Error: You don't have permission to access here...");
}
/**
 * 
 * Este archivo es el encargado de mostrar la pagina principal, mas info en @subpackage mod_inicio
 * 
 * @name DEG Framework
 * @package modelo.mod_inicio
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
class Mod_inicio extends PDO_class {
    var $config;
    /**
     * 
     * @param int $nivelacceso nivel del usuario
     * @param string $ir el valor de $_GET['ir']
     * @return array
     */
    public function inicio($nivelacceso, $ir) {
        // se traen las plantillas a utilizar
        $plantilla = $this->setPlantilla($nivelacceso, $ir);
        // se cargan las configuraciones necesarias
        $config = $this->setConfig();
        $menu = $this->setMenu($nivelacceso);
        return array(
            'configuraciones' => $config,
            'plantilla' => $plantilla,
            $menu,
        );
    }
}
