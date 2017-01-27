<section class="container-fluid">
    <h2>Liste des pouvoirs</h2>
    <table class="table table-hover">
        <thead class="">
        <tr>
            <th>Indentifiant</th>
            <th>Nom</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($powers as $power){
            ?>
            <tr>
                <td><?= $power->getPowerId() ?></td>
                <td><a href=/<?= PATH ?>/index.php/power/getOne/<?= $power->getPowerId()?>"><?= $power->getPowerName() ?></a></td>
                <td><?= $power->getPowerDesc() ?></td>

                <td>
                    <a href="/<?= PATH ?>/index.php/power/delete/<?= $power->getPowerId()?>" class="fa fa-trash"></a>
                    <a href="/<?= PATH ?>/index.php/power/getOne/<?= $power->getPowerId()?>" class="fa fa-pencil-square-o"></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>

    </table>

</section>
<hr>
<section class="container-fluid">
<form action="<?= (isset($powerUpdate))? "/". PATH ."/index.php/power/update/".$powerUpdate->getPowerId(): "/".PATH."/index.php/power/insert"; ?>" method="POST" class="form-horizontal">
    <fieldset>
        <legend><?= (isset($powerUpdate))? 'Modification d\'un super pouvoir':'Création de nouveaux supers pouvoirs'; ?></legend>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="powerName">Nom du pouvoir</label>
            <div class="col-sm-10">
                <input type="text"
                       name="powerName"
                       value="<?= (isset($powerUpdate))? $powerUpdate->getPowerName():''; ?>"
                       id="powerName"
                       class="form-control"
                       placeholder="saissez le nom d'un pouvoir">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="powerDesc">Description</label>
            <div class="col-sm-10">
                <input type="text"
                       name="powerDesc"
                       value="<?= (isset($powerUpdate))? $powerUpdate->getPowerDesc():''; ?>"
                       id="powerDesc"
                       class="form-control"
                       placeholder="Décrivez le pouvoir">
            </div>
        </div>
        <div class="col-sm-offset-10 col-sm-2">
            <input type="submit" class="form-control" value="Valider">
        </div>
    </fieldset>
</form>
</section>
