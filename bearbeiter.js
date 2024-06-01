var inputfieldTex = document.getElementById("loginText");

console.log("inputfieldTex == null " + inputfieldTex == null);


function ajaxRequest(str) {

    //если поле ввода не пустое, то формируется ajax запрос на сервер для проверки логина
    $.ajax({
        type: "POST",
        url: "Server.php",
        data: { log: str },
        success: function (msg) {
            console.log("Message: " + msg)
            inputfieldTex.innerHTML = "Answer =" + msg;
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect. Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log("Answer: " + msg);
        }
    });
}

/* WORK
var xhr = new XMLHttpRequest();
var url = "Server.php";
var params = "log=" + str;
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
if(xhr.readyState == 4 && xhr.status == 200) {
    console.log(xhr.responseText);
    inputfieldTex.innerHTML = xhr.responseText;
}
}
xhr.send(params);
*/