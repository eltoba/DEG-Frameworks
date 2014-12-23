<?php
// seguridad contra acceso por url
if (!defined('_access')) {
	die('Error: You don\'t have permission to access here...');
}
/**
 * 
 * Este archivo es un modulo de ejemplo que demuestra el funcionamiento del sistema,
 * es un modulo base y es la estructura que se sugiere para los modulos que se
 * creen en el futuro, mas info en @subpackage mod_ejemplo
 * 
 * @name DEG Framework
 * @package modelo.mod_ejemplo
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
class Mod_ejemplo extends PDO_class {
    /**
     * 
     * @param string $param1 el valor de $_GET['ir']
     * @param int $param2 nivel del usuario
     * @return array
     */
    public function ejemplo($param1, $param2) {
        if (isset($_GET['function'])) {
// si en GET se define "function" comprobamos que el método exista
            $comprobarMetodo = method_exists($this, $_GET['function']);
// si el metodo existe entonces lo que hacemos es cargarlo
            if ($comprobarMetodo == TRUE) {
// asignamos el nombre del método
                $funcion = $_GET['function'];
// le indicamos que la plantilla para el siguiente método es el mismo nombre que
// el método (se puede personalizar cambiando el nombre en lugar de asignarle la
// variable $funcion como valor)
//                $param1 = $funcion;
                $parame1 = 'MetodoEjemplo';
                return $this->$funcion($parame1, $param2);
            }
// en caso que GET traiga definido "function" pero el metodo no existe
// (por varias razones puede ocurrir esto)
            else {
// aquí es donde se puede personalizar un poco mas el código registrando la
// intromisión en una ruta inválida y registrándo el IPADRES del visitante que
// intentó ingresar en un sitio inadecuado
                echo 'el m&eacute;todo "' . $_GET['function'] . '" no existe';
            }
        }
// ahora si NO está definido function en la url entonces ejecutamos el
// siguiente bloque
        else {
            $algo = array('mod_ejemplo' => 'alguna cosa :D');
// cargamos las plantillas
            $plantilla = $this->setPlantilla($param1, $param2);
// cargamos las configuraciones
            $config = $this->setConfig();
// cargamos los menus
            $menu = $this->setMenu($param1);
// retornamos el array para ser utilizada por el controlador
            return array(
                'configuraciones' => $config,
                'plantilla' => $plantilla,
                'mod_ejemplo' => $algo,
                $menu,
            );
        }
    }
    /**
     * 
     * @param string $param1 el valor de $_GET['ir']
     * @param int $param2 nivel del usuario
     * @return array
     */
    public function MetodoEjemplo($parame1, $param2) {
        $algo = array('mod_ejemplo' => 'esto es lo que devuelve el m&eacute;todo "MetodoEjemplo" que tiene el parametro param1: ' . $parame1 . ' y el parametro param2: ' . $param2);
// cargamos las plantillas
        $plantilla = $this->setPlantilla($parame1, $param2);
// cargamos las configuraciones
        $config = $this->setConfig();
// cargamos los menus
        $menu = $this->setMenu($parame1);
// retornamos el array para ser utilizada por el controlador
        return array(
            'configuraciones' => $config,
            'plantilla' => $plantilla,
            'mod_ejemplo' => $algo,
            $menu,
        );
    }
}
