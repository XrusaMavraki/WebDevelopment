/**
 * Created by xrusa on 5/22/2016.
 */

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

function handleFiles(files){
    var filediv=document.getElementById("FilesDiv");
    filediv.innerHTML="";

    for (var i=0;i<files.length;i++ ){
        var f=files[i];
        var className;
        switch(f[1]) {
            case '1':{
                className = "btnDivNew";
                break;
            }
            case  '2':{
                className="btnDivDraft";
                break;
            }
            case '3':{
                className="btnDivComplete";
            }
        }
        var divContainer=document.createElement("div");
        divContainer.id='Row'+i;
        divContainer.className="row";
        filediv.appendChild(divContainer);
        var div=document.createElement("div");
        var id="fileBtn"+i;
        div.id=id;
        div.className="btn btnType2";
        div.addEventListener("click",handleFilesListener,false);
        if(f[1]!=='3'){
        div.innerHTML='<div class="filename" id='+f[2]+'> '+f[0]+' </div> <div class="btnDiv '+className+' " ></div>';
            divContainer.appendChild(div);
        }
        else{
            div.innerHTML='<div class="filename" id='+f[2]+'> '+f[0]+' </div> <div class="btnDiv '+className+' " ></div>';
            divContainer.appendChild(div);

             var divPoster= document.createElement("div");
             divPoster.innerHTML=f[3];
            divPoster.style="text-align: right; padding-right: 0.2em"
            div.appendChild(divPoster);

        }


    }



}



function showNewFiles(){

    var xmlhttp=ajax();

    xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var files=JSON.parse(xmlhttp.responseText);
            handleFiles(files);

        }
    };

    xmlhttp.open("GET", 'queryAjax.php?show=1', true);
    xmlhttp.send();
}
function showDraftFiles(){
    xmlhttp=ajax();

    xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var files=JSON.parse(xmlhttp.responseText);
            handleFiles(files);

        }
    };

    xmlhttp.open("GET", 'queryAjax.php?show=2', true);
    xmlhttp.send();
}
function showCompletedFiles(){
    xmlhttp=ajax();

    xmlhttp.onreadystatechange = function () {//Call a function when the state changes.
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var files=JSON.parse(xmlhttp.responseText);
            handleFiles(files);

        }
    };

    xmlhttp.open("GET", 'queryAjax.php?show=3', true);
    xmlhttp.send();
}

function handleFilesListener(){
    var filename=this.getElementsByClassName('filename')[0].innerHTML.trim();
    var fileid=this.getElementsByClassName('filename')[0].id;
    var fileStatus=this.getElementsByClassName("btnDiv")[0].className.split(" ")[1];
    switch(fileStatus){
        case "btnDivNew":{
            fileStatus=1;
            break;
        }
        case "btnDivDraft":{
            fileStatus=2;
            break;
        }
        case "btnDivComplete":{
            fileStatus=3;
            break;
        }
    }
    window.location='../mainPage/gemh.php?filename='+filename+'&fileID='+fileid +'&fileStatus='+fileStatus;
}

function toggleBannerButtons(){
    var b1=document.getElementById("New");
    var b2=document.getElementById("Drafts");
    var b3=document.getElementById("Completed");
    b1.addEventListener("mouseup",showNewFiles);
    b2.addEventListener("mouseup",showDraftFiles);
    b3.addEventListener("mouseup",showCompletedFiles);
}

window.onload=function(){
    toggleBannerButtons();
    showNewFiles();
   

}
