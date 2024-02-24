$('#change_password_form').validdate({
    ingore: '.ignore',
    errorClass: 'invalid',
    validClass: 'success',
    rules:{
        password:{
            required:true,
            minlenght:6,
            maxlength:100
        },
        newpassword:{
            required:true,
            minlenght:6,
            maxlength:100
        },
        renewpassword:{
            required:true,
            equalTo:'#newpassword'
        },
    },
    message: {

        password:{
            required: "Enter your old password"
        },
        newpassword:{
            required: "Enter your new password"
        },
        renewpassword:{
            required: "Need to confirm your new password"
        },


    },
    
    submitHandler:function(form){
        $.LoadingOverlay("show")
            form.submit();
    }
});