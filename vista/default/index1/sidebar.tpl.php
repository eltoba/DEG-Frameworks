<!-- SIDEBAR -->
<div id="aside">
    <div class="padding">
        <center>{saludo_segun_la_hora}</center>
        <center>{fecha_actual}</center>
    </div>
    <h3 class="title"><strong><center>Ingreso</center></strong></h3>
    <div class="padding">
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
                        <input type="submit" value="Entrar" id="entrar" class="boton">
                    </td>
                </tr>
            </table>
        </form>
        <hr width="90%" align="center" size="10" color="green">
        <center>
        <span class="btn1"><a href="index.php?ir=registrar" class="button">Registrarse</a> <a href="index.php?ir=recuperarClave" class="button">Recuperar</a></span>
        </center>
<!-- fin formulario de ingreso -->
    </div>
<!-- /padding -->
<!-- ABOUT -->
    <h3 class="title"><strong><center>Algo como webmaster</center></strong></h3>
    <div class="padding">
        <p class="box nomt">
            <img src="{ruta_plantilla}tmp/about-01.jpg" alt="" class="f-left"><!-- Photo: (c) Pierre Tourigny -->
            Mi nombre es Mauricio Jos&eacute; Tobares. Nacido el 10 de octubre de 1983, argentino, de la ciudad de Baradero Pcia de Bs. As.<br />
            <a href="index.php?contactos">Contactame</a>
        </p>
    </div>
<!-- /padding -->
<!-- Ultimos Usuarios -->
    <h3 class="title"><strong><center>ULTIMOS USUARIOS</center></strong></h3>
    <div class="padding">
            {UltimosUsuarios}
    </div>
<!-- /padding -->
<!-- SPONSORS -->
<!--
    <h3 class="title"><strong><big><center>Sponsors</center></big></strong></h3>
    <div class="padding">
        <ul class="sponsors">
            <li class="first">
                <a href="http://www.entrelo.com/">Entrelo</a><br />
                Web templates stars, more than 1 mio. downloads
            </li>
            <li>
                <a href="http://www.templatesdock.com/">TemplatesDock</a><br />
                Premium free web templates for download
            </li>
            <li>
                <a href="http://www.appstemplates.com/">AppsTemplates</a><br />
                iPhone &amp; iPad web templates for AppStore apps
            </li>
            <li class="last">
                <a href="http://www.adminsquare.com/">AdminSquare</a><br />
                Customizable admin templates for web applications
            </li>
        </ul>
    </div>
IMPORTANTE:
todos los contenidos comentados son residuo del original, pero que de ninguna manera
podrían ir de la forma original ya que no se adaptan al 100% en lo que se busca con DEG
-->
<!-- /padding -->
<!-- Advertise Whith Us -->
<!--
<h3 class="title"><strong><center>Advertise with us</center></strong></h3>
    <div class="padding">
        <ul class="ads box">
            <li><a href="#"><img src="{ruta_plantilla}tmp/125x125.gif" alt=""></a></li>
            <li class="last"><a href="#"><img src="{ruta_plantilla}tmp/125x125.gif" alt=""></a></li>
        </ul>
    </div>
IMPORTANTE:
todos los contenidos comentados son residuo del original, pero que de ninguna manera
podrían ir de la forma original ya que no se adaptan al 100% en lo que se busca con DEG
-->
<!-- /padding -->
</div>
<!-- /aside -->
</div>
<!-- /section -->
