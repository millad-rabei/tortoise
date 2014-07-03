$(document).ready(function(){

	$('.add,.edit,.delete').click(function(){

			var id = $(this).attr("id");
			var type = $(this).attr("class");
			var table = $(this).attr("rel");
			var value = $(this).attr("value");
	
			//soloution 1
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table , 'value' : value},
					function(data){
						$('div.popup-wrap').html(data);
						$('.popup').show();
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