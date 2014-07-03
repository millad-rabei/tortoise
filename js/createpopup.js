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
			$('#error,#ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-add").attr("action"),
					$("#pgt-form-add :input").serializeArray(),
					function(data){
						$('.pgt-msg').html(data);
						$('#error,#ok').hide();
						$('#loading').hide();
						$('#error,#ok').fadeIn( "slow" );
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

	//edit PGT 
	$("#pgt-form-edit").submit(function(){
		
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
			
			//run query
			$.post($("#pgt-form-edit").attr("action"),
					$("#pgt-form-edit :input").serializeArray(),
					function(data){
						$('.pgt-msg').html(data);
						$('#error,#ok').hide();
						$('#loading').hide();
						$('#error,#ok').fadeIn( "slow" );
						
						//update info
						$.post("../getpgt.php",
							$("#pgt-form-edit :input").serializeArray(),
							function(data){
								$('.pgt-content').html(data);
						});

					}
			 );

			return false;
		}
	});


		//Delete PGT 
	$("#pgt-form-delete").submit(function(){
		
			$('#error,#ok').hide();
			//show loading ...
			$('#loading').show();
			$( '.pgt' ).css( {"border-color":"#999999" , "background" : "white"} );
			//$('.button').removeAttr('disabled');
			
			//run query
			$.post($("#pgt-form-delete").attr("action"),
					$("#pgt-form-delete :input").serializeArray(),
					function(data){
						$('.pgt-msg').html(data);
						$('#error,#ok').hide();
						$('#loading').hide();
						$('#error,#ok').fadeIn( "slow" );
						
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