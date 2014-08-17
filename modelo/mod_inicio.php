<?php
/**
 * Description of mod_inicio
 *
 * @author Mauricio
 */
/**
 * se incluye la clase PDO_class
 */
require_once 'lib/PDO.class.php';
class mod_inicio extends PDO_class {
    var $config;
    /**
     * 
     * @param type $nivelacceso
     * @param type $GET
     */
    public function inicio($nivelacceso, $ir) {
        /**
         * se incluye la funcion fechaActual()
         */
        include_once 'modelo/mod_fechaActual.php';
        $fechaActual = fechaActual();
        /**
         * se incluye la funcion saludoHora()
         */
        include_once 'modelo/mod_saludosegunhora.php';
        $saludosegunhora = saludoHora();
        $plantilla = $this->setPlantilla($nivelacceso, $ir);
        $config = $this->setConfig();
        $contenido = $this->contenidos();
        $menu = $this->setMenu($nivelacceso);
        return array(
            'configuraciones' => $config,
            'plantilla' => $plantilla,
            'menu_nav' => $menu,
            'contenido' => $contenido,
            'fecha_actual' => $fechaActual,
            'saludo_segun_la_hora' => $saludosegunhora
        );
    }
    /**
     * 
     * @return type
     */
    protected function contenidos() {
        include 'modelo/mod_noticias.php';
        $contenido = new mod_noticias();
        return $contenido->listar();
    }
    protected function setPlantilla($nivelacceso, $ir) {
        require_once 'modelo/sis_plantilla.php';
        $plantilla = new sis_plantilla();
        return $plantilla->setPlantilla($nivelacceso, $ir); // traemos las plantillas
    }
    protected function setMenu($nivelacceso) {
        require_once 'modelo/mod_menu.php';
        $menu = new mod_menu();
        return $menu->setMenu($nivelacceso); // traemos los menu necesarios
    }
    protected function setConfig() {
        require_once 'modelo/sis_config.php';
        $config = new sis_config();
        return $config->setConfig(); // traemos las configuraciones del sistema

    }
    
    
}

