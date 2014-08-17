<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
        {aviso}
        <h3 class="tit"><center>{nombre} {titulo}</center></h3>
        {titulo_noticia} {titulo}<br />
        <div id="menu" class="box">
            <center>
            <ul class="box">
                <li><a href="index.php?ir=editar_noticia&id={id}"><span>{editar}</span></a></li>
                <li><a href="index.php?ir=borrar_noticia&delID={id}"><span>{eliminar}</span></a></li>
            </ul>
            </center>
        </div>
    </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->
