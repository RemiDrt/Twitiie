

var scoreNb = 0;
var array = [];
var score = document.getElementById("Score");
cote = 0;
score.textContent = scoreNb;
function coinFlip(element){
    var score = document.getElementById("Score");
    var res = Math.round(Math.random());
    var egal = res == element.id;

    cote = res;

    document.getElementById("0").disabled = true;
    document.getElementById("1").disabled = true;

    var myMusic;
    if (element.id == res) {
        myMusic = document.getElementById("music");
        scoreNb = scoreNb + 1
        array.push(res);
    }
    else {
        myMusic = document.getElementById("music2");
        scoreNb = 0
        array = [];
    }
    myMusic.play();
    
    document.getElementById("Score").style.visibility = 'hidden';

    document.getElementById("coin").removeAttribute("class");

    setTimeout(function(){
    document.getElementById("coin").classList.add(getSpin(res));
    }, 100);

        setTimeout(function(){
        document.getElementById("Score").style.visibility = 'visible';
        document.getElementById("0").disabled = false;
        document.getElementById("1").disabled = false;
    }, 3400);





    score.textContent = scoreNb;


    return element.id == res;
}






function getSpin(res) {

    var face = ['animation900','animation1260','animation1620','animation1980'];
    var pile = ['animation1080','animation1440','animation1800','animation2160'];

    if (res == 0 ) {

        var spin = face[Math.floor(Math.random()*face.length)];
    }else{

         var spin = pile[Math.floor(Math.random()*pile.length)];
    }
    return spin;
}







window.onload = function() {
    document.getElementById("sauvegarde").onclick = function func() {

        sendToPhp();
        array = [];
        score.textContent = 0;
        scoreNb = 0;

    }
}

function sendToPhp() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "src/ajax.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
    };

    var data = {pattern: array, score: scoreNb};
    xhttp.send(JSON.stringify(data));
}




document.addEventListener('DOMContentLoaded', function(event) {})
