<?php
include_once("head.php");
include_once("function.php");
?>

<body class="panneau-quiz">
    <?php
    include_once("menu.php");

    $id = $_GET['id'];
    $panneau = get_panneaux_by_id($id);
    $panneaux = get_all_panneaux();
    $id_before = $id - 1;
    if ($id_before > 1) {
        $panneau_before = get_all_panneaux();
        if (isset($_GET['reponse'])) {
            $reponse = $_GET['reponse'];
            $panneau_before[$id_before]['vu'] = true;
            $panneau_before[$id_before]['repondu'] = $reponse;
            $newJsonString = json_encode($panneau_before);
            file_put_contents('js/panneaux.json', $newJsonString);
            if ($reponse == $panneaux[$id - 1]['valide']) {
                $profile = get_profiles();
                foreach ($profile as $key => $element) {
                    if ($element['pseudo'] == $_SESSION['pseudo']) {
                        $profile[$key]['points'] = $element['points'] + 1;;
                        $newJsonString = json_encode($profile);
                        file_put_contents('js/profile.json', $newJsonString);
                    }
                }
            }
        }
    }

    ?>
    <div class="background">
        <div class='conteneur__panneau-avec-audio'>

            <?php
            echo ("<h2>" . $id . "." . $panneau["name"] . "</h2>");
            echo ("<img src='" . $panneau['panneau'] . "' alt='panneau' class='panneau-avec-audio'>");
            ?>
            <div class="conteneur-audio">
                <script src="js/mainAudio.js"></script>
                <div class="time">
                    <span id="aNow"></span> / <span id="aTime"></span>
                </div>
                <div id="back"><input id="duration" type="range" min="0" max="100" value="0" step="1"></div>
                <div class="play-pause"></div>
                <?php
                if ($id == 2) {
                    $panneaux[1]['vu'] = true;
                    $newJsonString = json_encode($panneaux);
                    file_put_contents('js/panneaux.json', $newJsonString);
                }
                if ($id == 1) {
                    $next = "panneau.php?id=2&reponse=0";
                } else {
                    $next = "quiz.php?id=$id";
                }
                ?>
                <a href=<?= $next ?> class="form__bouton-terminer-v2 suivant">Suivant</a>

                <script>
                    window.addEventListener('load', function() {
                        audioSetup("<?= $panneau["audio"] ?>", <?= $panneau["vu"] ?>);
                    });
                </script>
            </div>

        </div>
    </div>


</body>

</html>