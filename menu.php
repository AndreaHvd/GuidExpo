<?php
include_once("function.php");
$server = $_SERVER['REQUEST_URI'];
$panneau = get_all_panneaux();

if (str_contain($server, 'panneau')) {
    $id = $_GET['id'];
    if ($id == 1) {
        $back = "carte.php";
    } elseif ($id == 2) {
        $back = "panneau.php?id=1";
    } else {
        $id = $id - 1;
        if ($panneau[$id]['vu'] == 1) {
            $back = "quiz.php?id=$id";
        } else {
            $back = "panneau.php?id=$id";
        }
    }
} elseif (str_contain($server, 'quiz')) {
    $id = $_GET['id'];
    $back = "panneau.php?id=$id";
} elseif (str_contain($server, 'score')) {
    $back = "carte.php";
} elseif (str_contain($server, 'note')) {
    $back = "score.php";
}
?>

<div class="menu">
    <a class="bouton-fleche-marron" href="<?= $back ?>">
        <img class="fleche-marron" src="assets/fleche2-marron.png">
    </a>

    <img src="assets/GuidExpo_logo_blanc.png" alt="logo" class="logo">

    <a href="carte.php">
        <img class="bouton-parcours" src="assets/target.svg" />
    </a>
</div>
<div class="separation"></div>