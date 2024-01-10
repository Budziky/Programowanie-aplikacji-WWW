function gettheDate()
{
    Todays = new Date();
    TheDate = "" + (Todays.getMonth() + 1) + " / " + Todays.getDate() + " / " + (Todays.getYear() - 100);
    document.getElementById("data").innerHTML = TheDate;
}

var timerID = null;
var timeRunning = false;

function stopclock()
{
    if(timeRunning)
    {
        clearTimeout(timerID);
    }
    timerRunning = false;
}

function startclock()
{
    stopclock();
    gettheDate()
    showtime();
}

function showtime()
{
    var now = new Date();
    var hours = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    var timeVal = "" + ((hours > 12) ? hours - 12 : hours);
    timeVal += ((min < 10) ? ":0" : ":") + min;
    timeVal += ((sec < 10) ? ":0" : ":") + sec;
    timeVal += (hours >= 12) ? "P.M." : "A.M.";
    document.getElementById("zegarek").innerHTML = timeVal;
    timerID = setTimeout("showtime()", 1000);
    timeRunning = true;
}