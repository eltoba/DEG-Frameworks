<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class="tit">{titulo}</h3>
      {aviso}
      <h3 class="tit"><center>{config}</center></h3>
      <fieldset>
      <form action="index.php?ir=editar_config" method="POST">
        <table class="nostyle">
          <tr>
            <td style="width:70px;">{form_id}</td>
            <td><input type="text" size="40" name="id" id="id" class="input-text" value="{id}" readonly /></td>
          </tr>
          <tr>
            <td>{form_config}</td>
            <td><input type="text" size="40" name="config" id="config" value="{config}" class="input-text" /></td>
          </tr>
          <tr>
            <td>{form_valor}</td>
            <td><input type="text" size="40" name="valor" id="valor" value="{valor}" class="input-text" /></td>
          </tr>
          <tr>
            <td colspan="2" class="t-right">
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
