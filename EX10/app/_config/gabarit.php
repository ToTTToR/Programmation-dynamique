<html>

<head>
    <meta charset="UTF-8" />
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <div id="bandeau">Navigation</div>
    <div id="auth">
        <?php
            if(!isset($_SESSION['mail'])){
              echo "<p><a href=\"../authentification/controleur.php?action=login\">Login</a> 
              - <a href=\"../utilisateur/controleur.php?action=creer\">S'enregistrer</a>";
            } else{
              echo $_SESSION['mail']." -
              <a href=\"../authentification/controleur.php?action=logout\">Logout</a></p>";
            }
          ?>
    </div>
    <div id="menu">menu</div>

    <div id="corps"><?php echo $corps; ?></div>
    <footer>MOOC AppDyn</footer>
</body>

</html>