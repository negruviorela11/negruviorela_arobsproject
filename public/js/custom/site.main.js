$(document).ready(function() {
    $('.actions span').tooltip();
    $('.alert').alert();
    $('.deletemess').click(function(){
        var id = $(this).attr('id');
        var idpost = id.split("_")[1];
            var newhref = 'http://localhost/ArobsProject/public/delete/message/'+idpost;
            $('#confdeletemess').attr('href',newhref); 
    });
    $('.deletemess1').click(function(){
        var id = $(this).attr('id');
        var idpost = id.split("_")[1];
            var newhref = 'http://localhost/ArobsProject/public/delete/message/inbox/'+idpost;
            $('#confdeletemess1').attr('href',newhref); 
    });
    $('.deletemess2').click(function(){
        var id = $(this).attr('id');
        var idpost = id.split("_")[1];
            var newhref = 'http://localhost/ArobsProject/public/delete/message/sent/'+idpost;
            $('#confdeletemess2').attr('href',newhref); 
    });
     $('.deletemess3').click(function(){
        var id = $(this).attr('id');
        var idpost = id.split("_")[1];
            var newhref = 'http://localhost/ArobsProject/public/delete/message/draft/'+idpost;
            $('#confdeletemess3').attr('href',newhref); 
    });
    $('#canceldelmess').click(function(){
       $('#myModal').modal('hide');
    });
    $('#canceldelpost').click(function(){
       $('#myModal').modal('hide');
    });
    
    $('#validate-user').validate({
        rules:{
            name: {required:true,minlength:3,maxlength:50},
            surname:{required:true,minlength:3,maxlength:50},
            username:{required:true,minlength:3,maxlength:50},
            password:{required:true,minlength:3,maxlength:50},
            birthday:{required:true,minlength:10,maxlength:10},
            email:{required: true,email: true},
            gender:{required:true},
            question:{required:true},
            remember:{required:true,minlength:3,maxlength:50}
        },
        messages:{
            name:{required:"The name field is required",
                  minlength:"The name must be at least 3 characters",
                  maxlength:"The name must be no more than 50 characters"},
            surname:{
                  required:"The surname field is required",
                  minlength:"The surname must be at least 3 characters",
                  maxlength:"The surname must be no more than 50 characters"},
            username:{
                  required:"The username field is required",
                  minlength:"The username must be at least 3 characters",
                  maxlength:"The username must be no more than 50 characters"},
            
            
            password:{
                  required:"The password field is required",
                  minlength:"The password must be at least 3 characters",
                  maxlength:"The password must be no more than 50 characters"},
            birthday:{
                  required:"The birthday field is required",
                  minlength:"The birthday must be of format yy/mm/dd",
                  maxlength:"The birthday must be of format yy/mm/dd"},
            email:{
                  required: "The email field is required",
		  email: "The email is not valid"},
            gender:{
                  required: "The gender field is required"},
            remember:{
                  required:"The answer field is required",
                  minlength:"The answer must be at least 3 characters",
                  maxlength:"The answer must be no more than 50 characters"}
        }
                
    });

    $('#user-edit').validate({
        rules:{
            name: {required:true,minlength:3,maxlength:50},
            surname:{required:true,minlength:3,maxlength:50},
            username:{required:true,minlength:3,maxlength:50},
            birthday:{required:true,minlength:10,maxlength:10},
            email:{required: true,email: true},
            gender:{required:true},
            question:{required:true},
            remember:{required:true,minlength:3,maxlength:50}

            
        },
        messages:{
            name:{required:"The name field is required",
                  minlength:"The name must be at least 3 characters",
                  maxlength:"The name must be no more than 50 characters"},
            

            surname:{
                  required:"The surname field is required",
                  minlength:"The surname must be at least 3 characters",
                  maxlength:"The surname must be no more than 50 characters"},
            username:{
                  required:"The username field is required",
                  minlength:"The username must be at least 3 characters",
                  maxlength:"The username must be no more than 50 characters"},
            
            birthday:{
                  required:"The birthday field is required",
                  minlength:"The birthday must be of format yy/mm/dd",
                  maxlength:"The birthday must be of format yy/mm/dd"},
            email:{
                  required: "The email field is required",
		  email: "The email is not valid"},
            gender:{
                  required: "The gender field is required"},
            question:{required:"The question field is required"},
            remember:{
                  required:"The answer field is required",
                  minlength:"The answer must be at least 3 characters",
                  maxlength:"The answer must be no more than 50 characters"}
            

          
        }
    });
    
    $('#log-in').validate({
         rules: {
    		username:{required:true,minlength:3,maxlength:50},
    		password: {required:true,minlength:3,maxlength:50},
        messages:{
                username:{
                  required:"The username field is required",
                  minlength:"The username must be at least 3 characters",
                  maxlength:"The username must be no more than 50 characters"},
		password: {
			required:"The password field is required.",
			minlength:"The password must be at least 3 characters.",
                        maxlength:"The password must be no more than 50 characters"
			}
                    }
                }
    });
});