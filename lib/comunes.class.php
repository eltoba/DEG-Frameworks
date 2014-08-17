<?php
/*
// seguridad contra acceso por url
if (!defined("_access")) {
  die("Error: You don't have permission to access here...");
}
 * esto está comentado porque por algun motivo si se coloca como se supone deja
 * de funcionar toda la aplicación
 * 
 * NOTA: eso te pasa por boludo, estas cosas deberían ser módulos!!!
 */
/**
 * @name DEG Framework
 * @version V3.0-RC1-RV1
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://proyectodeg.com.ar Web oficial del proyecto
 */
class Comunes {
    /**
     *
     * @var type 
     */
    private $tiempoInicio;
################################################################################
# * Método para leer la IP real del usuario                                    #
################################################################################
/**
 * Retorna la IP Real del usuario
 * @return type
 */
    function getRealIP() {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { // se hace de esta forma para indicar que si NO está definida la variable $_SERVER entonces realiza el proceso
//        if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '') { // esta es la linea original pero daba undefined index ya que si no está definida la variable $_SERVER no va a ser nunca distinta a cero ya que al no estar definida no hay con que valor comparar
            $client_ip = (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:((!empty($_ENV['REMOTE_ADDR']))?$_ENV['REMOTE_ADDR']:"unknown");
/*
 * los proxys van añadiendo al final de esta cabecera
 * las direcciones ip que van "ocultando". Para localizar la ip real
 * del usuario se comienza a mirar por el principio hasta encontrar
 * una dirección ip que no sea del rango privado.
 * En caso de no encontrarse ninguna se toma como valor el REMOTE_ADDR
 */
            $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
            reset($entries);
            while (list(, $entry) = each($entries)) {
                $entry = trim($entry);
                if (preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list)) {
                    $private_ip = array(
                        '/^0\./',
                        '/^127\.0\.0\.1/',
                        '/^192\.168\..*/',
                        '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                        '/^10\..*/'
                    );
                    $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
                    if ($client_ip != $found_ip) {
                        $client_ip = $found_ip;
                        break;
                    }
                }
            }
        }
        else {
            $client_ip = (!empty($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:((!empty($_ENV['REMOTE_ADDR']))?$_ENV['REMOTE_ADDR']:"unknown");
        }
        return $client_ip;
    }
################################################################################
# * Método para calcular el tiempo de carga del script                         #
################################################################################
// esto se puede mejorar pero por ahora voy a utilizar esto
/**
 * 
 */
    public function __construct() {
        $this->tiempoInicio = $this->actual();
    }
/**
 * 
 * @return type $ac
 */
    private function actual() {
        $hora = microtime();
        $hora = explode(' ',$hora);
        $ac = $hora[1] + $hora[0];
        return $ac;
    }
/**
 * 
 * @return type $dif
 */
    public function calcular() {
        $dif = $this->actual() - $this->tiempoInicio;
        return $dif;
    }
/**
 * 
 */
    public function TiempoDeCarga() {
        echo $this->calcular();
    }
################################################################################
# * Deja entrar o no a la url, es obligatorio sitar esto en todos los scripts  #
# * ADVERTENCIA:                                                               #
# * esto hay que hacerlo mas robusto para que a la vez que filtra los intentos #
# * de entrar a una URL de manera directa que a la vez registre el incidente y #
# * sea capaz de dar un aviso al administrador y todo en total secreto sin que #
# * el que intenta ingresar a una URL inadecuada se de por enterado            #
################################################################################
/**
 * 
 * @param type $estado
 * @return type
 */
    public function dejarEntrar($estado){
        define('_access', $estado);
        if (_access != TRUE) {
            return die('Error: You don\'t have permission to access here...');
            exit();
        }
    }
}
