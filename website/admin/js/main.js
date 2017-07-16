
var applicationID = "99728F8E-63FE-49A3-FF81-CCDAF1FC4C00";
var  secretKey = "D62EB2C1-B894-0151-FF72-DB1599A95F00";
var version = "1";
Backendless.initApp(applicationID,secretKey,version);
$(function(){

    $('#login .submit').click(function(e){

        e.preventDefault();
        var email = "julio.fils1@gmail.com" ;
        var password = "manmie" ;

        var emailVal = $('.email').val();
        var passwordVal = $('.password').val();
        if(emailVal=="" || passwordVal=="")
        {
            //toast vides
        }else
        {
            if(emailVal == email && passwordVal == password ){

                // login a users
                Backendless.UserService.register( user );
                var user = new Backendless.User();
                user.email = emailVal;
                user.password = passwordVal;

                try
                {
                    $('#boiteadmin').hide();
                    alert("User are register");
                }

                catch( err )
                {
                    alert( "error message - " + err.message );
                    alert( "error code - " + err.statusCode );
                }

            }else{
                $('.forget').show();
            }
        }

    });
});
