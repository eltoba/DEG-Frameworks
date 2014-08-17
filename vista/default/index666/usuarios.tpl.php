<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class=\"tit\"><center>{titulo}</center></h3>
	  <table width="100%">
              <tr>
                  <th>{titulo_id}</th>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>usuario</th>
                  <th>e-mail</th>
                  <th>nivel de acceso</th>
              </tr>
              {contenido}
          </table>
<!-- </table se cierra en el modelo admin_config por cuestiones de facilidad, luego hay que separar los métodos para que cada parte tenga SU { contenido } -->
	  </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->