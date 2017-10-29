
function handleStars(movie){
    var val = document.querySelector('input[name="rating"]:checked').value;
    var obj = {};
    obj.movieId = movie;
    obj.rating = parseInt(val);
    var json = JSON.stringify(obj);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "updateRating.php", true);

    xmlhttp.setRequestHeader("Content-type", "application/json");
    xmlhttp.send(json);
    updateRating(val);
}
function updateRating(val){
    document.getElementById("numericalRating").innerHTML= val;
}
function orderBy(){
    var s=document.getElementById("orderBy");
    var selected=s.options[s.selectedIndex].value;
    var data;
    var ascDesc=document.getElementById("AscDesc");
    var genreSel=document.getElementById("Genre");
    if(selected==='Alphabetically'){
        var sel2=ascDesc.options[ascDesc.selectedIndex].value;
        data={"selected" : selected,"value":sel2 };

    }
    else if (selected==='Rating'){
        var sel2=ascDesc.options[ascDesc.selectedIndex].value;
        data= {"selected" : selected ,"value":sel2};

    }
    else if(selected==='Genre'){
         var selCategory=genreSel.options[genreSel.selectedIndex].value;
        var sel2=ascDesc.options[ascDesc.selectedIndex].value;
        data= {"selected": selected, "value":sel2,  "selCategory":selCategory };
    }

    var json= JSON.stringify(data);
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("POST","orderMovies.php?",true);
    xmlhttp.setRequestHeader("Content-type", "application/json");

    xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            window.location.reload();
        }
    };

    xmlhttp.send(json);
    

    

}

