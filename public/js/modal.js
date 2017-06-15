/*var clicked = false;
$(document).ready(function(){
	$('.coupon-button').click(function() {
		if(!clicked){
			clicked=true;
			//console.log($(window).scrollTop());
			$(this).parent().next().css({
				"visibility":"visible",
				"width":"600px",
				"height":"500px",
				"top":$(window).scrollTop(),
				"left":$(document).width()/2-300
			}).find('.description').css({
				"height":"300px"
			});
			$('.fa.fa-close.close-item-popup').click(function(){
				$(this).parent().css({
					"visibility":"hidden",
					"width":"0px",
					"height":"0px"
				});
				$(this).parent().find('.description').css({
					"width":"0px",
					"height":"0px"
				});
				clicked = false;
			});
		}
	});
});*/
$(document).ready(function(){

  $('.coupon-button').click( function() {
  	
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Delete all items": function() {
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
});
