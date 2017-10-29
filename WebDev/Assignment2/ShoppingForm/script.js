var map = null;
var marker = null;

window.addEventListener("load", function () {
    // Expiration card year
    var today = new Date();
    document.getElementById("expiration_date_year").setAttribute('min', today.getFullYear());
    document.getElementById("expiration_date_year").setAttribute('max', today.getFullYear() + 5);

    // Toggle Credit
    document.getElementById("payment_method").addEventListener("change", function () {
        var value = this.value;

        if (value == 3) {
            fadeIn(document.getElementById("type_of_card_fieldset"));
            document.getElementById("card_number").setAttribute("required", "");
        } else {
            fadeOut(document.getElementById("type_of_card_fieldset"));
            document.getElementById("card_number").removeAttribute("required");
        }
    });

    // Google map init
    var lat = 38.2749497;
    var lng = 23.8102717;
    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 6,
        scrollwheel: true,
        center: myLatlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    document.getElementById("address").addEventListener("change", function () {
        var value = this.value;

        if (value.trim() != "") {
            getJSON(
                "http://maps.google.com/maps/api/geocode/json?address=" + value,
                function () {
                    document.getElementById("load_address").classList.add("loading");
                    if (marker != null) {
                        marker.setMap(null);
                    }
                },
                function (data) {
                    console.log(data);
                    if (data.results.length <= 0) {
                        alert("Address not found");
                        document.getElementById("load_address").classList.remove("loading");
                        return;
                    }

                    coords = data.results[0].geometry.location;
                    console.log(coords);

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(coords.lat, coords.lng),
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP
                    });

                    setTimeout(function () {
                        var center = map.getCenter();
                        google.maps.event.trigger(map, "resize");
                        map.setCenter(new google.maps.LatLng(coords.lat, coords.lng));
                        map.setZoom(14);
                    }, 400);

                    google.maps.event.addListener(marker, 'dragend', function () {
                        geocodePosition(marker.getPosition());
                    });

                    fadeIn(document.getElementById('map'));

                    document.getElementById("address").value = data.results[0].formatted_address;

                    document.getElementById("load_address").classList.remove("loading");
                },
                function (error) {
// 					/console.log(error);
                    alert(error);
                }
            );
        } else {
            document.getElementById("load_address").classList.remove("loading");
            fadeOut(document.getElementById('map'));
        }
    });

    document.getElementById("btnReset").addEventListener("click", function () {
        document.getElementById("form").reset();
    });

    document.getElementById("form").addEventListener("submit", function (evt) {
        evt.preventDefault();

        document.getElementById("result").innerHTML = "";
        //fadeOut(document.getElementById("result"));

        var username = document.getElementById("username");
        var password = document.getElementById("password");
        var payment_method = document.getElementById("payment_method");

        //Card fields
        var type_of_card = document.getElementById("type_of_card");
        var card_number = document.getElementById("card_number");
        var expiration_date_month = document.getElementById("expiration_date_month");
        var expiration_date_year = document.getElementById("expiration_date_year");

        var name = document.getElementById("name");
        var address = document.getElementById("address");
        var email = document.getElementById("email");
        var phone = document.getElementById("phone");

        var terms = document.getElementById("terms");

        if (username.value.trim() == "") {
            alert("Please fill username");
            return;
        }

        if (password.value.trim() == "") {
            alert("Please fill password");
            return;
        }
        if (!passwordCheck(password.value)) {
            alert("Ο κωδικός πρεπει να ειναι 5 ψηφία και να περιέχει τουλάχιστον έναν αριθμό και ένα κεφαλαίο γράμμα");
            return;
        }

        if (payment_method.value == 3) { //case credit
            var today = new Date();
            var month = "" + (today.getMonth() + 1);

            if (expiration_date_month.value <= 0 || expiration_date_month.value.trim() == "" || expiration_date_month.value > 12) {
                alert("Ο μήνας ειναι λάθος.");
                return;
            }
            if (expiration_date_year.value < today.getFullYear() || expiration_date_year.value.trim() == "") {
                alert("Το έτος ειναι λάθος.");
                return;
            }

            // Chrome OK
            var date = new Date(expiration_date_year.value + '-' + expiration_date_month.value + '-01');
            if (date <= today) {
                alert("Η ημερ/νια καρτας ειναι λάθος.");
                return;
            }

            // Firefox
            if (expiration_date_year.value == today.getFullYear() && expiration_date_month.value <= month) {
                alert("Η ημερ/νια καρτας ειναι λάθος.");
                return;
            }
        }

        if (name.value.trim() == "") {
            alert("Please fill name");
            return;
        }
        if (address.value.trim() == "") {
            alert("Please fill address");
            return;
        }

        if (email.value.trim() != "" && !validateEmail(email.value)) {
            alert("Το email ειναι λαθος.");
            return;
        }

        if (phone.value.trim().length > 0) {
            if (phone.value.trim().length != 10 || isNaN(phone.value)) {
                alert("Το τηλέφωνο πρέπει να είναι 10 χαρακτήρες και μόνο αριθμοί");
                return;
            }
        }

        if (!terms.checked) {
            alert("Παρακαλώ αποδεχθείτε τους όρους.");
            return;
        }


        alert("Submited name: " + name.value);

        document.getElementById("result").innerHTML = "<span class='name'>Username:</span><span class='value'>" + username.value + "</span><span class='name'>Name:</span><span class='value'>" + name.value + "</span><span class='name'>Address:</span><span class='value'>" + address.value + "</span>";

        fadeIn(document.getElementById("result"));
        fadeOut(document.getElementById("form"));
    });

    loadNames();
});

function geocodePosition(pos) {
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
            latLng: pos
        },
        function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var address = results[0].formatted_address.replace(/\s\d{3}\s\d{2}/g, '');
                document.getElementById("address").value = address;
            } else {
                alert("Cannot determine address at this location");
            }
        }
    );
}

function loadNames() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var xmlDoc = request.responseXML;
            var names = xmlDoc.getElementsByTagName("Name");
            var select = document.getElementById("suggestions");
            for (var i = 0; i < names.length; i++) {
                var opt = document.createElement("option");
                var value = document.createTextNode(names[i].childNodes[0].nodeValue);
                opt.appendChild(value);
                select.appendChild(opt);
            }
            document.getElementById("name").appendChild(select);
        }
    };
    request.open("GET", "names.xml", true);
    request.send();


}
