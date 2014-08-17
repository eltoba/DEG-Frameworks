<!-- Content (Right Column) -->
    <div id="content" class="box">
    {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class="tit"><center>{titulo}</center></h3>
      {aviso}
      <fieldset>
      <form action="index.php?ir=insertar_config" method="post">
        <table class="nostyle">
          <tr>
            <td>{form_id}</td>
            <td>{id}</td>
          </tr>
          <tr>
            <td>{form_config}</td>
            <td><input type="text" size="40" name="config" id="config" class="input-text" value="{config}"/></td>
          </tr>
          <tr>
            <td>{form_valor}</td>
            <td><input type="text" size="40" name="valor" id="valor" class="input-text" value="valor"/></td>
          </tr>
          <tr>
            <td colspan="2" class="t-right">
              <center><input type="submit" name="registrar" id="registrar" class="input-submit" value="insertar" /></center>
            </td>
          </tr>
        </table>
      </form>
      </fieldset>
    </div>
<div id="content" class="box">
    <p>Aqu&iacute; deber&iacute;a ir la explicaci&oacute;n de para que sirve el m&oacute;dulo (o secci&oacute;n del m&oacute;dulo)</p>
</div>
  </div>
  <hr class="noscreen" />
<!-- /content -->
<!-- /cols -->
