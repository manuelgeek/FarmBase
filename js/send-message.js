$(document).ready(function(){
	
				/* Data Insert Starts Here */
				$(document).on('submit', '#mess-sendForm', function() {
				  
				   $.post("send_message.php", $(this).serialize())
			        .done(function(data){
						$("#dis").fadeOut();
						$("#dis").fadeIn('slow', function(){
							 $("#dis").html('<div class="alert alert-info">'+data+'</div>');
						     $("#mess-sendForm")[0].reset();
					     });	
					 });   
				     return false;
			    });

			  });