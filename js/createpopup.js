//draggable popup
$('#popup-wrap').draggable();

//select all checkbox
$('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.receivers_checkbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.receivers_checkbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

//close popup when click close icon
$('#imgclose').click(function(){
	$('#popup-wrap').hide();
});

	//search user from db {like} /////////////////////////////////////
	$(function () {
	var minlength = 3;

    $("#likeuser").keyup(function () {
        var that = this,
        value = $(this).val();

        if (value.length >= minlength ) {
            $.ajax({
                type: "GET",
                url: "../likeuser.php",
                data: {
                    'search_keyword' : value
                },
                dataType: "text",
                success: function(msg){
                    //we need to check if the value is the same
                    if (value==$(that).val()) {
                    //Receiving the result of search here
                     $('.receivers_result').html(msg);
                    }
                }
            });
        }
    });
});
////////////////////////////////////////////////////////////    

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
	//Save New PGT 
	$("#pgt-form-add").submit(function(){
		
		var value1 = $('.pgt').val();
		var length1 = value1.length;
		if (length1 == 0 ){
			 $( '.pgt' ).css( {"border-color":"red" , "background" : "#FEE0CC"} );
			 //$('.btn').attr('disabled','disabled');


			 return false;
		}
		else{
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-add").attr("action"),
					$("#pgt-form-add :input").serializeArray(),
					function(data){
						$('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
						//update info
						$.post("../getpgt.php",
							$("#pgt-form-add :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		}
	});


	//Save New title 
	$("#pgt-form-addtitle").submit(function(){
		
		var value1 = $('.pgt').val();
		var length1 = value1.length;
		if (length1 == 0 ){
			 $( '.pgt' ).css( {"border-color":"red" , "background" : "#FEE0CC"} );
			 //$('.btn').attr('disabled','disabled');


			 return false;
		}
		else{
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-addtitle").attr("action"),
					$("#pgt-form-addtitle :input").serializeArray(),
					function(data){
						$('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
						//update info
						$.post("../getpgt.php",
							$("#pgt-form-addtitle :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		}
	});


	//check new user form fields
	$("input[name='username'],input[name='password'],input[name='confirm-password'],input[name='firstname'],input[name='lastname'],input[name='melicode'],input[name='cellphone'],input[name='birthdate'],input[name='address']").keyup(function(){
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




	//Save New user 
	//for send form data and files you must use FormData($(this)[0])
	$("#pgt-form-adduser").submit(function(){

		var username = $("input[name='username']").val();
		var length1 = username.length;
		var password = $("input[name='password']").val();
		var length2 = password.length;
		var confirmpassword = $("input[name='confirm-password']").val();
		var length3 = confirmpassword.length;
		var firstname = $("input[name='firstname']").val();
		var length4 = firstname.length;
		var lastname = $("input[name='lastname']").val();
		var length5 = lastname.length;
		//var signature = $("input[name='signature']").val();
		//var length6 = signature.length;
		var melicode = $("input[name='melicode']").val();
		var length7 = melicode.length;
		var cellphone = $("input[name='cellphone']").val();
		var length8 = cellphone.length;
		var birthdate = $("input[name='birthdate']").val();
		var length9 = birthdate.length;
		var address = $("input[name='address']").val();
		var length10 = address.length;
		var successor = $("select[name='successor']").val();
		var title1 = $("select[name='title1']").val();
		var title2 = $("select[name='title2']").val();
		if (length1 === 0 || length2===0 || length3===0 || length4===0 || length5===0 || length7===0 || length8===0 || length9===0 || length10===0 ||  title1==="not-select"){
			alert('لطفا فیلدهای ستاره دار را وارد نمایید');
			 return false;
		}
		if(title1===title2){
			alert('سمت اول و دوم نباید یکسان باشد');
			return false;
		}
		else{
		if (password === confirmpassword){
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');

			//to upload form and FILE must use this method
			var formData = new FormData($(this)[0]);
		    $.ajax({
		        url: $("#pgt-form-adduser").attr("action"),
		        type: 'POST',
		        data: formData,
		        async: false,
		        success: function (data) {
		            $('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });
						$.post("../getpgt.php",
							$("#pgt-form-adduser :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

			return false;
			}else{
				alert('رمز عبور مطابقت ندارد . رمز عبور را دو بار وارد کنید');
				return false;
			}
		}
				
	});



	//Edit  user 
	$("#pgt-form-edituser").submit(function(){

		var username = $("input[name='username']").val();
		var length1 = username.length;
		var password = $("input[name='password']").val();
		var length2 = password.length;
		var confirmpassword = $("input[name='confirm-password']").val();
		var length3 = confirmpassword.length;
		var firstname = $("input[name='firstname']").val();
		var length4 = firstname.length;
		var lastname = $("input[name='lastname']").val();
		var length5 = lastname.length;
		//var signature = $("input[name='signature']").val();
		//var length6 = signature.length;
		var melicode = $("input[name='melicode']").val();
		var length7 = melicode.length;
		var cellphone = $("input[name='cellphone']").val();
		var length8 = cellphone.length;
		var birthdate = $("input[name='birthdate']").val();
		var length9 = birthdate.length;
		var address = $("input[name='address']").val();
		var length10 = address.length;
		var successor = $("select[name='successor']").val();
		var title1 = $("select[name='title1']").val();
		var title2 = $("select[name='title2']").val();
		if (length1 === 0 || length2===0 || length3===0 || length4===0 || length5===0 || length7===0 || length8===0 || length9===0 || length10===0 ||  title1==="not-select"){
			alert('لطفا فیلدهای ستاره دار را وارد نمایید');
			 return false;
		}
		if(title1===title2){
			alert('سمت اول و دوم نباید یکسان باشد');
			return false;
		}
		else{
		if (password === confirmpassword){
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//to upload form and FILE must use this method
			var formData = new FormData($(this)[0]);
		    $.ajax({
		        url: $("#pgt-form-edituser").attr("action"),
		        type: 'POST',
		        data: formData,
		        async: false,
		        success: function (data) {
		            $('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });
						$.post("../getpgt.php",
							$("#pgt-form-edituser :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

			return false;
			}else{
				alert('رمز عبور مطابقت ندارد . رمز عبور را دو بار وارد کنید');
				return false;
			}
		}
	});




		//Delete PGT 
	$("#pgt-form-delete").submit(function(){
		
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-delete").attr("action"),
					$("#pgt-form-delete :input").serializeArray(),
					function(data){
						$('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
						
						//update info
						$.post("../getpgt.php",
							$("#pgt-form-delete :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		
	});




		//Edit PGT 
	$("#pgt-form-edit").submit(function(){
		
			$( '.error,.ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-edit").attr("action"),
					$("#pgt-form-edit :input").serializeArray(),
					function(data){
						$('.lr').html(data);
						$( '.error,.ok').hide();
						$('#loading').hide();
						$( '.error,.ok').fadeIn( "slow" );
						
						//update info
						$.post("../getpgt.php",
							$("#pgt-form-edit :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		
	});