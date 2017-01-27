
<section>
<h2>Liste des super heros</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Identité secrète</th>
            <th>Pays</th>
            <th>Equipe</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($heroes as $oneHero){ ?>
            <tr>
                <td><?= $oneHero->getHeroFirstName()?></td>
                <td><?= $oneHero->getHeroLastName()?></td>
                <td><?= $oneHero->getHeroPseudo()?></td>
                <td><?= $oneHero->getHeroCountry()?></td>
                <td><?= $oneHero->getHeroTeamId()->getTeamName()?></td>
                <td>
                    <a
                        href="/<?= PATH ?>/index.php/hero/delete/<?= $oneHero->getHeroID()?>"
                        class="fa fa-trash" aria-hidden="true">

                    </a>
                    <a
                        href="/<?= PATH ?>/index.php/hero/getOne/<?= $oneHero->getHeroID()?>"
                        class="fa fa-pencil" aria-hidden="true">

                    </a>
                </td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</section>
<hr>
<section>
    <form action="/<?= PATH ?>/index.php/hero/insert" method="post">
        <fieldset>
            <legend>Ajouter un super hero</legend>
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
        </fieldset>

        <fieldset>
            <legend>Equipe</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="heroTeamId">Equipe</label>
                <div class="col-sm-10">
                    <select name="heroTeamId" id="heroTeamId" class="form-control">
                        <?php
                        foreach ($teams as $team){
                            ?>
                            <option value="<?= $team->getTeamId() ?>"><?= $team->getTeamName()?></option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Pouvoir</legend>
            <?php
            foreach ($powers as $power){
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="heroPower<?= $power->getPowerId() ?>"><?= $power->getPowerName() ?></label>
                    <div class="col-sm-10 form-control">
                        <input type="checkbox" name="heroPower[]" id="heroPower<?= $power->getPowerId() ?>" value="<?= $power->getPowerId() ?>">
                        <input type="number" name="heroPowerLevel<?= $power->getPowerId() ?>" id="heroPowerLevel<?= $power->getPowerId() ?>" value="">
                    </div>
                </div>
                <?php
            }
            ?>
        </fieldset>
        <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
                <input type="submit" class="btn btn-default" value="Ajouter">
            </div>
        </div>
    </form>
</section>
