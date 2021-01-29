<?php require "Header.php"; ?>

<div id="container">
    <?php if(isset($e_message)){echo '<h1>'.$e_message.'</h1>';} ?>
   	<div id="formulaire">
        <form action="?controller=Global&action=connexion" method="post">
                   
                    <label><b>E-Mail</b></label>
                    <input type="text" placeholder="Entrez votre e-mail" name="mail" required>
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrez le mot de passe" name="password" required>
                    </br>
                    <input type="submit" id='submit' value='Connexion' >
        </form>

        <a href="?controller=Global&action=inscription"> Inscription </a>

    </div>

</div>

<?php require "Footer.php"; ?>