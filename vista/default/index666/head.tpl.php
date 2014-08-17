<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-language" content="en" />
  <meta name="robots" content="noindex,nofollow" />
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/reset.css" />
  <!-- RESET -->
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/main.css" />
  <!-- MAIN STYLE SHEET -->
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/2col.css" title="2col" />
  <!-- DEFAULT: 2 COLUMNS -->
  <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/1col.css" title="1col" />
  <!-- ALTERNATE: 1 COLUMN -->
  <!--[if lte IE 6]>
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/main-ie6.css" />
  <![endif]-->
  <!-- MSIE6 -->
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/style.css" />
  <!-- GRAPHIC THEME -->
  <link rel="stylesheet" media="screen,projection" type="text/css" href="{ruta_plantilla}css/mystyle.css" />
  <link rel="shortcut icon" href="{ruta_plantilla}/favicon.ico">
  <!-- WRITE YOUR CSS CODE HERE -->
  <script type="text/javascript" src="{ruta_plantilla}js/jquery.js"></script>
  <script type="text/javascript" src="{ruta_plantilla}js/switcher.js"></script>
  <script type="text/javascript" src="{ruta_plantilla}js/toggle.js"></script>
  <script type="text/javascript" src="{ruta_plantilla}js/ui.core.js"></script>
  <script type="text/javascript" src="{ruta_plantilla}js/ui.tabs.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $(".tabs > ul").tabs();
      });
  </script>
  <script type="text/javascript">
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit); // otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}
</script>
  <title>{tituloweb}</title>
</head>
<body>
