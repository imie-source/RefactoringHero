<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/style/style.css">

    <title>Super Hero Land</title>
</head>
<body>

<header>
    <h1>Bienvenue dans un monde de super heros</h1>
</header>
<hr>
<?php include_once ('./src/View/common/nav.php');?>
<hr>
<main>

    <div>
        <?php echo $content ?>
    </div>
</main>
<hr>
<footer>
    tous droits réservés pour IMIE
</footer>
</body>
</html>