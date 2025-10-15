<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página no encontrada</title>
    <link rel="stylesheet" href="<?=DIRECTORIO_CSS?>404.css" /><!-- Aplico css externo -->

</head>
<body>
<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class='c'>
    <div class='_404'>404</div>
    <hr>
    <div class='_1'><?=$_SERVER['REQUEST_URI']?> </div>
    <div class='_2'>NO ENCONTRADA</div>
    <a class='btn' href='/'>INICIO</a>
</div>

</body>
</html>