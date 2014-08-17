<?php
/**
 * 
 * @return string
 */
function saludoHora() {
  if(isset($_SESSION['logeado'])) {
      $date = date("H");
      if ($date <= 12) {
          $saludo = "Buenos dias ".$_SESSION['usuario'].", Bienvenido!";
      }
      else if($date == 13 && $date <= 20) {
          $saludo = "Buenas tardes ".$_SESSION['usuario'].", Bienvenido!";
      }
      else $saludo = "Buenas noches ".$_SESSION['usuario'].", Bienvenido!";
      return $saludo;
  }
  else {
      $date = date("H");
      if ($date <= 12) {
          $saludo = "Buenos dias visitante, Bienvenido!";
      }
      else if($date == 13 && $date <= 20) {
          $saludo = "Buenas tardes visitante, Bienvenido!";
      }
      else $saludo = "Buenas noches visitante, Bienvenido!";
      return array('saludo_segun_la_hora' => $saludo);
  }
}
?>