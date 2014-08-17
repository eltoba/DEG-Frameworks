<?php
/**
 * se requiere la conexion para usuarios
 */
require_once 'lib/PDO.class.php';
/**
 * 
 * @author Mauricio Jose Tobares <carrozadelamuerte@gmail.com>
 * @version 1.0
 * @copyright (c) 2011, Mauricio Jose Tobares
 */
class mod_noticias extends PDO_class {
    public $paginador = 'pag';
    private $solicitador;
    public $sql;
    public $limite = 3;
    public $cantidad = 5;
    private $data;
    private $db;
    private $resultado;
/**
 * constructor :D
 */
    public function __construct() {
        $this->solicitador = (isset($_REQUEST["{$this->paginador}"])) ? $_REQUEST["{$this->paginador}"] : 0;
// con el constructor cargamos la conexión a la base de datos
        $this->db = $this->conectarDB();
        $this->sql = 'select * from ctrl_noticias';
    }

    /**
     * analiza los datos que vienen a travez de GET
     * @param type $var
     * @param type $name
     * @return type
     */
    protected function getValue($var, $name) {
        if (is_null($var)) {
            return $_GET[$name];
        } else {
            return $var;
        }
    }

    /**
     * 
     * @param INT $id
     * @param type $nombre
     * @param type $filtro
     */
    public function consultar_noticias($id = NULL, $nombre = NULL, $filtro = NULL) {
        $id = $this->getValue($id, 'id');
        $nombre = $this->getValue($nombre, 'nombre');
        $filtro = $this->getValue($filtro, 'filtro');
    }
/**
 * 
 * @return type
 */
    public function resultado() {
        $this->resultado = $this->db->query(str_replace('*', 'COUNT(*)', $this->sql));
        $this->numeroResultados = $this->resultado->fetchColumn();
        return $this->numeroResultados;
    }
/**
 * Numero total de paginas
 * @return type
 */
    public function paginasTotales() {
        $paginasTotales = ceil($this->resultado() / $this->limite); // resultados encontrados dividido el límite por página
        return $paginasTotales;
    }
/**
 * 
 * @return type
 */
    public function paginaActual() {
        if (isset($this->solicitador) && is_numeric($this->solicitador)) {
            $this->paginaActual = (int) $this->solicitador;
        }
        else {
            $this->paginaActual = 1;
        }
        if ($this->paginaActual > $this->paginasTotales()) {
            $this->paginaActual = $this->paginasTotales();
        }
        if ($this->paginaActual < 1) {
            $this->paginaActual = 1;
        }
        return $this->paginaActual;
    }
/**
 * 
 * @return type
 */
    private function offset() {
        $offset = ($this->paginaActual() - 1) * $this->limite;
        return $offset;
    }
/**
 * 
 * @return string
 */
    public function sql() {
        $sql = $this->sql . " LIMIT {$this->limite} OFFSET {$this->offset()} ";
        return $sql;
    }
/**
 * Lista de noticias
 * @return type
 */
    function listar() {
// A partir del método sql() vamos a listar los resultados
        $res = $this->db->query($this->sql());
        foreach($res as $row) {
// formamos el listado automático
            $this->data .= '
                <ul class="articles box">
                <li class="box">
                <div class="articles-img">
                <a href="#"><img src="vista/default/index1/tmp/articles-01.jpg" alt=""></a>
                </div>
                <!-- /articles-img -->
                <div class="articles-desc">
                <h2><a href="index.php?ir=noticias&function=ver&id=' . $row['id'] . '">' . $row['titulo'] . '</a></h2>
                <p>' . $row['copete'] . '<br />
                <a href="index.php?ir=noticias&function=ver&id="' . $row['id'] . '">Leer mas</a></p>
                <p class="articles-info"><span class="articles-info-inner"><a href="#">Creado:"' . $row['creacion'] . '/Modificado:' . $row['modificacion'] . '</a> | <a href="#">13 comments</a> <span> | </span> <a href="http://proyectodemonia.com.ar">' . $row['autor'] . '</a></span></p>
                </div>
                <!-- /articles-desc -->
                </li>
                </ul>';
        }
// mostramos datos de paginas
        if($this->resultado() > 0) {
            $this->data .= '<p class="info_resultado_busca">Mostrando p&aacute;gina <b style="font-size:20px">' . $this->paginaActual()  . '</b> de <b style="font-size:20px">' . $this->paginasTotales() . '</b> disponibles para <b style="font-size:20px">'.$this->resultado().'</b> resultados encontrados.</p>';
        }
        else {
            $this->data .= '<p class="info_resultado_busca">No fueron encontrados resultados para su busqueda.</p>';
        }
        if($this->resultado() > 0) {
            $this->data .= '<div class="pagination box"><p class="f-right">';
            if ($this->paginaActual() > 1) {
                $this->data .= '<a href="?' . $this->paginador . '=1'  . $this->reconstruiQueryString($this->paginador) . '" class="current">Primera</a>';
                $anterior = $this->paginaActual() - 1;
                $this->data .= '<a href="?' . $this->paginador . '=' . $anterior . $this->reconstruiQueryString($this->paginador) . '" class="current">Anterior</a>';
            }
            for ($x = ($this->paginaActual() - $this->cantidad); $x < (($this->paginaActual() + $this->cantidad) + 1); $x++) {
                if (($x > 0) && ($x <= $this->paginasTotales())) {
                    if ($x == $this->paginaActual()) {
                        $this->data .= $x;
                    }
                    else {
                        $this->data .= '<a href="?' . $this->paginador . '=' . $x . $this->reconstruiQueryString($this->paginador) . '" class="current">' . $x . '</a>';
                    }
                }
            }
            if ($this->paginaActual() != $this->paginasTotales()) {
                $paginaProxima = $this->paginaActual() + 1;
                $this->data .= '<a href="?' . $this->paginador . '=' . $paginaProxima . $this->reconstruiQueryString($this->paginador) . '" class="current">Pr&oacute;xima</a>';
                $this->data .= '<a href="?' . $this->paginador . '=' . $this->paginasTotales() . $this->reconstruiQueryString($this->paginador) . '" class="current">&uacute;ltima</a>';
            }
            $this->data .= '</p></div>';
        }
        return array('contenido' => $this->data);
    }
/**
 * Monta los valores de la Query String nuevamente
 * @param type $valoresQueryString
 * @return boolean|string
 */
    public function reconstruiQueryString($valoresQueryString) {
        if(!empty($_SERVER['QUERY_STRING'])) {
            $partes = explode('&', $_SERVER['QUERY_STRING']);
            $novasPartes = array();
            foreach ($partes as $val) {
                if(stristr($val, $valoresQueryString) == false)  {
                    array_push($novasPartes, $val);
                }
            }
            if(count($novasPartes) != 0) {
                $queryString = '&' . implode('&', $novasPartes);
            }
            else {
                return false;
            }
            return $queryString; // nova string criada
        }
        else {
            return false;
        }
    }
    /**
 * este método es el encargado demostrar una noticia específica
 * @param type $id
 * @return type
 */
    function ver($nivelacceso, $ir) {
        require_once 'modelo/sis_menu.php';
        require_once 'modelo/sis_plantilla.php';
        require_once 'modelo/sis_config.php';

        $menu = new mod_menu();
        $menu = $menu->setMenu($nivelacceso); // traemos los menu necesarios

        $plantilla = new sis_plantilla();
        $plantilla = $plantilla->setPlantilla($nivelacceso, $ir); // traemos las plantillas

        $config = new sis_config();
        $config = $config->setConfig(); // traemos las configuraciones del sistema
// esta función hace la selección de datos para mostrar en la plantilla de lectura individual
        $rs = $this->db->prepare('SELECT * FROM ctrl_noticias WHERE id=:id');
        $rs->execute(array(
            ':id' => $_GET['id'],
        ));
        $array = array();
        foreach($rs as $row) {
            $titulo = $row['titulo'];
            $cuerpo = $row['cuerpo'];
            $creacion = $row['creacion'];
            $modificacion = $row['modificacion'];
            $autor = $row['autor'];
        }
        return $array = array(
            'titulo' => $titulo,
            'cuerpo' => $cuerpo,
            'creacion' => $creacion,
            'modificacion' => $modificacion,
            'autor' => $autor,
            'plantilla' => $plantilla,
            'config' => $config,
            'menu' => $menu
        );
    }
}

