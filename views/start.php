<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_TITLE; ?></title>
</head>
<body>
<div>
    <h1>Trouve le mot en moins de 8 coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte <?= $_SESSION['nbLetters']; ?> lettres&nbsp;: <?= $_SESSION['replacementString'] ?></p>
</div>
<div>
    <img src="images/pendu<?= $_SESSION['tryels']; ?>.gif"
         alt="" width="300" height="300">
</div>
<div>
    <p>Voici les lettres que tu as déjà essayées&nbsp;: <?= $_SESSION['tryedLetters']; ?></p>
</div>
<?php if ($_SESSION['tryels'] >= 8): ?>
    <div>
        <p class="bg-danger lead">OOOps&nbsp;! Tu sembles bien mort&nbsp;! Le mot à trouver était
            «&nbsp;<b><?= $_SESSION['word']; ?></b>&nbsp;». <a href="index.php?restart=true">Recommence&nbsp;!</a>
        </p>
    </div>
<?php else: ?>
    <form action="index.php"
          method="post">
        <fieldset>
            <legend>Il te reste <?= MAX_TRIALS - $_SESSION['tryels']; ?> essais pour sauver ta peau
            </legend>
            <div>
                <label for="triedLetter">Choisis ta lettre</label>
                <select name="triedLetter"
                        id="triedLetter">
                    <?php foreach ($_SESSION['letters'] as $letter => $val): ?>
                        <?php if ($val): ?>
                            <option value="<?= $letter ?>"><?= $letter; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <input type="submit"
                       value="Essayer cette lettre">
            </div>
        </fieldset>
    </form>
<?php endif; ?>
</body>
</html>