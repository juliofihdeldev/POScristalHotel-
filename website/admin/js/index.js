
$(function(){

    $('#login .submit').click(function(e){
        e.preventDefault();

        Backendless.initApp("99728F8E-63FE-49A3-FF81-CCDAF1FC4C00","036ECEE3-49EB-F4F4-FF5C-D69CBB82AD00","1");

        var emailVal = $('.email').val();
        var passwordVal = $('.password').val();
        if(emailVal=="" || passwordVal=="")
        {
            //toast vides
        }else
        {
                var user = new Backendless.User();
                user.email = emailVal;
                user.password = passwordVal;
                try
                {
                    // login a users
                    Backendless.UserService.register( user );
                    $('#boiteadmin').hide();
                    alert("User are register");
                }
                catch( err )
                {
                    alert( "error message - " + err.message );
                    alert( "error code - " + err.statusCode );
                }
        }
    });

});
