<section>
    <table class="table table-hover">
        <thead class="">
        <tr>
            <th>Indentifiant</th>
            <th>Nom de l'equipe</th>
            <th>Logo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($teams as $team){
            ?>
            <tr>
                <td><?= $team->getId() ?></td>
                <td><a href="<?= PATH ?>/index.php/team/getAll/<?= $team->getId()?>"><?= $team->getTeamName() ?></a></td>
                <td><?= $team->getTeamLogo() ?></td>
                <td>
                    <a href="<?= PATH ?>/index.php/team/delete/<?= $team->getId()?>" class="fa fa-trash"></a>
                    <a href="<?= PATH ?>/index.php/team/getAll/<?= $team->getId()?>" class="fa fa-pencil-square-o"></a>
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
    <form method="POST" class="form-horizontal">
        <fieldset>
            <legend><?= (isset($teamUpdate))? 'Modification d\'une équipes':'Création de nouvelles équipes'; ?></legend>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="teamName">Nom de l'équipe</label>
                <div class="col-sm-10">
                    <input type="text"
                           name="teamName"
                           id="teamName"
                           class="form-control"
                           value="<?= $teamUpdate->getTeamName() ?>"
                           placeholder="Saisissez le nom de l'équipe">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="teamLogo">Logo</label>
                <div class="col-sm-10">
                    <input type="text"
                           name="teamLogo"
                           id="teamLogo"
                           class="form-control"
                           value="<?= $teamUpdate->getTeamLogo() ?>"
                           placeholder="L'image de l'équipe">
                </div>
            </div>
            <div class="col-sm-offset-10 col-sm-2">
                <input type="submit" class="form-control" value="Valider">
            </div>
        </fieldset>
    </form>
</section>
