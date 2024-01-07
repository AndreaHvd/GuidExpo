<?php
include_once("head.php");
include_once("function.php");
if (isset($_POST['pseudo']) && isset($_POST['avatar'])) {
    $pseudo = $_POST['pseudo'];
    $avatar = $_POST['avatar'];
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['avatar'] = $avatar;
    $score = 0;
    add_profile($pseudo, $avatar, $score);
}
?>

<body>
    <div class="menu menu_expo">
        <form name="formulaire" class="Rechercher">
            <input class="recherche" type="text" placeholder="Rechercher une expo">
        </form>
    </div>
    <div class="return">
        <a href="profile.php" class="bouton-fleche">
            <svg class="bouton-fleche__fleche" width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="bouton-fleche__fleche" d="M8 1L2.36744 5.06796C0.709398 6.26543 0.7094 8.73457 2.36744 9.93204L8 14" stroke="#DA9B51" stroke-width="2" />
            </svg>
        </a>
    </div>
    <div class="flex main-column exposition">
        <h1>Nos Expositions</h1>
        <a class="panneau-exposition" href="carte.php">
            <img class="panneau-exposition__img" src="assets/img-expo-curie.png">
        </a>
        <a class="panneau-exposition" href="#">
            <img class="panneau-exposition__img" src="assets/img-expo-espace.png">
        </a>
        <a class="panneau-exposition" href="#">
            <img class="panneau-exposition__img" src="assets/img-expo-animaux.png">
        </a>
    </div>
</body>

</html>