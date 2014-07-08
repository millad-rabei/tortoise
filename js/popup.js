$(document).ready(function(){

	$('.add,.edit,.delete,.adduser').click(function(){

			var id = $(this).attr("id");
			var type = $(this).attr("class");
			var table = $(this).attr("rel");
			var value = $(this).attr("value");
	
			//soloution 1
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table , 'value' : value},
					function(data){
						if (type=="adduser" ) {
							$('#popup-wrap').removeClass('small');
							$('#popup-wrap').addClass('large');
						}else{
							$('#popup-wrap').removeClass('large');
							$('#popup-wrap').addClass('small');
						};
						$('div#popup-wrap').html(data);
						$('#popup-wrap').show();
					}
			 );

			//soloution 2
			/*
			//show popup
			if(type=="add"){
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table},
					function(data){
						$('div.popup-wrap').html(data);
						$('#popup-add').show();
					}
			 );
			}

			if(type=="edit"){
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table},
					function(data){
						$('div.popup-wrap').html(data);
						$('#popup-edit').show();
					}
			 );
			}
			if(type=="delete"){
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table},
					function(data){
						$('div.popup-wrap').html(data);
						$('#popup-delete').show();
					}
			 );
			}

			*/
		return false;
	});




});