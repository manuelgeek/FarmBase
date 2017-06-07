// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		 // name validation
		  var nameregex = /^[a-zA-Z ]+$/;
		 
		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 }); 
		 
		  // asawa_no validation
		  var asawaregex = /^[0-9]+$/;
		 
		 $.validator.addMethod("validno", function( value, element ) {
		     return this.optional( element ) || asawaregex.test( value );
		 }); 
		 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
		 
		 $("#register-form").validate({
					
		  rules:
		  {
				full_name: {
					required: true,
					validname: true,
					minlength: 4
				},
				check: {
					required: true
				},
				email: {
					required: true,
					validemail: true
				},
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				password_again: {
					required: true,
					equalTo: '#password'
				},
				phone_no: {
					required: true,
					validno: true,
					minlength: 8,
					maxlength: 14
				},
				tsc_no: {
					required: true,
					validno: true,
					minlength: 5
				},
				
		   },
		   messages:
		   {
				full_name: {
					required: "Please Enter Full Name",
					validname: "Name must contain only alphabets and space",
					minlength: "Your Name is Too Short"
					  },
				check: {
					 required: "Please Accept  Terms and Conditions",
					  validcheck: "Please Accept Terms and Conditions"
				},
			    email: {
					  required: "Please Enter Email Address",
					  validemail: "Enter Valid Email Address"
					   },
				password:{
					required: "Please Enter Password",
					minlength: "Password at least have 8 characters"
					},
				password_again:{
					required: "Please Retype your Password",
					equalTo: "Password Did not Match !"
					},
				form: {
					required: "Please Select Form"
				},
				stream: {
					required:"Please select Stream"
				},
				phone_no: {
					required: "Please Enter Phone No",
					validno: "Please Enter No only",
					minlength: "Please Enter Valid Phone No"
				},
				tsc_no: {
					required: "Please Enter TSC No",
					validno: "Please Enter No only",
					minlength: "Please Enter More Than 5 "
				}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('');}
		  //  },
		   
		  //  		submitHandler: function(form){
					
				// 	alert('All Details filled. Press Ok To Sign Up');
				// 	form.submit();
				// 	//var url = $('#register-form').attr('action');
				// 	//location.href=url;
					
				// }
				
				/*submitHandler: function() 
							   { 
							   		alert("Submitted!");
									$("#register-form").resetForm(); 
							   }*/
		   
		   }); 
		   
		   
		   /*function submitForm(){
			 
			   
			   /*$('#message').slideDown(200, function(){
				   
				   $('#message').delay(3000).slideUp(100);
				   $("#register-form")[0].reset();
				   $(element).closest('.form-group').find("error").removeClass("has-success");
				    
			   });
			   
			   alert('form submitted...');
			   $("#register-form").resetForm();
			      
		   }*/
});


