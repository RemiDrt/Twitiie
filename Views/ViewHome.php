<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Coin Flip</title>
    </head>
    <body>
        <main>

            <div class="game">
                <button id="0" onclick="coinFlip(this)">Pile</button>
                <button id="1" onclick="coinFlip(this)">Face</button>
                <h1 id="Score"></h1>
                
            </div>

            <button id="sauvegarde">
                Stop
            </button>

        </main>
           <script src="src/script.js"></script>
    </body>


</html>