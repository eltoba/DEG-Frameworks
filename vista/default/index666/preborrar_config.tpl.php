<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      {aviso}
      <h3 class="tit"><center>{titulo} {config}</center></h3>
      {titulo_config} {config}<br />
      {titulo_valor} {valor}
        <div id="menu" class="box">
            <center>
            <ul class="box">
                <li><a href="index.php?ir=editar_config&id={id}"><span>{editar}</span></a></li>
                <li><a href="index.php?ir=borrar_config&delID={id}"><span>{eliminar}</span></a></li>
            </ul>
            </center>
        </div>
    </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->
