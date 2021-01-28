var scoreNb = 0;
var array = [];
var score = document.getElementById("Score")
score.textContent = scoreNb
function coinFlip(element){
    var score = document.getElementById("Score")
    var res = Math.round(Math.random());
    var egal = res == element.id; 

    if (element.id == res) {
        scoreNb = scoreNb + 1
        array.push(res);
    }
    else {
        scoreNb = 0
        array = [];
    }
    score.textContent = scoreNb;
    return element.id == res;
}

window.onload = function() {
    document.getElementById("sauvegarde").onclick = function func() {

        sendToPhp();
        array = [];
        score.textContent = 0

    }
}

function sendToPhp() {
  var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../test.php", true); 
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
    };

    var data = {pattern: array };
    xhttp.send(JSON.stringify(data));
    alert(array);

}