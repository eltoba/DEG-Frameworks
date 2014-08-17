<!-- Content (Right Column) -->
    <div id="content" class="box">
      <div id="menu" class="box">
        <ul class="box">
          <li><a href="index.php?ir=infomod&pag=1"><span>{listar}</span></a></li>
          <li><a href="index.php?ir=insertar_infomod"><span>{insertar}</span></a></li>
          <li><a href="index.php?ir=eliminar_infomod"><span>{eliminar}</span></a></li>
          <li><a href="index.php?ir=infomod&mod=infomod"><span>{infoversion}</span></a></li>
        </ul>
      </div>
<!-- Table (TABLE) -->
      <h3 class="tit">{titulo}</h3>
      {aviso}
      <h3 class="tit"><center>{nombre}</center></h3>
      <fieldset>
      <form action="index.php?ir=insertar_infomod" method="post">
        <table class="nostyle">
          <tr>
            <td>{form_id}</td>
            <td>{id}</td>
          </tr>
          <tr>
            <td>{form_nombre}</td>
            <td><input type="text" size="40" name="nombre" id="nombre" class="input-text" /> - {nombre}</td>
          </tr>
          <tr>
            <td>{form_}</td>
            <td><input type="text" size="40" name="hp" value="100" id="hp" class="input-text" /> - {hp}</td>
          </tr>
          <tr>
            <td>{form_mp}</td>
            <td><input type="text" size="40" name="mp" value="100" id="mp" class="input-text" /> - {mp}</td>
          </tr>
          <tr>
            <td>{form_str}</td>
            <td><input type="text" size="40" name="str" value="100" id="str" class="input-text" /> - {str}</td>
          </tr>
          <tr>
            <td>{form_dex}</td>
            <td><input type="text" size="40" name="dex" value="100" id="dex" class="input-text" /> - {dex}</td>
          </tr>
          <tr>
            <td>{form_def}</td>
            <td><input type="text" size="40" name="def" value="100" id="def" class="input-text" /> - {def}</td>
          </tr>
          <tr>
            <td class="va-top">{form_descripcion}</td>
            <td><textarea cols="75" rows="7" name="descripcion" id="descripcion" class="input-text">{descripcion}</textarea></td>
          </tr>
          <tr>
            <td colspan="2" class="t-right">
              <input type="submit" name="action" class="input-submit" value="insertar" />
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
