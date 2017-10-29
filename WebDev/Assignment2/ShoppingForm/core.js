var fetchJSON = function (method, url, beforeSend, successHandler, errorHandler) {
    var xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    xhr.open(method, url, true);
    xhr.responseType = 'json';
    xhr.onreadystatechange = function () {
        var status;
        var data;

        if (xhr.readyState == 4) {
            status = xhr.status;

            if (status == 200) {
                //console.log(xhr);

                data = xhr.response; //JSON.parse(xhr.responseText);
                successHandler && successHandler(data);
            } else {
                errorHandler && errorHandler(status);
            }
        }
    };

    if (beforeSend != null) {
        beforeSend();
    }
    xhr.send();
};

var getJSON = function (url, beforeSend, successHandler, errorHandler) {
    fetchJSON("GET", url, beforeSend, successHandler, errorHandler);
}
var postJSON = function (url, beforeSend, successHandler, errorHandler) {
    fetchJSON("POST", url, beforeSend, successHandler, errorHandler);
}

function fadeIn(element) {
    if (element.classList.contains("fadeOut")) {
        //console.log("timeoutfadein");
        setTimeout(function () {
            fadeIn(element);
        }, 40);
        return;
    }

    element.classList.add("fadeIn");

    var op = 0.1;  // initial opacity
    element.style.opacity = op;
    element.style.display = 'block';

    var timer = setInterval(function () {
        if (op >= 1) {
            clearInterval(timer);
            element.classList.remove("fadeIn");
        }

        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 50);
}

function fadeOut(element) {
    if (element.classList.contains("fadeIn")) {
        //console.log("timeoutfadeout");
        setTimeout(function () {
            fadeOut(element);
        }, 40);
        return;
    }

    element.classList.add("fadeOut");

    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1) {
            clearInterval(timer);
            element.style.display = 'none';
            element.classList.remove("fadeOut");
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function passwordCheck(password) {
    if (password.trim().length < 5) {
        return false;
    }
    if (!hasNumber(password.trim())) {
        return false;
    }
    if (!hasUpperCase(password)) {
        return false;
    }

    return true;
}

function hasNumber(str) {
    return /\d/.test(str);
}
function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}

function today() {
    var today = new Date();

    var date = "" + today.getDate();
    if (date.length == 1) {
        date = "0" + date;
    }

    var month = "" + (today.getMonth() + 1);
    if (month.length == 1) {
        month = "0" + month;
    }

    var hours = "" + today.getHours();
    if (hours.length == 1) {
        hours = "0" + hours;
    }

    var minutes = "" + today.getMinutes();
    if (minutes.length == 1) {
        minutes = "0" + minutes;
    }

    var seconds = "" + today.getSeconds();
    if (seconds.length == 1) {
        seconds = "0" + seconds;
    }

    return date + "/" + month + "/" + today.getFullYear() + " " + hours + ":" + minutes;
}

function validateCardNumber(number) {
    var regex = new RegExp("^[0-9]{16}$");
    if (!regex.test(number))
        return false;

    return luhnCheck(number);
}

function luhnCheck(val) {
    var sum = 0;
    for (var i = 0; i < val.length; i++) {
        var intVal = parseInt(val.substr(i, 1));
        if (i % 2 == 0) {
            intVal *= 2;
            if (intVal > 9) {
                intVal = 1 + (intVal % 10);
            }
        }
        sum += intVal;
    }
    return (sum % 10) == 0;
}
