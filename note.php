<?php
include_once("head.php");
?>

<body>
    <?php
    include_once("menu.php");
    ?>
    <div class="conteneur__note">
        <h2>Nous te remercions de ta visite, à bientôt !</h2>
        <h3>Donne ton avis sur le GuidExpo !</h3>
        <div class="rating">
            <a href="#5" title="Donner 5 étoiles">★</a>
            <a href="#4" title="Donner 4 étoiles">★</a>
            <a href="#3" title="Donner 3 étoiles">★</a>
            <a href="#2" title="Donner 2 étoiles">★</a>
            <a href="#1" title="Donner 1 étoile">★</a>
        </div>
        <form class="form-fin" name="formulaire">
            <textarea class="note__commentaire" type="text" autocapitalize="sentences" placeholder="Comment s’est passée ta visite (ambiance, parcours, qualité audio, ... ) ? Recommandes-tu cette expérience ?"></textarea>
            <input class="form__bouton-continuer" type="button" value="Envoyer">
        </form>
        <a href="./expo.php" class="bouton-final-retour__lien">
            <div class="bouton-final-retour">Retour a l'accueil</div>
        </a>
    </div>
    
    
</body>

</html>