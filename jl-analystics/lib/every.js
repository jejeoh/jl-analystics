ip = 0
var infoip = 3

function getin(ip){
    var xhttps = new XMLHttpRequest();
    xhttps.open("POST", "http://ip-api.com/json/" + ip, true);
    xhttps.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttps.send();
    xhttps.onreadystatechange = function () {
        if (xhttps.readyState == 4 && xhttps.status == 200) {
            console.log("test");
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
        getin(ip)
    }
};


setTimeout(function(){
    console.log(infoip)
}, 2000);
