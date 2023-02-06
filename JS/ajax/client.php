<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="getServerTime();">
    <script>
        let ajaxRequest;

        function getXMLHttpRequest() {
            let request;
            if (window.XMLHttpRequest) {
                request = new XMLHttpRequest();
            }
            else {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }

            return request;
        }

        function ajaxResponse() {
            if (ajaxRequest.readyState != 4) { return; }
            else {
                if (ajaxRequest.status == 200) {
                    let timeValue = ajaxRequest.responseXML.getElementsByTagName("timenow")[0];
                    document.getElementById("showtime").innerHTML = timeValue.childNodes[0].nodeValue;
                } else {
                    alert("Request failed: " + ajaxRequest.statusText);
                }
            }
        }

        function getServerTime() {
            ajaxRequest = getXMLHttpRequest();
            if (!ajaxRequest) {
                document.getElementById("showtime").innerHTML = "Request error!";
                return;
            }

            let myURL = "./serve.php";
            let myRand = parseInt(Math.random() * 999999999);
            myURL = myURL + "?rand=" + myRand;
            ajaxRequest.onreadystatechange = ajaxResponse;
            ajaxRequest.open("GET", myURL);
            ajaxRequest.send(null);
        }
    </script>
    <h1>Ajax Demonstration</h1>
    <h2>Getting the server time without refreshing page</h2>
    <form>
        <input type="button" value="Get Server Time" onclick= "getServerTime();" />
    </form>
    <div id="showtime" class="displaybox"></div>
    <div name="timenow"></div>
</body>

</html>