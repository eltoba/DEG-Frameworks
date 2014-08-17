<!-- COLUMNS -->
<div id="section" class="box">
<!-- CONTENT -->
    <div id="content">
<!-- formulario de ingreso -->
        <form action="index.php?ir=login" method="POST" class="miform">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" name="usuario" id="usuario"></td>
                </tr>
                <tr>
                    <td>Clave:</td>
                    <td><input type="password" name="clave" id="clave"></td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="recordar" id="recordar"><span style="color:#000; font-size:12px;">Recordar</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Entrar" id="entrar" class="boton"> | <a href="index.php?ir=registrar">Registrarse</a>
                    </td>
                </tr>
            </table>
        </form><br />
        {aviso_de_retorno}
<!-- fin formulario de ingreso -->
        <h3 class="title"><strong><center>Recuperar clave</center></strong></h3>
<!-- formulario de recuperación de contraseña -->
        <form action="index.php?ir=recuperarclave" method="post">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="usuario" id="usuario" size="20"></td>
                </tr>
                <tr>
                    <td collspan="2"><input type="submit" value="Re-Send"></td>
                </tr>
            </table>
        </form>
<!-- fin de formulario de recuperación de contraseña -->
    </div>
