<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class=\"tit\"><center>{titulo}</center></h3>
	  <table width="100%">
              <tr>
                  <th>{titulo_id}</th>
                  <th>{titulo_Noticia}</th>
                  <th>{titulo_autor}</th>
                  <th>{titulo_funcion}</th>
              </tr>
      {contenido}
<!-- </table se cierra en el modelo admin_config por cuestiones de facilidad, luego hay que separar los métodos para que cada parte tenga SU { contenido } -->
	  </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->