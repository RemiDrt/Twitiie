<?php require "Header.php"; ?>
        <main>

            <div class="game">
                <button id="0" onclick="coinFlip(this)">Pile</button>
                <button id="1" onclick="coinFlip(this)">Face</button>
                <h1 id="Score"></h1>
                
            </div>

            <button id="sauvegarde">
                Stop
            </button>


            <div id="formulaire-infosJoueurs">
                <form action="?controller=InfosJoueur&action=infosJoueur" method="post">
                    <label>Rechercher un joueur :</label>
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrez un pseudo" name="username" required>

                    <input type="submit" id='submit' value='Rechercher' >

                </form>
            </div>


        </main>
           <script src="src/script.js"></script>
<?php require "Footer.php"; ?>