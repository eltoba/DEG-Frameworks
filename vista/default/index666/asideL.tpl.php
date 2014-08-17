<!-- Columns -->
  <div id="cols" class="box">
<!-- Aside (Left Column) -->
    <div id="aside" class="box">
      <div class="padding box">
<!-- Logo (Max. width = 200px) -->
        <p id="logo"><a href="index.php"><img src="{ruta_plantilla}tmp/logo-deg.png" width="200" height="100" alt="{visitar_sitio}" title="{visitar_sitio}" /></a></p>
<!-- Search -->
        <form action="#" method="get" id="search">
          <fieldset>
            <legend>{buscador} - esto hay que armarlo</legend>
            <p><input type="text" size="17" name="" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />
            <a href="javascript:toggle('search-options');" class="ico-drop">Advanced search</a></p>
<!-- Advanced search -->
            <div id="search-options" style="display:none;">
              <p><label><input type="checkbox" name="" checked="checked" />{opcion_1}</label><br />
              <label><input type="checkbox" name="" />{opcion_2}</label><br />
              <label><input type="checkbox" name="" />{opcion_3}</label></p>
            </div>
<!-- /search-options -->
          </fieldset>
        </form>
<!-- Create a new project -->
        <p id="btn-create" class="box"><a href="index.php?ir=proyectos"><span>{Crear_nuevo_proyecto}</span></a></p>
      </div>
<!-- /padding -->
      <ul class="box">
        <li id="submenu-active"><a href="javascript:toggle('submenu-3');" class="ico-drop">{desplegable_3}</a> <!-- Active -->
          <div id="submenu-3" style="display: none;">
          <ul>
            <li><a href="index.php?ir=guia1">{guia1}</a></li>
            <li><a href="index.php?ir=guia2">{guia2}</a></li>
            <li><a href="index.php?ir=guia3">{guia3}</a></li>
            <li><a href="index.php?ir=guia4">{guia4}</a></li>
            <li><a href="index.php?ir=guia5">{guia5}</a></li>
            <li><a href="index.php?ir=guia6">{guia6}</a></li>
            <li><a href="index.php?ir=guia7">{guia7}</a></li>
            <li><a href="index.php?ir=guia8">{guia8}</a></li>
            <li><a href="index.php?ir=guia9">{guia9}</a></li>
            <li><a href="index.php?ir=guia10">{guia10}</a></li>
            <li><a href="index.php?ir=guia11">{guia11}</a></li>
            <li><a href="index.php?ir=guia12">{guia12}</a></li>
            <li><a href="index.php?ir=guia13">{guia13}</a></li>
            <li><a href="index.php?ir=guia14">{guia14}</a></li>
            <li><a href="index.php?ir=guia15">{guia15}</a></li>
            <li><a href="index.php?ir=guia16">{guia16}</a></li>
          </ul>
          </div>
        </li>
        <li id="submenu-active"><a href="javascript:toggle('submenu-1');" class="ico-drop">{desplegable_1}</a>
          <div id="submenu-1" style="display: none;">
            <ul>
              <li><a href="index.php?ir=c2">Perfiles</a></li>
              <li><a href="#">Nuevo Usuario</a></li>
              <li><a href="#">Sistema BAN</a></li>
            </ul>
          </div>
        </li>
        <li id="submenu-active"><a href="javascript:toggle('submenu-2');" class="ico-drop">{desplegable_2}</a> <!-- Active -->
          <div id="submenu-2" style="display: none;">
          <ul>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
          </ul>
          </div>
        </li>
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">Lorem ipsum</a>
          <ul>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">Lorem ipsum</a></li>
          </ul>
        </li>
        <li><a href="#">Lorem ipsum</a></li>
      </ul>
    </div>
    <hr class="noscreen" />
<!-- /aside -->