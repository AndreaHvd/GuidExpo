<?php
include_once("head.php");
include_once("function.php");

?>

<body>
    <div class="menu">
        <img src="assets/GuidExpo_logo_blanc.png" alt="logo" class="logo">
    </div>
    <div class="return">
        <a href="expo.php" class="bouton-fleche">
            <svg class="bouton-fleche__fleche" width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="bouton-fleche__fleche" d="M8 1L2.36744 5.06796C0.709398 6.26543 0.7094 8.73457 2.36744 9.93204L8 14" stroke="#DA9B51" stroke-width="2" />
            </svg>
        </a>
    </div>
    <div class="carte">
        <img src="assets/parcours-seul.svg" alt="carte">
    </div>
    <div class="bouton-carte">
        <?php
        for ($i = 1; $i <= 15; $i++) {
            $panneau = get_panneaux_by_id($i);
            if ($panneau['vu'] == true) {
                echo ("<a class='bouton__etape__faite bouton-$i' href='panneau.php?id=$i'>
                <p>$i</p>
            </a>");
            } else {
                echo ("<a class='bouton__etape__pasfaite bouton-$i' href='panneau.php?id=$i'>
                <p>$i</p>
            </a>");
            }
        }
        ?>
    </div>
    <!--Terminer visite-->
    <div class="conteneur__terminer-visite">
        <a href="score.php" class="form__bouton-terminer-v2">Terminer ma visite</a>
    </div>
</body>

</html>