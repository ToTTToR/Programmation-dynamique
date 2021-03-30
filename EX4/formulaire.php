<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Formulaire</title>
</head>

<body>
    <p>Modifier un score</p>
    <form id="creation-form" name="creation-form" method="post" action="modifier.php">
        <label for="valeur">Score</label>
        <input id="valeur" type="text" name="valeur" value="<?php echo $valeur?>" required aria-required="true" />
        <br>
        <label for="date">Date</label>
        <input id="date" type="date" name="date" value="<?php echo $date?>" required aria-required="true" />
        <br><br>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <button name="submit" type="submit" id="submit">Valider</button>
    </form>
</body>

<footer></footer>

</html>