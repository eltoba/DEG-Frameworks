<?php
// seguridad contra acceso por url
if(!defined('_access')) {
  die('Error: You don\'t have permission to access here...');
}
/**
 * 
 * Este archivo es el encargado de generar y mostrar las plantillas así como
 * integrar y reemplazar las variables de idioma que correspondan,
 * mas info en @subpackage Plantilla
 * 
 * @name DEG Framework
 * @package lib.clase_plantilla
 * @version v4.0
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://una-web.com Web oficial del proyecto
 */
class Plantilla {
    /**
     *
     * @var str $vars trae las variables de idioma desde la clase controlador/clase_controlador.php
     */
    private $vars;
    /**
     *
     * @var str $tpl_file toma el valor de la ruta completa que hay hacia las plantillas
     */
    private $tpl_file;
    /**
     *
     * @var type $mihtml 
     */
    private $mihtml;
/**
 * 
 * @param str $template_file nombre de la plantilla a cargar
 */
    function plantilla($template_file) {
        $this->tpl_file = $template_file . '.tpl.php';
    }
    /**
     * 
     * @param string $vars variables de idioma que se deben reemplazar en la plantilla
     */
    function idioma($vars) {
        $this->vars = (empty($this->vars)) ? $vars : $this->vars . $vars;
    }
    /**
     * * Este método es el mas importante ya que carga las plantillas, reemplaza
     * las variables de idioma por el valor de dicha variable y finalmente
     * muestra el resultado
     */
    function muestra() {
        if (!($this->fd = @fopen($this->tpl_file, 'r'))) {
            sostenedor_error('error al abrir la plantilla ' . $this->tpl_file);
        }
        else {
            $this->template_file = fread($this->fd, filesize($this->tpl_file));
            fclose($this->fd);
            $this->mihtml = $this->template_file;
            $this->mihtml = str_replace ("'", "\'", $this->mihtml);
//          $this->mihtml = preg_replace('#\<idioma>([a-z0-9\-_]*?)\</idioma>#is', "' . $\\1 . '", $this->mihtml); // este reemplaza la etiqueta <idioma>titulo_algo</idioma>
            $this->mihtml = preg_replace('#\{([a-z0-9\-_]*?)\}#is', "' . $\\1 . '", $this->mihtml); // este es para {contenido_algo}
            reset ($this->vars);
            while (list($key, $val) = each($this->vars)) {
                $$key = $val;
            }
            eval("\$this->mihtml='$this->mihtml';");
            reset ($this->vars);
            while (list($key, $val) = each($this->vars)) {
                unset($$key);
            }
            $this->mihtml=str_replace ("\'", "'", $this->mihtml);
            echo $this->mihtml;
        }
    }
}
/**
 * 
 * @param string $error para mostrar errores muestra los errores que se produzcan
 * sin bloquear todo el sistema, en lugar de mostrar la plantilla que presenta
 * errores lo que hace es cargar todas las plantillas restantes menos la plantilla
 * que presenta problemas y en lugar de esa plantilla problematica muestra el
 * error surgido
 * @return string
 */
function sostenedor_error($error) {
    $miplantilla = new plantilla('error');
    $miplantilla->idioma(array('aviso_de_retorno' => $error));
    return $miplantilla->muestra();
}
