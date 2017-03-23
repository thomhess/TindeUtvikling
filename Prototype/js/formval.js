document.getElementById("myForm").addEventListener("submit", function (e){
    
    var characterCheck = /^[a-zA-Z-_ æøåÆØÅ]+$/
    var emailCheck = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    function validateName() {
        
        theName = document.getElementById("name").value;

        if (theName == "") {
            document.getElementById("errorMsgName").style.visibility = "visible";
            document.getElementById("errorMsgName").innerHTML = "<b>Dette feltet er tomt</b>";
            document.getElementById("name").style.borderColor = "red";
            return false;
        } else if (!theName.match(characterCheck)) {
            document.getElementById("errorMsgName").style.visibility = "visible";
            document.getElementById("errorMsgName").innerHTML = "<b>Dette navnet er ugyldig</b>";
            document.getElementById("name").style.borderColor = "red";
            return false;
        } else {
            document.getElementById("errorMsgName").style.visibility = "hidden";
            document.getElementById("name").style.borderColor = "";
            return true;
        }
    }
    
    function validateEmail() {

        theEmail = document.getElementById("epost").value;

        if (theEmail == "") {
            document.getElementById("errorMsgEmail").style.visibility = "visible";
            document.getElementById("errorMsgEmail").innerHTML = "<b>Dette feltet er tomt</b>";
            document.getElementById("epost").style.borderColor = "red";
            return false;
        } else if (!theEmail.match(emailCheck)) {
            document.getElementById("errorMsgEmail").style.visibility = "visible";
            document.getElementById("errorMsgEmail").innerHTML = "<b>Denne epostadressen er ugyldig</b>";
            document.getElementById("epost").style.borderColor = "red";
            return false;
        } else {
            document.getElementById("errorMsgEmail").style.visibility = "hidden";
            document.getElementById("epost").style.borderColor = "";
            return true;
        }
    }
    
    function validateEmne() {

        theEmail = document.getElementById("emne").value;

        if (theEmail == "") {
            document.getElementById("errorMsgEmne").style.visibility = "visible";
            document.getElementById("errorMsgEmne").innerHTML = "<b>Dette feltet er tomt</b>";
            document.getElementById("emne").style.borderColor = "red";
            return false;
        } else {
            document.getElementById("errorMsgEmne").style.visibility = "hidden";
            document.getElementById("emne").style.borderColor = "";
            return true;
        }
    }
    
    function validateComment() {

        theEmail = document.getElementById("comment").value;

        if (theEmail == "") {
            document.getElementById("errorMsgComment").style.visibility = "visible";
            document.getElementById("errorMsgComment").innerHTML = "<b>Dette feltet er tomt</b>";
            document.getElementById("comment").style.borderColor = "red";
            return false;
        } else {
            document.getElementById("errorMsgComment").style.visibility = "hidden";
            document.getElementById("comment").style.borderColor = "";
            return true;
        }
    }
    
    
    if ((validateName() & validateEmail() & validateEmne() & validateComment() ) == false) {
        e.preventDefault();
    }
});