$(document).ready(function(){

//show pgt info
$.post("../getpgt.php",
	$("#secform :input").serializeArray(),
	function(data){
	$('.pgt-content').html(data);
});
//hide loading first
$('#loading').hide();
//hide all popup div
$('#popup-wrap').hide();


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

	
	//check when click on button 
	$("#applyperm").submit(function(){

			$.post($("#applyperm").attr("action"),
					$("#applyperm :input").serializeArray(),
					function(data){
						$('.lr').hide();
						$('.lr').html(data);
						$('.lr').fadeIn( "slow" );
					}
			 );

			return false;
		
	});



	//Update Options
	$("#options").submit(function(){


		var orgname = $("input[name='orgname']").val();
		var length1 = orgname.length;

		if (length1 === 0 ){
			alert('لطفا فیلدهای ستاره دار را وارد نمایید');
			 return false;
		}
		else{

			$('.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			//to upload form and FILE must use this method
			var formData = new FormData($(this)[0]);
		    $.ajax({
		        url: $("#options").attr("action"),
		        type: 'POST',
		        data: formData,
		        async: false,
		        success: function (data) {
		            $('.lr').html(data);
						$('.error,.ok').hide();
						$('#loading').hide();
						$('.error,.ok').fadeIn( "slow" );
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });

			return false;
		}
	});




});