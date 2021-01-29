<?php require "Header.php"; ?>
        <main>


            <div id="coin-flip-cont">
                <div id="coin">
                    <div class="front"></div>
                    <div class="back"></div>
                </div>

                <div class="game">
                    <button id="0" onclick="coinFlip(this)">Pile</button>
                    <button id="1" onclick="coinFlip(this)">Face</button>
                    <h1 id="Score"></h1>
                    <audio controls id="music">
                        <source src="src/music/gagne.mp3" type="audio/mpeg">
                    </audio>
                    <audio controls id="music2">
                        <source src="src/music/perdu.mp3" type="audio/mpeg">
                    </audio>
                </div>

            <button id="sauvegarde">
                Stop
            </button>



            </div>





            <table class="score-table">
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

            <table class="score-table">
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

            <table class="score-table">
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


            <div id="right-infos">

                <table id="infos-joueur">
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

                </div>

                 <div id="choix-piece">
                    <div>
                      <input type="radio" id="default" name="piece" checked>
                      <img alt="face piece" src="src/img/face.jpg">
                    </div>
                    <div>
                      <input type="radio" id="ENSIIE" name="piece">
                      <img alt="face piece ensiie" src="src/img/2euro-ENSIIE.PNG">
                    </div>
                    <div>
                      <input type="radio" id="Europe" name="piece">
                      <img alt="face piece europe" src="src/img/2euro-Europe.jpg">
                    </div>
                    <div>
                      <input type="radio" id="France" name="piece">
                      <img alt="face piece france" src="src/img/2euro-France.jpg">
                    </div>
                    <div>
                      <input type="radio" id="Liberte" name="piece">
                      <img alt="face piece liberte" src="src/img/2euro-Liberté.jpg">
                    </div>
                    <div>
                      <input type="radio" id="RubanRose" name="piece">
                      <img alt="face piece ruban rose" src="src/img/2euro-Ruban-Rose.jpg">
                    </div>
                    <div>
                      <input type="radio" id="stonks" name="piece">
                      <img alt="face piece stonks" src="src/img/2euro-Stonks.PNG">
                    </div>
                </div>




                <div id="formulaire-infosJoueurs">
                    <form action="?controller=Global&action=infosJoueur" method="post">
                        <label>Rechercher un joueur :</label>
                        <label><b>Nom d'utilisateur</b></label>
                        <input type="text" placeholder="Entrez un pseudo" name="username" required>

                        <input type="submit" id='submit' value='Rechercher' >

                    </form>
                </div>


        </main>

<?php require "Footer.php"; ?>
