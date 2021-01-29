<?php require "Header.php"; 
session_start();
var_dump($_SESSION);
var_dump($data);
?>
        <main>

            <div class="game">
                <button id="0" onclick="coinFlip(this)">Pile</button>
                <button id="1" onclick="coinFlip(this)">Face</button>
                <h1 id="Score"></h1>
                
            </div>

            <button id="sauvegarde">
                Stop
            </button>

            <table>
                <tr><th>TOP 10 PLAYER</th></tr>
                <tr>
                    <th>Player</th>
                    <th>Score</th>
                </tr>
                <?php foreach($data["Tops10"]["Top10Tot"] as $key => $val) : ?>
                <tr>
                    <td><?=$val["pseudo"]?></td>
                    <td><?=$val["score"]?></td>
                </tr>
                <?php endforeach ?>

            </table>

            <table>
                <tr><th>TOP 10 PLAYER OF THE MONTH</th></tr>
                <tr>
                    <th>Player</th>
                    <th>Score</th>
                </tr>
                <?php foreach($data["Tops10"]["Top10Mon"] as $key => $val) : ?>
                <tr>
                    <td><?=$val["pseudo"]?></td>
                    <td><?=$val["score"]?></td>
                </tr>
                <?php endforeach ?>

            </table>

            <table>
                <tr><th>TOP 10 PLAYER OF THE WEEK</th></tr>
                <tr>
                    <th>Player</th>
                    <th>Score</th>
                </tr>
                <?php foreach($data["Tops10"]["Top10Week"] as $key => $val) : ?>
                <tr>
                    <td><?=$val["pseudo"]?></td>
                    <td><?=$val["score"]?></td>
                </tr>
                <?php endforeach ?>
            </table>

            <table>
                <tr><th><?=$_SESSION["userObject"]["pseudo"]?></th></tr>
                <tr>
                    <th>Score</th>
                    <th>Pattern</th>
                </tr>
                <tr>
                    <th>Ever</th>
                    <td><?=$data["Player"]["PlayerScoreTot"]?></td>
                    <td><?=$data["Player"]["PlayerPatternTot"]?></td>
                </tr>
                <tr>
                    <th>Month</th>
                    <td><?=$data["Player"]["PlayerScoreMon"]?></td>
                    <td><?=$data["Player"]["PlayerPatternMon"]?></td>
                </tr>
                <tr>
                    <th>Week</th>
                    <td><?=$data["Player"]["PlayerScoreWeek"]?></td>
                    <td><?=$data["Player"]["PlayerPatternWeek"]?></td>
                </tr>
            </table>







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