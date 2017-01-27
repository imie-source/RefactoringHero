<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 11:54
 */



if (isset($_GET)&&!empty($_GET)){
    if ($_GET['del']){
        $sql = "DELETE FROM super_hero.sh_hero WHERE hero_id = ?;";
        $params = [$_GET['id']];
        $con = new connexion();
        $con->requestDB($sql,$params);
        header('location: index.php');
    }
}



$result->closeCursor();


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super Hero</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<section>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Ajouter un super hero</legend>
        </fieldset>
        <div>
            <div class="form-group">
                <label for="heroFirstName" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" name="heroFirstName" id="heroFirstName" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="heroLastName" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" name="heroLastName" id="heroLastName" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="heroPseudo" class="col-sm-2 control-label">Identité Secrete</label>
                <div class="col-sm-10">
                    <input type="text" name="heroPseudo" id="heroPseudo" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="heroCountry" class="col-sm-2 control-label">Pays</label>
                <div class="col-sm-10">
                    <input type="text" name="heroCountry" id="heroCountry" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <input type="submit" class="btn btn-default" value="Ajouter">
                </div>
            </div>
        </div>

    </form>
</section>

</body>
</html>
