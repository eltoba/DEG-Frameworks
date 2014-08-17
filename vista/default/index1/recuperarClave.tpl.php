<!-- COLUMNS -->
<div id="section" class="box">
<!-- CONTENT -->
    <div id="content">
<!-- /topstory -->
        <div id="topstory" class="box">
            <h1><a href="">{titulo_recuperarClave}</a></h1>
            <hr />{aviso}<hr />
<!-- formulario de recuperación de contraseña -->
            <form action="index.php?ir=recuperarClave" method="post">
                <table>
                    <tr>
                        <td>{titulo_usuario}</td>
                        <td><input type="text" name="usuario" id="usuario" size="20"></td>
                    </tr>
                    <tr>
                        <td>{titulo_email}</td>
                        <td><input type="text" name="email" id="email" size="20" /></td>
                    </tr>
                    <tr>
                        <td collspan="2"><input type="submit" name="enviar" id="enviar" value="ENVIAR"></td>
                    </tr>
                </table>
            </form>
<!-- fin de formulario de recuperación de contraseña -->
        </div>
    </div>