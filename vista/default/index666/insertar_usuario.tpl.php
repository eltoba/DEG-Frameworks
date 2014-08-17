<!-- Content (Right Column) -->
    <div id="content" class="box">
      <div id="menu" class="box">
        {menu_seccion}
      </div>
<!-- Table (TABLE) -->
      <h3 class=\"tit\"><center>{titulo_registrar}</center></h3>
      {aviso}
      <fieldset>
            <form action="index.php?ir=insertar_usuario" method="post">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="25%">{titulo_nombre}</td>
                            <td width="75%"><input type="text" name="nombre" id="nombre" /></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_apellido}</td>
                            <td width="75%"><input type="text" name="apellido" id="apellido" /></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_usuario}</td>
                            <td width="75%"><input type="text" name="usuario" id="usuario" /></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_sexo}</td>
                            <td width="75%">
                                <select name="sexo" id="sexo">
                                    <option value="0" select> {sexo_indefinido} </option>
                                    <option value="1"> {sexo_hombre} </option>
                                    <option value="2"> {sexo_mujer} </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_nivelacceso}</td>
                            <td width="75%">
                                <select name="nivel" id="nivel">
                                    <option value="0" select>baneado</option>
                                    <option value="666"> {nivel_admin} </option>
                                    <option value="4"> {nivel_normal} </option>
                                    <option value="2"> {nivel_especial} </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_clave}</td>
                            <td width="75%"><input type="password" name="clave" id="clave"></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_email}</td>
                            <td width="75%"><input type="text" name="email" id="email"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input type="submit" name="registrar" id="registrar" value="{titulo_valueform}" /></center></td>
                        </tr>
                    </tbody>
                </table>
            </form>
      </fieldset>
    </div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->
