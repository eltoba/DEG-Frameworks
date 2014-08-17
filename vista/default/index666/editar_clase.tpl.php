<!-- Content (Right Column) -->
    <div id="content" class="box">
      <div id="menu" class="box">
        <ul class="box">
          <li><a href="index.php?ir=clases&pag=1"><span>{listar}</span></a></li>
          <li><a href="index.php?ir=insertar_clase"><span>{insertar}</span></a></li>
          <li><a href="index.php?ir=eliminar_clase"><span>{eliminar}</span></a></li>
          <li><a href="index.php?ir=infomod&mod=clases"><span>{infoversion}</span></a></li>
        </ul>
      </div>
<!-- Table (TABLE) -->
      <h3 class="tit"><center>{titulo}</center></h3>
      {aviso}
      <h3 class="tit"><center>{nombre}</center></h3>
      <fieldset>
      <form action="index.php?ir=editar_clase" method="post">
        <table class="nostyle">
          <tr>
            <td style="width:70px;">{form_id}</td>
            <td><input type="text" size="40" name="id" id="id" class="input-text" value="{id}" readonly /></td>
          </tr>
          <tr>
            <td>{form_nombre}</td>
            <td><input type="text" size="40" name="nombre" id="nombre" value="{nombre}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_hp}</td>
            <td><input type="text" size="40" name="hp" id="hp" value="{hp}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_mp}</td>
            <td><input type="text" size="40" name="mp" id="mp" value="{mp}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_str}</td>
            <td><input type="text" size="40" name="str" id="str" value="{str}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_dex}</td>
            <td><input type="text" size="40" name="dex" id="dex" value="{dex}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_def}</td>
            <td><input type="text" size="40" name="def" id="def" value="{def}" class="input-text" /></td>
          </tr>
          <tr>
            <td class="va-top">{form_descripcion}</td>
            <td><textarea cols="75" rows="7" name="descripcion" id="descripcion" class="input-text">{descripcion}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" class="t-right">
              <input type="submit" nombre="registrar" id="registrar" class="input-submit" value="Submit" />
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
