// Jquery for Password match 
function email_validator()
{
   var email = document.getElementById('email');
    
    var error_email = document.getElementById('error_email');

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (email.value.match(mailformat)) {

        // error_email.style.color = "green";
        // error_email.innerHTML = "email currect!"
        return true;

    }

    else{

        error_email.style.color = "red";
        error_email.innerHTML = "Please input a valid Email!"
        return false;
    }

}




 function pass_validator()

 {
     var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');

    
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    
   


    if(pass1.value!="" && pass1.value == pass2.value){
       
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


function validation()
{
 var password=pass_validator();
 var email=email_validator();

 if (password && email){

    return true;
 }

    return false;


}






// for email

    // var email = document.getElementById('email');
    
    // var error_email = document.getElementById('error_email');

    // var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // if (email.value.match(mailformat)) {

    //     // error_email.style.color = "green";
    //     // error_email.innerHTML = "email currect!"
    //     return true;

    // }

    // else{

    //     error_email.style.color = "red";
    //     error_email.innerHTML = "Please input a valid Email!"
    //     return false;
    // }


// for password


    // var pass1 = document.getElementById('pass1');
    // var pass2 = document.getElementById('pass2');

    
    // //Store the Confimation Message Object ...
    // var message = document.getElementById('confirmMessage');
    
   


    // if(pass1.value!="" && pass1.value == pass2.value){
       
    //     pass2.style.backgroundColor = "#23b75078";
    //     message.style.color = "green";
    //     message.innerHTML = "Passwords Match!"
    //     return true;

    // }else{
        
    //     pass2.style.backgroundColor = "#ff020285";
    //     message.style.color = "red";
    //     message.innerHTML = "Passwords Do Not Match!"
    //     return false;
    // }