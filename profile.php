<?php
include_once("head.php");
?>

<body>
    <div class="return">
        <a href="quiz_select.php" class="bouton-fleche">
            <svg class="bouton-fleche__fleche" width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="bouton-fleche__fleche" d="M8 1L2.36744 5.06796C0.709398 6.26543 0.7094 8.73457 2.36744 9.93204L8 14" stroke="#DA9B51" stroke-width="2" />
            </svg>
        </a>
    </div>
    <div class="flex main-column main-container">
        <img src="assets/GuidExpo_logo_blanc.png" alt="logo" class="logo__debut">
        <h1>Indique ton surnom :</h1>
        <input type="text" placeholder="Rentrez un surnom" class="entrer_nom" name="user">

        <h1>Choisis ton avatar :</h1>
        <div class="avatars__top">
            <div>
                <input type="checkbox" id="toggle-avatar-1" class="toggle-avatar" value="2"></input>
                <label class="choice-avatar" for="toggle-avatar-1"><img class="choice-avatar__img" src='assets/avatars/2.png' alt="imginput"></label>
            </div>
            <div>
                <input type="checkbox" id="toggle-avatar-2" class="toggle-avatar" value="1"></input>
                <label class="choice-avatar" for="toggle-avatar-2"><img class="choice-avatar__img" src='assets/avatars/1.png' alt="imginput"></label>
            </div>
            <div>
                <input type="checkbox" id="toggle-avatar-3" class="toggle-avatar" value="3"></input>
                <label class="choice-avatar" for="toggle-avatar-3"><img class="choice-avatar__img" src='assets/avatars/3.png' alt="imginput"></label>
            </div>
        </div>
        <div class="avatars__bottom">
            <div>
                <input type="checkbox" id="toggle-avatar-4" class="toggle-avatar" value="4"></input>
                <label class="choice-avatar" for="toggle-avatar-4"><img class="choice-avatar__img" src='assets/avatars/4.png' alt="imginput"></label>
            </div>
            <div>
                <input type="checkbox" id="toggle-avatar-5" class="toggle-avatar" value="5"></input>
                <label class="choice-avatar" for="toggle-avatar-5"><img class="choice-avatar__img" src='assets/avatars/5.png' alt="imginput"></label>
            </div>
            <div>
                <input type="checkbox" id="toggle-avatar-6" class="toggle-avatar" value="6"></input>
                <label class="choice-avatar" for="toggle-avatar-6"><img class="choice-avatar__img" src='assets/avatars/6.png' alt="imginput"></label>
            </div>
        </div>
        <form name="next" action="expo.php" method="post">
            <input type="hidden" name="pseudo" value="">
            <input type="hidden" name="avatar" value="">
            <input class="form__bouton-continuer" type="submit" value="Continuer">
        </form>

        <script>
            let toggle_avatar = document.querySelectorAll('.toggle-avatar');
            let pseudo = document.querySelector('.entrer_nom');
            let continuer = document.querySelector('.form__bouton-continuer');
            let avatar_selected = false;
            let check = false;
            let p = document.createElement('p');
            let form = document.forms.next;
            p.innerHTML = 'Le pseudo doit contenir au moins 3 caractères';
            p.style.color = 'red';
            p.style.fontSize = '12px';
            p.classList.add('pseudo_error');
            pseudo.parentNode.appendChild(p);
            p = document.querySelector('.pseudo_error');
            p.style.display = 'none';

            toggle_avatar.forEach(function(element) {
                element.addEventListener('click', function() {
                    clear_avatar(toggle_avatar);
                    element.checked = true;
                });
            });
            let interval = setInterval(function() {
                check = check_list(toggle_avatar);
                form.pseudo.value = pseudo.value;
                form.avatar.value = check;
                if (check != undefined) {
                    if (pseudo.value.length > 2) {
                        continuer.style.display = 'inline-block';
                        pseudo.style.border = '1px solid black';
                        p.style.display = 'none';
                    } else if (pseudo.value.length == 0) {
                        continuer.style.display = 'none';
                    } else {
                        pseudo.style.border = '1px solid red';
                        p.style.display = 'block';
                    }
                } else if (check == undefined || pseudo.value == '') {
                    continuer.style.display = 'none';
                }
            }, 100);
        </script>
    </div>
</body>

</html>