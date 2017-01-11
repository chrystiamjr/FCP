<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="../controller/testeCtrl.php">
    <input type="hidden" name="sOP" value="remover">
    <input type="hidden" name="id_evento" value="<?php $_GET['id_evento'];?>">
<h4>Deseja Remover Este Evento?</h4>
<input type="submit" value="Remover">
</form>

</body>
</html>
