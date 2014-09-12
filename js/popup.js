$(document).ready(function(){

	$('.add,.edit,.edituser,.delete,.adduser,.addtitle2,.addletter_internal,.addletter_incoming,.addletter_external').click(function(){
			$('#loading').show('slide', {direction: 'left'},  500 );
			var id = $(this).attr("id");
			var type = $(this).attr("class");
			var table = $(this).attr("rel");
			var value = $(this).attr("value");
			var userid = $(this).attr("userid");
			
			//soloution 1
			$.post("../createpopup.php",
					{'id': id , 'type': type ,'table': table , 'value' : value , 'userid' : userid},
					function(data){
						if (type=="adduser" || type=="edituser" || type=="addletter_internal"|| type=="addletter_incoming"|| type=="addletter_external") {
							$('#popup-wrap').removeClass('small');
							$('#popup-wrap').removeClass('big');
							$('#popup-wrap').addClass('large');
						}
						/*						
							to big popup 
							else if (type=="addletter") {
							$('#popup-wrap').removeClass('small');
							$('#popup-wrap').removeClass('large');
							$('#popup-wrap').addClass('big');
						}*/
						else{
							$('#popup-wrap').removeClass('large');
							$('#popup-wrap').removeClass('big');
							$('#popup-wrap').addClass('small');
						};
						$('div#popup-wrap').html(data);
						$('#popup-wrap').show();
						$('#loading').hide('slide', {direction: 'right'}, 500 );
					}
			 );


		return false;
	});



});