/**
 * Created by xrusa on 5/6/2016.
 */
var jsonDataLoad;

function setJsonDataLoad(jsonData) {
    jsonDataLoad = jsonData;
}

function addFields() {

    var div=document.getElementById("ownersTemplate");
    var input= document.getElementById("members").value;
    var fields=div.getElementsByTagName("fieldset")
    var l=fields.length;

    if (input < l) {
        while (input != l) {
            div.removeChild(fields[l-1]);
            l--;
        }
    } else if (input > l) {
        var i = l+ 1;
        while (input > i - 1) {

            var temp=document.createElement("fieldset");
            temp.id = "owner" + i;
            temp.style.display="block";
            var newLegend = document.createElement("legend");
            newLegend.id = "legend" + i;
            newLegend.innerHTML = "Ιδρυτής " + i;
            temp.appendChild(newLegend);
            var newName= document.createElement("input");
            newName.id="owner"+i+"Name";
            newName.name="owner"+i+"Name";
            newName.className="in";
            newName.type="text";
            newName.placeholder="Ονόματατεπώνμο";
            newName.value="";
            temp.appendChild(newName);
            var newID= document.createElement("input");
            newID.id="owner"+i+"ID";
            newID.name="owner"+i+"ID";
            newID.className="in";
            newID.type="text";
            newID.placeholder="Αριθμός ταυτότητας";
            newID.value="";
            temp.appendChild(newID);
            var newAFM=document.createElement("input");
            newAFM.id="owner"+i+"AFM";
            newAFM.name="owner"+i+"AFM";
            newAFM.className="in";
            newAFM.type="text";
            newAFM.placeholder="ΑΦΜ";
            newAFM.value="";
            temp.appendChild(newAFM);
            var newDOY=document.createElement("input");
            newDOY.id="owner"+i+"DOY";
            newDOY.name="owner"+i+"DOY";
            newDOY.className="in";
            newDOY.type="text";
            newDOY.value="";
            newDOY.placeholder="ΔΟΥ";
            temp.appendChild(newDOY);
            div.appendChild(temp);

            i++;
        }
    }
}

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

function unescapeHtml(text) {
    var map = {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'"
};

    return text.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function(m) { return map[m]; });
}

function handleFormData(btn){
    var formData={};
    var form=document.getElementById("form");
    var elArray=form.getElementsByClassName("in");
    var filename=document.getElementById("filename").value;
    var fileID=document.getElementById("fileID").value;
    var userName=document.getElementById("userName").value;
    var originalPoster= document.getElementById("originalPoster").value;

    for(var i=0; i<elArray.length; i++) {
        var e=elArray.item(i);
        if(e.name && e.value) {
            formData[e.name] = escapeHtml(e.value);
        }

    }
    var formDataJSON=JSON.stringify(formData);

    if(btn) {
        if(!(originalPoster===" "||originalPoster==="")){
           if(userName!==originalPoster){
                alert("Δεν έχετε δικαίωμα να αλλάξετε το συγκεκριμένο αρχείο. Μόνο ο χρήστης "+ originalPoster + " έχει δικαίωμα να το αλλάξει!");
            }
    }
        else{
        submitComplete(filename,fileID,formDataJSON);
        }
    }
    else{
        submitDraft(filename,fileID,formDataJSON);
    }



}


function submitComplete(filename,fileID,formDataJSON){

    var xmlhttp=ajax();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert("Η φόρμα σας αποθηκεύτηκε επιτυχώς");
        }
    }

    xmlhttp.open("POST", "gemhFormPost.php?submit=submitBtn&filename="+filename+"&fileID="+fileID, true);
    xmlhttp.send(formDataJSON);

}
function submitDraft(filename,fileID,formDataJSON){
    var xmlhttp=ajax();
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert("Η φόρμα σας αποθηκεύτηκε επιτυχώς");
        }
    }
    xmlhttp.open("POST", "gemhFormPost.php?submit=draftBtn&filename="+filename+"&fileID="+fileID, true);
    xmlhttp.send(formDataJSON);
}

function ajax(){
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
    return xmlhttp;
}


function loadJsonData(json){
    for (var id in json){
        if(json.hasOwnProperty(id)){
            document.getElementById(id).value=unescapeHtml(json[id]);
            if(id==="members"){
                addFields()
            }
        }
    }
}

function addBannerListeners(){
    document.getElementById("returnBtn").addEventListener('click',function(){
        if( confirm("Ό,τι έχετε γράψει στη φόρμα θα χαθεί εαν δεν έχετε πατήσει ήδη αποθήκευση προηγουμένως. Είστε σίγουρος/η ότι θέλετε να επιστρέψετε στην λίστα;"))
        {

            window.location="/gemh/filesPage/gemhList.php";
        }

    },false);

}
function addListeners(){
    document.getElementById("filldetails").addEventListener("click",addFields,false);

}

window.onload=function(){
    addListeners();
    addBannerListeners();

    if(jsonDataLoad) {
        var json= JSON.parse(jsonDataLoad);
        loadJsonData(json);
    }
   


}

