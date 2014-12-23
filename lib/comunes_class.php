<?php
/**
 * 
 * Esta clase es para métodos comunes que se deban integrar al sistema de forma
 * generalizada y no como módulo particular, mas info en @subpackage Comunes
 * 
 * @name DEG Framework
 * @package lib.comunes_class
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
class Comunes {
/**
 * Este archivo sirve para acciones comunes del sistema que no sean verdaderos modulos sino pequeñas acciones que debería realizar el sistema, mas info en @subpackage Comunes
 * 
 * Dejar entrar al sistema
 * @param boolean $estado
 * @return boolean
 */
    public function dejarEntrar($estado){
        define('_access', $estado);
        if (_access != TRUE) {
            return die('Error: You don\'t have permission to access here...');
        }
    }
}
