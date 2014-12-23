DEG-Frameworks
==============

DEG Frameworks

Para instalar esta versión básica solo es necesarioseguir los siguientes pasos:

1º crear una base de datos e importar el contenido del archivo instalador.sql
2º en el archivo lib/PDO_class.php cambiar los valores de conexión de su servidor
local en las líneas 64, 65, 66 y 67 o si prefiere descomentar la linea 63 y editar
el archivo lib/constantes.php, es recomendable que el archivo lib/constantes.php
solo se utilice para la conexión en un servidor online y los datos en el archivo
lib/PDO_class.php se utilicen para el servidor local.
