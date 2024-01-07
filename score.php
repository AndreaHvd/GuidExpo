<?php
include_once("head.php");
include_once("function.php");
$_SESSION['pseudo'];
$_SESSION['avatar'];
$point = 2;
$profile = get_profiles();
$tmp = array();
foreach ($profile as &$ma) {
  $tmp[] = &$ma["points"];
}
array_multisort($tmp, SORT_DESC, $profile);
?>

<body class="flex main-column score">
  <?php
  include_once("menu.php");
  ?>
  <img class="coupe" src="assets/coupe.png" alt="coupe">
  <h1>TOP 5</h1>
  <p>Classement du jour</p>
  <?php
  for ($i = 0; $i < 5; $i++) {
    $id = $i + 1;
  ?>
    <div class="classement">
      <img class='avatar' src='assets/avatars/<?= $profile[$i]['avatar'] ?>.png' alt='avatar'>
      <p><?= $id ?></p>
      <p><?= $profile[$i]['pseudo'] ?></p>
      <p><?= $profile[$i]['points'] ?></p>
    </div>
  <?php
  };
  ?>
  <a class="bouton__chat" href="#"><img class="logo-tchat" src="assets/logo-tchat-blanc.png"></a>
  <p class="message-chat">Accède au tchat et discute de tes résultats avec les autres visiteurs !</p>
  <a class="bouton-fleche-marron" href="note.php">
    <img class="fleche-marron next_quiz" src="assets/fleche2-marron.png">
  </a>
</body>

</html>