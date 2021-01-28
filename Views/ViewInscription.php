
<?php require_once "Header.php"; ?>
<?php if(isset($data["message_err"])): echo '<p>'.$data["message_err"].'</p>';?>


<div id="container">

    <div id="formulaire-inscription">
        <form action="?controller=Inscription&action=formInscription" method="post">

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrez un pseudo" name="username" required>

            <label><b>E-mail</b></label>
            <input type="text" placeholder="Entrez votre adresse e-mail" name="email" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrez un mot de passe" name="password" required>

            <label><b>Vérification mot de passe</b></label>
            <input type="password" placeholder="Entrez un mot de passe" name="re-password" required>

            <input type="submit" id='submit' value='Inscription' >

        </form>

    <a href="?controller=Connexion&action=connexion"> Retour </a>

    </div>

</div>

<?php require_once "Footer.php"; ?>