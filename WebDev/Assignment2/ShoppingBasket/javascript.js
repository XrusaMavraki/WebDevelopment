var basket = new Array();

window.onload = function () {
    document.getElementById("basket").addEventListener("dragover", allowDrop);
    document.getElementById("basket").addEventListener("drop", drop);
    document.getElementById("lblempty").addEventListener("click", clearBasket);
    document.getElementById("trash").addEventListener("dragover", allowDrop);
    document.getElementById("trash").addEventListener("drop", drop);

}

function drag(event) {
    event.dataTransfer.setData("id", event.target.id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("id");
    if (event.target.id == "basket") {
        if (data.indexOf("-basket") != -1)
            return;
        if (basket[data] == undefined)
            basket[data] = 0;

        basket[data]++;
    }
    else if (event.target.id == "trashimg" && data.indexOf("-basket") != -1) {
        data = data.substring(0, data.indexOf("-basket"));
        var item = data;
        basket[item]--;

        if (basket[item] == 0)
            delete basket[item];
    }

    updateBasket();
    postData({action: "change", prodid: data, quantity: basket[data]});
}

function updateBasket() {
    var text = "";
    for (var key in basket) {
        var element = document.getElementById(key);
        text += "<img id=\"" + key + "-basket\" class=\"prodadded\" src=\"" + element.src + "\" draggable=\"true\" >";
        text += "<label class=\"lblprodadded\">[ " + basket[key] + " ] " + element.alt + "</label><br/>";
    }
    document.getElementById("basket").innerHTML = text;
}

function postData(quantity) {
    if (quantity.quantity == undefined)
        quantity.quantity = 0;

    var data = "action=" + quantity.action + "&productId=" + quantity.prodid + "&quantity=" + quantity.quantity;

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }


    xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var text = "<label class=\"updateMessage\">" + xmlhttp.responseText + "</label>";
            document.getElementById("response").innerHTML = text;
        }
    };

    xmlhttp.open("POST", 'http://83.212.86.187/post_data.php', true);

    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
}

function clearBasket() {
    for (var key in basket) {
        delete basket[key];
    }

    postData({action: "empty"});
    updateBasket();
}

function allowDrop(event) {
    event.preventDefault();
}

this.addEventListener('dragstart', drag, false);
