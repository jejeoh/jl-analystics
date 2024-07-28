ip = 0;
let infoip = 0
function getin(ip){
    var xhttps = new XMLHttpRequest();
    xhttps.open("POST", "http://ip-api.com/json/" + ip, true);
    xhttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttps.send();
    xhttps.onreadystatechange = function () {
        if (xhttps.readyState == 4 && xhttps.status == 200) {
            console.log(xhttps.responseText);
            infoip = JSON.parse(xhttps.responseText);
        }
    };
}




var xhttp = new XMLHttpRequest();
xhttp.open("POST", "lib/getip.php", true);
xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhttp.send();
xhttp.onreadystatechange = function () {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        ip = String(xhttp.responseText);
        getin(ip);
    }
};


setTimeout(function(){
    var all = [];
    all[4] = infoip["query"];
    all[0] = infoip["country"];
    all[1] = navigator.userAgentData.brands[1]["brand"];
    all[2] = navigator.userAgentData.platform;
    all[3] = navigator.language;
    console.log(all);
    var jsonData = JSON.stringify(all);
    console.log(jsonData);
    var connexion = new XMLHttpRequest();
    connexion.open("POST", "lib/share.php");
    connexion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connexion.send("info=" + jsonData);
    connexion.onreadystatechange = function() {
        if (connexion.readyState == 4 && connexion.status == 200) {
            console.log(connexion.responseText);
        }
    }
}, 500);
