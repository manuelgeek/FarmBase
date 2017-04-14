
$('document').ready(function()
{ 
    
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#register-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : '../register.php',
			data : data,
			beforeSend: function()
			{	
				$("#error1").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span style="color:orange;"> &nbsp; Sending...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-login").html('<span style="color:green;"><img src="img/btn-ajax-loader.gif" /> &nbsp; <p style="color:green;">Registering Account ...</p></span>');
						setTimeout(' window.location.href = "farmer_signup.php"; ',4000);
					}
					else{
									
						$("#error1").fadeIn(1000, function(){						
				$("#error1").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register ');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});