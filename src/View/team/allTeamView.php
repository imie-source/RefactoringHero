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
                <td><?= $team->getTeamId() ?></td>
                <td><a href=/<?= PATH ?>/index.php/team/getOne/<?= $team->getTeamId()?>"><?= $team->getTeamName() ?></a></td>
                <td><?= $team->getTeamLogo() ?></td>
                <td>
                    <a href="/<?= PATH ?>/index.php/team/delete/<?= $team->getTeamId()?>" class="fa fa-trash"></a>
                    <a href="/<?= PATH ?>/index.php/team/copy/<?= $team->getTeamId()?>" class="fa fa-clone"></a>
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
    <form action="<?= (isset($teamUpdate))? "/". PATH ."/index.php/team/update/".$teamUpdate->getTeamId(): "/".PATH."/index.php/team/insert"; ?>" method="POST" class="form-horizontal">
        <fieldset>
            <legend><?= (isset($teamUpdate))? 'Modification d\'une équipes':'Création de nouvelles équipes'; ?></legend>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="teamName">Nom de l'équipe</label>
                <div class="col-sm-10">
                    <input type="text"
                           name="teamName"
                           id="teamName"
                           class="form-control"
                           value="<?= (isset($teamUpdate))? $teamUpdate->getTeamName():''; ?>"
                           placeholder="saissez le nom de l'équipe">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="teamLogo">Logo</label>
                <div class="col-sm-10">
                    <input type="text"
                           name="teamLogo"
                           id="teamLogo"
                           class="form-control"
                           value=""
                           placeholder="L'image de l'équipe">
                </div>
            </div>
            <div class="col-sm-offset-10 col-sm-2">
                <input type="submit" class="form-control" value="Valider">
            </div>
        </fieldset>
    </form>
</section>
