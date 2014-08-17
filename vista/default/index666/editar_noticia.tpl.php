<!-- Content (Right Column) -->
    <div id="content" class="box">
        {menu_seccion}
<!-- Table (TABLE) -->
      <h3 class="tit">{titulo}</h3>
      {aviso}
      <h3 class="tit"><center>{form_titulo} {titulo}</center></h3>
      <fieldset>
      <form action="index.php?ir=editar_noticia" method="post">
        <table class="nostyle">
          <tr>
            <td style="width:70px;">{form_id}</td>
            <td><input type="text" size="40" name="id" id="id" class="input-text" value="{id}" readonly></td>
          </tr>
          <tr>
            <td>{form_titulo}</td>
            <td><input type="text" size="40" name="titulo" id="titulo" value="{titulo}" class="input-text" /></td>
          </tr>
          <tr><td colspan="2"><hr /></td></tr>
          <tr>
            <td colspan="2">
                {form_copete} <input readonly type="text" name="remLen300" size="3" maxlength="3" value="300"><br />
                <textarea cols="75" rows="7" name="copete" id="copete" class="input-text"
                          wrap="physical"
                          onKeyDown="textCounter(this.form.copete,this.form.remLen300,300);"
                          onKeyUp="textCounter(this.form.copete,this.form.remLen300,300);">{copete}</textarea><br />
            </td>
          </tr>
          <tr>
            <td colspan="2">
                {form_cuerpo} <input readonly type="text" name="remLen2500" size="3" maxlength="3" value="2500"><br />
                <textarea cols="75" rows="7" name="cuerpo" id="cuerpo" class="input-text"
                          wrap="physical"
                          onKeyDown="textCounter(this.form.cuerpo,this.form.remLen2500,2500);"
                          onKeyUp="textCounter(this.form.ccuerpo,this.form.remLen2500,2500);">{cuerpo}</textarea>
            </td>
          </tr>
          <tr><td colspan="2"><hr /></td></tr>
          <tr>
            <td>{form_autor}</td>
            <td><input type="text" size="40" name="autor" id="autor" value="{autor}" class="input-text" /></td>
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
