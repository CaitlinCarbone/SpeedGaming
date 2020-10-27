//Hide or Show password function
function displayEye(){
    //Local Variables
    var password = document.getElementById("password");
    var eye = document.getElementById("hide1");
    var eyeHidden = document.getElementById("hide2");
    
    //Function
    if(password.type==='password'){
        password.type = "text";
        eye.style.display = "block";
        eyeHidden.style.display = "none";
    }
    else{
        password.type = "password";
        eye.style.display = "none";
        eyeHidden.style.display = "block"; 
    }
}