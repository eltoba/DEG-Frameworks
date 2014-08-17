<?php
/**
 * incluimos la clase PDO.class.php
 */
include_once 'lib/PDO.class.php';
/**
 * @name DEG Framework
 * @version V3.0-RC1-RV1
 * @author Mauricio José Tobares <carrozadelamuerte@gmail.com>
 * @copyright (c) 2011, Mauricio Jose Tobares
 * @license http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES Reconocimiento-CompartirIgual 3.0 Unported (CC BY-SA 3.0)
 * @link http://proyectodeg.com.ar Web oficial del proyecto
 */
class mod_login extends PDO_class {
    private $db;
    private $usuario;
    private $clave;
    private $recordar;
// constructor del objeto
/**
 * 
 */
    public function __construct() {
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
    }
// funcion para hacer login
    /**
     * 
     * @param type $usuario
     * @param type $clave
     * @param type $recordar
     * @return type
     */
    function login() {
// preparamos los datos con los que trabajar posteriormente
        $this->usuario = $_POST['usuario'];
        $this->clave = $_POST['clave'];
        $this->recordar = $_POST['recordar'];
// realizamos una consulta para saber si el usuario y clave son correctos
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario AND clave=:clave');
        $query->execute(array(
            ':usuario' => $this->usuario,
            ':clave' => sha1(md5($this->clave)) // la clave en el sistema funciona con un doble sifrado, sha1 y md5 (primero md5 y luego la clave ya codificada en md5 se vuelve a codificar en sha1)
        ));
// si la consulta no devuelve datos es porque hubo alguna falla no detectada en el controlador y por lo tanto se devuelve desde aquí un error
        if (!$query) {
            $this->error .= 'ERROR: por alguna raz&oacute;n llegaste a esta instancia con valores incorrectos y por lo tanto el evento fu&eacute; registrado y reportado a un administrador del sitio.';
            return array('aviso_de_retorno' => $this->error);
        }
// ahora si la consulta devuelve algun tipo de resultado entonces seguimos con la ejecución del script
        else {
            foreach ($query as $row) {
// ahora cargamos todos los datos del usuario en recursos para utilizar posteriormente
                $this->id = $row['id'];
                $this->nombre = $row['nombre'];
                $this->apellido = $row['apellido'];
                $this->usuario = $row['usuario'];
                $this->email = $row['email'];
                $this->sexo = $row['sexo'];
                $this->nivelacceso = $row['nivelacceso'];
// cargamos las variables de conexión
                $_SESSION["s_username"] = $this->usuario;
                $_SESSION["logeado"] = 'SI';
                $_SESSION['id'] = $this->id;
                $_SESSION['nombre'] = $this->nombre;
                $_SESSION['apellido'] = $this->apellido;
                $_SESSION['usuario'] = $this->usuario;
                $_SESSION['email'] = $this->email;
                $_SESSION['sexo'] = $this->sexo;
                $_SESSION['nivelacceso'] = $this->nivelacceso;
/**/
// Si aceptamos recordar los datos
                if(!empty($recordar)) {
                    if ($HTTP_X_FORWARDED_FOR == '') {
                        $ip = getenv(REMOTE_ADDR);
                    }
                    else {
                        $ip = getenv(HTTP_X_FORWARDED_FOR);
                    }
                    $this->id_extreme = md5(uniqid(rand(), true));
                    $id_extreme2 = $this->usuario . '%' . $this->id_extreme . '%' . $ip;
                    setcookie('id_extreme', $id_extreme2, time()+7776000,'/');
                    $rcrdr = $this->db->prepare('UPDATE usuarios SET id_extreme=:id_extreme WHERE usuario=:usuario');
                    $rcrdr->execute(array(
                        ':id_extreme' => $this->id_extreme,
                        ':usuario' => $this->usuario
                    ));
                    if (!$rcrdr) {
                        $this->error .= 'ERROR: hubo un insidente desconocido en el login'; // este header o hace solo si se pidió recordar contraseña
                        return array('aviso_de_retorno' => $this->error);
                    }
                }
            }
            header('Location: index.php');
        }
    }
}
