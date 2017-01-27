<section>

    <h2><?= $heroDTO->getHeroFirstName() ?> <?= $heroDTO->getHeroLastName()?></h2>
    <ul>
        <li>Identité Secrète : <?= $heroDTO->getHeroPseudo() ?></li>
        <li>Pays : <?= $heroDTO->getHeroCountry()?></li>
        <li>Équipe : <?= $heroDTO->getHeroTeam()->getTeamName()?></li>
    </ul>
    <img alt="<?= $heroDTO->getHeroTeam()->getTeamName() ?>" src="<?= $heroDTO->getHeroTeam()->getTeamLogo() ?>" />
    <h3>Pouvoirs :</h3>
    <ul>
        <?php foreach($heroDTO->getSuperPowers() as $heroPowers): ?>
            <li>
                <strong><?= $heroPowers->getPower()->getPowerName() ?></strong>
                <progress max="10" value="<?= $heroPowers->getHeroPowerLevel() ?>"></progress>
            </li>
        <?php endforeach; ?>
    </ul>