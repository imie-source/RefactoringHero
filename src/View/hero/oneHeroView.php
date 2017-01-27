<section>
    <form action="/<?= PATH ?>/index.php/hero/update/<?= $heroDTO->getHeroId()?>" method="post">
        <fieldset>
            <legend>Modifier un super hero</legend>


        <div class="form-group">
            <label for="heroFirstName" class="col-sm-2 control-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $heroDTO->getHeroFirstName() ?>" name="heroFirstName" id="heroFirstName" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="heroLastName" class="col-sm-2 control-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $heroDTO->getHeroLastName()?>" name="heroLastName" id="heroLastName" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="heroPseudo" class="col-sm-2 control-label">Identité Secrete</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $heroDTO->getHeroPseudo() ?>" name="heroPseudo" id="heroPseudo" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label for="heroCountry" class="col-sm-2 control-label">Pays</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $heroDTO->getHeroCountry()?>" name="heroCountry" id="heroCountry" class="form-control" placeholder="">
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
                            <option value="<?= $team->getTeamId()?>"
                                    <?php
                                        if ($heroDTO->getHeroTeamId() == $team->getTeamId()){
                                            echo "selected";
                                        }
                                    ?>
                             >
                                <?= $team->getTeamName()?>
                            </option>

                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-8 col-sm-4">
                    <input type="submit" class="btn btn-default" value="Modifier">
                    <a href="/<?= PATH ?>/index.php/hero/getAll" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </fieldset>
    </form>
</section>