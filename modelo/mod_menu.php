<?php
/**
 * Description of mod_menu
 *
 * @author Mauricio
 */
require_once 'lib/PDO.class.php';
class mod_menu extends PDO_class {
/**
 * 
 * @param type $tipo
 * @return type
 */
    function setMenu($tipo) {
        $listaMenu = ''; // definimos la variable listaMenu como vacía para que no diga luego UNDEFINED VARIABLE!!
        $result = $this->db->prepare('SELECT * FROM ctrl_menu WHERE menu_tipo=:tipo AND menu_estado=:estado ORDER BY menu_orden ASC');
        $result->execute(array(
            ':tipo' => $tipo,
            ':estado' => 1 // estado publicado
        ));
        if(!$result) {
            print '<p>Error en la consulta.</p>\n';
        }
        else {
            foreach($result as $row) {
// si es el inicio indicamos que el enlace sea el correcto (y no index.php?ir=inicio sino simplemente index.php
                if($row['menu_nombre'] == 'inicio') {
                    $li = '<li class="current">';
                    $enlace = 'index.php'; // carga index.php en lugar de "inicio"
                }
// lo mismo que con el inicio pero en este caso entramos al foro indicando que no es index.php?ir=foro sino simplemente foro/
                elseif($row['menu_nombre'] == 'foro') {
                    $li = '<li>';
                    $enlace = $row['menu_ruta']; // carga la dirección que asignemos al foro
                }
// ahora si creamos los menus que hagan falta
                else {
                    $li = '<li>';
                    $enlace = 'index.php?ir=' . $row['menu_ruta']; // carga la ruta que asignemos para el menú
                }
                $listaMenu .= $li . '<a href="' . $enlace . '">' . $row['menu_nombre'] . '</a></li>'; // se le da forma al enlace
            }
            return array('menu_nav' => $listaMenu); // se devuelve en forma de array
        }
    }
}

