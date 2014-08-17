<!-- COLUMNS -->
<div id="section" class="box">
<!-- CONTENT -->
    <div id="content">
<!-- /topstory -->
        <div id="topstory" class="box">
            <h1><a href="#">{titulo_introduccion}</a></h1>
            <hr />
            {aviso}
            <hr />
            <form action="index.php?ir=registrar" method="post">
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
                            <td width="25%">{titulo_clave}</td>
                            <td width="75%"><input type="password" name="clave1" id="clave1"></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_reclave}</td>
                            <td width="75%"><input type="password" name="clave2" id="clave2" /></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_email}</td>
                            <td width="75%"><input type="text" name="email1" id="email1"></td>
                        </tr>
                        <tr>
                            <td width="25%">{titulo_remail}</td>
                            <td width="75%"><input type="text" name="email2" id="email2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><center><input type="submit"  name="registrar" id="registrar" value="{titulo_valueform}" /></center></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
<!-- /padding -->
    </div>
<!-- /content -->