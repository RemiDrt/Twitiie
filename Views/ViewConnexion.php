<?php require "Header.php"; ?>

<div id="container">
   	<div id="formulaire">
        <form action="?controller=Connexion&action=connexion" method="post">
                   
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrez le nom d'utilisateur" name="username" required>
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez le mot de passe" name="password" required>
                    </br>
                    <input type="submit" id='submit' value='Connexion' >
        </form>

        <a href="?controller=Inscription&action=inscription"> Inscription </a>

    </div>

</div>

<?php require "Footer.php"; ?>