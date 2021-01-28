var scoreNb = 0;
var score = document.getElementById("Score")
score.textContent = scoreNb
function coinFlip(element){
    var score = document.getElementById("Score")
    console.log("score : " + score);
    console.log("score.value : " + score.textContent);
    var res = Math.round(Math.random());
    console.log(res);
    console.log(element.id);
    var egal = res == element.id; 
    console.log(egal);
    if (element.id == res) {
        scoreNb = scoreNb + 1
        score.style.color = 'green';
    }
    else {
        scoreNb = 0
        score.style.color = 'red';
    }
    score.textContent = scoreNb;
    return element.id == res;
}