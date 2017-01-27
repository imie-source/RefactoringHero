
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
        <?php foreach ($heroes as $oneHero): ?>
            <tr>
                <td><a href="<?= PATH ?>/index.php/hero/getOne/<?= $oneHero->getId()?>">
                    <?= $oneHero->getHeroFirstName()?>
                    </a>
                </td>
                <td><a href="<?= PATH ?>/index.php/hero/getOne/<?= $oneHero->getId()?>">
                    <?= $oneHero->getHeroLastName()?>
                </td>
                <td><?= $oneHero->getHeroPseudo()?></td>
                <td><?= $oneHero->getHeroCountry()?></td>
                <td><?= $oneHero->getHeroTeam()->getTeamName()?></td>
                <td>
                    <a
                        href="<?= PATH ?>/index.php/hero/delete/<?= $oneHero->getId()?>"
                        class="fa fa-trash" aria-hidden="true">
                    </a>
                    <a
                        href="<?= PATH ?>/index.php/hero/getAll/<?= $oneHero->getId()?>"
                        class="fa fa-pencil" aria-hidden="true">
                    </a>
                </td>
            </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
</section>
<hr>
<section>
    <form method="POST">
        <fieldset>
            <legend>Ajouter un super hero</legend>
            <div class="form-group">
                <label for="heroFirstName" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" name="heroFirstName" id="heroFirstName" class="form-control" placeholder="" value="<?= $heroUpdate->getHeroFirstName() ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="heroLastName" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" name="heroLastName" id="heroLastName" class="form-control" placeholder="" value="<?= $heroUpdate->getHeroLastName()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="heroPseudo" class="col-sm-2 control-label">Identité Secrete</label>
                <div class="col-sm-10">
                    <input type="text" name="heroPseudo" id="heroPseudo" class="form-control" placeholder="" value="<?= $heroUpdate->getHeroPseudo() ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="heroCountry" class="col-sm-2 control-label">Pays</label>
                <div class="col-sm-10">
                    <input type="text" name="heroCountry" id="heroCountry" class="form-control" placeholder="" value="<?= $heroUpdate->getHeroCountry()?>">
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
                            <option <?= ($heroUpdate->getId()) ? ($heroUpdate->getHeroTeam()->getTeamName() === $team->getTeamName() ? "selected" : "") : "" ?> value="<?= $team->getId() ?>"><?= $team->getTeamName()?></option>

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
                    <label class="col-sm-2 control-label" for="heroPower<?= $power->getId() ?>"><?= $power->getPowerName() ?></label>
                    <div class="col-sm-10 form-control">
                        <input type="checkbox" name="heroPower[]" id="heroPower<?= $power->getId() ?>" value="<?= $power->getId() ?>">
                        <input type="number" name="heroPowerLevel<?= $power->getId() ?>" id="heroPowerLevel<?= $power->getId() ?>" value="" min="0" max="10">
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
