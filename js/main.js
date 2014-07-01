$(document).ready(function(){
//fetch 	
$('.pgt-content').load('../getpgt.php');
//hide loading first
$('#loading').hide();
//hide all popup div
$('.popup').hide();
	//check login-username and login-password field
	$('.login-username , .login-password').keyup(function(){
		var value = $(this).val();
		var length = value.length;
		if (length == 0 ){
			 $( this ).css( {"border-color":"red" , "background" : "#FEE0CC"} );
			 $('.button').attr('disabled','disabled');
		}
		else{
			$( this ).css( {"border-color":"#999999" , "background" : "white"} );
			$('.button').removeAttr('disabled');
		}
	});

	//check when click on button 
	$("#login-form").submit(function(){
		var value1 = $('.login-username').val();
		var length1 = value1.length;
		var value2 = $('.login-password').val();
		var length2 = value2.length;
		if (length1 == 0  || length2 == 0){
			 $( '.login-username , .login-password' ).css( {"border-color":"red" , "background" : "#FEE0CC"} );
			 $('.button').attr('disabled','disabled');


			 return false;
		}
		else{
			$( '.login-username , .login-password' ).css( {"border-color":"#999999" , "background" : "white"} );
			$('.button').removeAttr('disabled');
			
			$.post($("#login-form").attr("action"),
					$("#login-form :input").serializeArray(),
					function(data){
						$('.lr').hide();
						$('.lr').html(data);
						$('.lr').fadeIn( "slow" );
					}
			 );

			return false;
		}
	});



	//Save New PGT 
	$("#pgt-form").submit(function(){
		
		var value1 = $('.pgt').val();
		var length1 = value1.length;
		if (length1 == 0 ){
			 $( '.pgt' ).css( {"border-color":"red" , "background" : "#FEE0CC"} );
			 //$('.btn').attr('disabled','disabled');


			 return false;
		}
		else{
			$('#error,#ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			$.post($("#pgt-form").attr("action"),
					$("#pgt-form :input").serializeArray(),
					function(data){
						$('.pgt-msg').html(data);
						$('#error,#ok').hide();
						$('#loading').hide();
						$('#error,#ok').fadeIn( "slow" );
						//update info
						$.post("../getpgt.php",
							$("#pgt-form :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		}
	});


	
});