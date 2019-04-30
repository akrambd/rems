 function pass_validator()

 {
     var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');

    
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    
   


    if(pass1.value!=""){

        if(pass1.value == pass2.value){
       
        pass2.style.backgroundColor = "#23b75078";
        message.style.color = "green";
        message.innerHTML = "Passwords Match!"
        return true;

    }else{
        
        pass2.style.backgroundColor = "#ff020285";
        message.style.color = "red";
        message.innerHTML = "Passwords Do Not Match!"
        return false;
        }
    }

}