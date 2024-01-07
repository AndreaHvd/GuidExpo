<?php
include_once("head.php");
?>

<body>
    <div class="return">
        <a href="langue.php" class="bouton-fleche">
            <svg class="bouton-fleche__fleche" width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="bouton-fleche__fleche" d="M8 1L2.36744 5.06796C0.709398 6.26543 0.7094 8.73457 2.36744 9.93204L8 14" stroke="#DA9B51" stroke-width="2" />
            </svg>
        </a>
    </div>
    <div class="main-container">
        <img src="assets/GuidExpo_logo_blanc.png" alt="logo" class="logo__debut">
        <h1 class="quiz__toggle__title">Quelle version souhaites-tu ?</h1>
        <div class="flex main-column select">
            <div class="flex main-column">
                <input type="checkbox" id="toggle__yes"></input>
                <label class="choice flex main-column" for="toggle__yes">La version <strong>classique</strong> de notre audio guide</label>
            </div>
            <div class="flex main-column">
                <input type="checkbox" id="toggle__no"></input>
                <label class="choice flex main-column" for="toggle__no">
                    <p>La version <strong>simplifiée*</strong> de notre audio guide</p>
                    <p class="little">*Conseillée pour les enfants</p>
                </label>
            </div>
            <p class="ecouteurs">Si tu en as, penses à prendre tes écouteurs !</p>
            <form name="next" action="profile.php" method="post">
                <input name="mode" type="hidden" value="">
                <button class="bouton-fleche bouton-fleche-v2" id="next">
                    <svg class="bouton-fleche__fleche bouton-fleche__fleche-v2" width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 1L2.36744 5.06796C0.709398 6.26543 0.7094 8.73457 2.36744 9.93204L8 14" stroke="#DA9B51" stroke-width="2" />
                    </svg>
                </button>
            </form>
            <script>
                let toggle_yes = document.querySelector('#toggle__yes');
                let toggle_no = document.querySelector('#toggle__no');
                let p = document.querySelector('.ecouteurs');
                let next = document.getElementById('next');
                let form = document.forms.next;
                toggle_yes.addEventListener('click', function() {
                    if (toggle_yes.checked) {
                        form.mode.value = 'normal';
                        toggle_no.checked = false;
                        p.style.display = 'none';
                        next.style.display = 'flex';
                    } else if (!toggle_yes.checked) {
                        p.style.display = 'block';
                        next.style.display = 'none';
                    }
                });
                toggle_no.addEventListener('click', function() {
                    if (toggle_no.checked) {
                        form.mode.value = 'simple';
                        toggle_yes.checked = false;
                        p.style.display = 'none';
                        next.style.display = 'flex';
                    } else if (!toggle_no.checked) {
                        p.style.display = 'block';
                        next.style.display = 'none';
                    }
                });
            </script>
        </div>

    </div>
</body>

</html>