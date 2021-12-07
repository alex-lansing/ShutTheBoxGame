let timeoutID = null;
getScoreData('scores.txt');

function forceUpdate() {
    stopUpdate();
    getScoreData();
}

function stopUpdate() {
    clearTimeout(timeoutID);
}

function getScoreData(filename) {
    const request = new XMLHttpRequest();

    request.onload=function(){
        if (this.status === 200) {
            const display = document.getElementById('displayScores');
            display.innerHTML = this.responseText.split('\n').join('<br>');
        }

    };

    request.open('GET', 'scores.txt' + '?v=' + Math.random());
    request.send();
    timeoutID = setTimeout(getScoreData, 10000);
}