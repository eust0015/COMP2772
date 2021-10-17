

// function toggleResetPswd(e){
//     e.preventDefault();
//     $('#logreg-forms .form-signin').toggle() // display:block or none
//     $('#logreg-forms .form-reset').toggle() // display:block or none
// }

// function toggleSignUp(e){
//     e.preventDefault();
//     $('#logreg-forms .form-signin').toggle(); // display:block or none
//     $('#logreg-forms .form-signup').toggle(); // display:block or none
// }

// $(()=>{
//     // Login Register Form
//     $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
//     $('#logreg-forms #cancel_reset').click(toggleResetPswd);
//     $('#logreg-forms #btn-signup').click(toggleSignUp);
//     $('#logreg-forms #cancel_signup').click(toggleSignUp);
// })


function checkMember(e){
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
        $.post("db_functions.php",
            {
                name : 'login',
                email: email,
                password: password,
            },
            function(data){
                console.log(data);
                if(data[1] == "1"){
                    alert("Welcome to your login.");
                    window.location = "index.php";
                }else{
                    alert("Email or Password is incrrect");
                }
                
            });
        }