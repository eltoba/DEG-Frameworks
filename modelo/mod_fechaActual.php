<?php
/**
 * 
 * @return string
 */
function fechaActual() {
// el array es porque vaya uno a saber cual sea el motivo, lo que decía en php.net (y fiel a su costumbre) NO ANDABA la forma de la web oficial de php ¬¬!!!
    $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
    $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $array = $dias[date('w')].' '.date('d').' de '.$meses[date('n')-1]. ' del '.date('Y');
    return array('fecha_actual'=>$array);
}
