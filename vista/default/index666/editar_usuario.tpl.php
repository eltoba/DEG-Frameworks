<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class="tit">{titulo}</h3>
      {aviso}
      <h3 class="tit"><center>{editar_usuario}</center></h3>
      <fieldset>
      <form action="index.php?ir=editar_usuario" method="POST">
        <table class="nostyle">
          <tr>
            <td style="width:70px;">{form_id}</td>
            <td><input type="text" size="40" name="id" id="id" class="input-text" value="{editar_id}" readonly /></td>
          </tr>
          <tr>
            <td>{form_nombre}</td>
            <td><input type="text" size="40" name="nombre" id="nombre" value="{editar_nombre}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_apellido}</td>
            <td><input type="text" size="40" name="apellido" id="apellido" value="{editar_apellido}" class="input-text" /></td>
          </tr>
          <tr>
              <td>{form_usuario}</td>
              <td><input type="text" size="40" name="usuario" id="usuario" value="{editar_usuario}" class="input-text" /></td>
          </tr>
          <tr>
              <td>{form_email}</td>
              <td><input type="text" size="40" name="email" id="email" value="{editar_email}" class="input-text" /></td>
          </tr>
          <tr>
              <td>{form_sexo}</td>
              <td>
                  <select name="sexo" id="sexo">
                      <option value="{editar_sexo}" select>{sin_cambios}</option>
                      <option value="0"> {sexo_indefinido}</option>
                      <option value="1"> {sexo_hombre} </option>
                      <option value="2"> {sexo_mujer} </option>
                  </select>
              </td>
          </tr>
          <tr>
              <td>{form_nivelacceso}</td>
              <td>
                  <select name="nivel" id="nivel">
                      <option value="{editar_nivel}" select>{sin_cambios}</option>
                      <option value="0">{nivel_acceso_baneado}</option>
                      <option value="4">{nivel_acceso_4}</option>
                      <option value="666">{nivel_acceso_666}</option>
                  </select>
              </td>
          </tr>
          <tr>
              <td>{form_clave}</td>
              <td><input type="password" size="40" name="clave" id="clave" value="{editar_clave}" class="input-text" /> IMPORTANTE: si no se quiere cambiar la clave no modifique este campo</td>
          </tr>
          <tr>
            <td colspan="2" class="t-left">
              <input type="submit" name="editar" id="editar" class="input-submit" value="editar" />
            </td>
          </tr>
        </table>
      </form>
      </fieldset>
    </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->
