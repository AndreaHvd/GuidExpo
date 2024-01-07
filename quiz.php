<?php
include_once("head.php");
include_once("function.php");
?>

<body>
    <?php
    include_once("menu.php");

    $id = $_GET['id'];
    $panneau = get_panneaux_by_id($id);
    $next = "panneau.php?id=";
    $nextId = $id + 1;
    if ($nextId >= 15) {
        $next = 'carte.php';
    } else {
        $next .= $nextId;
    }

    ?>

    <div class="background">
        <div class="conteneur__panneau-avec-audio">
            <img src="assets/quiz.png" alt="logo quiz">
            <h1>Quiz: Pierre et Marie Curie</h1>
            <h3><?= $panneau['question'] ?></h3>
            <form type="get" action="panneau.php" class="reponses" name="reponses">


                <?php
                foreach ($panneau['reponse'] as $key => $reponse) {
                ?>
                    <div>
                        <input type="checkbox" id="toggle__<?= $key ?>" value="<?= $key ?>" name="reponse"></input>
                        <label class="reponses__bouton" for="toggle__<?= $key ?>"><?= $reponse ?></label>
                    </div>
                <?php
                }
                ?>
                <input type="hidden" name="id" value="<?= $nextId ?>">
                <input type="submit" class="bouton__valider__reponses" id="valider" value="Valider">
                <script>
                    let toggle_1 = document.getElementById('toggle__1');
                    let toggle_2 = document.getElementById('toggle__2');
                    let toggle_3 = document.getElementById('toggle__3');

                    function blocked(e) {
                        e.preventDefault();
                    }
                </script>
                <?php
                if ($panneau['vu'] != true) {
                ?>

                    <script>
                        let valider = document.getElementById('valider');
                        let form = document.forms.reponses;

                        function toggle_1_click() {
                            if (toggle_1.checked) {
                                toggle_2.checked = false;
                                toggle_3.checked = false;
                                valider.style.display = 'inline-block';
                            } else if (!toggle_1.checked) {
                                valider.style.display = 'none';
                            }
                        }

                        function toggle_2_click() {
                            if (toggle_2.checked) {
                                toggle_1.checked = false;
                                toggle_3.checked = false;
                                valider.style.display = 'inline-block';
                            } else if (!toggle_2.checked) {
                                valider.style.display = 'none';
                            }
                        }

                        function toggle_3_click() {
                            if (toggle_3.checked) {
                                toggle_1.checked = false;
                                toggle_2.checked = false;
                                valider.style.display = 'inline-block';
                            } else if (!toggle_3.checked) {
                                valider.style.display = 'none';
                            }
                        }
                        toggle_1.addEventListener('click', toggle_1_click);
                        toggle_2.addEventListener('click', toggle_2_click);
                        toggle_3.addEventListener('click', toggle_3_click);
                    </script>
                <?php
                }
                ?>
            </form>
            <a class="passer__bouton" href="<?= $next ?>">
                <p class="passer__texte">Passer le Quiz</p>
            </a>
            <a class="bouton-fleche-marron next_page" href="#" style="display: none;">
                <img class="fleche-marron next_quiz" src="assets/fleche2-marron.png">
            </a>
            <?php
            if ($panneau['vu'] != true) {
            ?>
                <script>
                    let skip = document.querySelector('.passer__bouton');
                    let next = document.querySelector('.next_page');
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        let reponse = document.querySelector('input[type="checkbox"]:checked');
                        let reponse_valide = document.getElementById('toggle__<?= $panneau['valide'] ?>');
                        next.style.display = 'flex';
                        skip.style.display = 'none';



                        let reponses = document.querySelectorAll('input[type="checkbox"]');

                        toggle_1.removeEventListener('click', toggle_1_click);
                        toggle_2.removeEventListener('click', toggle_2_click);
                        toggle_3.removeEventListener('click', toggle_3_click);
                        valider.style.display = 'none';
                        toggle_1.addEventListener('click', blocked);
                        toggle_2.addEventListener('click', blocked);
                        toggle_3.addEventListener('click', blocked);
                        reponses.forEach(function(element) {
                            if (element.checked && element.value == reponse_valide) {
                                let label = element.nextElementSibling;
                                label.style.backgroundColor = '#B4E231';
                            } else if (element.checked && element.value != reponse_valide) {
                                let label = element.nextElementSibling;
                                label.style.backgroundColor = '#FF7474';
                                label = reponse_valide.nextElementSibling;
                                label.style.backgroundColor = '#B4E231';
                            }



                        });
                    });
                    next.addEventListener('click', function(e) {
                        e.preventDefault();
                        form.submit();
                    });
                </script>
            <?php
            }
            if ($panneau['vu'] == true) {
            ?>
                <script>
                    let skip = document.querySelector('.passer__bouton');
                    let next = document.querySelector('.next_page');
                    let reponse = document.getElementById('toggle__<?= $panneau['repondu'] ?>');
                    let reponse_valide = document.getElementById('toggle__<?= $panneau['valide'] ?>');
                    next.style.display = 'flex';
                    skip.style.display = 'none';
                    let reponses = document.querySelectorAll('input[type="checkbox"]');
                    toggle_1.addEventListener('click', blocked);
                    toggle_2.addEventListener('click', blocked);
                    toggle_3.addEventListener('click', blocked);

                    if (<?= $panneau['repondu'] ?> == <?= $panneau['valide'] ?>) {
                        let label = reponse.nextElementSibling;
                        label.style.backgroundColor = '#B4E231';
                    } else {
                        let label = reponse.nextElementSibling;
                        label.style.backgroundColor = '#FF7474';
                        label = reponse_valide.nextElementSibling;
                        label.style.backgroundColor = '#B4E231';
                    }
                    next.attributes.href.value = '<?= $next ?>';
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>