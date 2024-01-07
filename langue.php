<?php
include_once("head.php");
?>

<body>
    <div class="flex main-column">
        <img src="assets/GuidExpo_logo_blanc.png" alt="logo" class="logo__debut">
        <h1>Choisis ta langue</h1>
        <a class="langue__bouton" href="quiz_select.php?langue=francais">
            <p class="langue__bouton__texte">Français</p>
            <img class="langue__bouton__drapeau" src="assets/rectangle-france.png" alt="drapeau">
        </a>
        <a class="langue__bouton" href="quiz_select.php?langue=anglais">
            <p class="langue__bouton__texte">English</p>
            <img class="langue__bouton__drapeau" src="assets/rectangle-anglais.png" alt="drapeau">
        </a>
    </div>
</body>

</html>