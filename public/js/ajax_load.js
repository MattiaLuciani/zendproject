var offset = 8;
var globaldata;
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
         $.post('public/onscroll/',offset,
         	function (data) {
         		console.log(data);
         		globaldata = data;
         		offset+=8;
         		for(var i = 0;i<data.length;i++){
         			createTemplate(data[i]);	
         		}
         		initJQuery();
         	
         },"json");
         console.log("Page load");
    }
    
});

function createTemplate(object){
	$(".content .content-wrapper .content-element").append("<div class = 'item'>"+
		"<div class = 'inner'>"+
 			"<div class = 'wrapper'>"+
 				"<img src='http://placehold.it/300x300'>"+
 				"<div class='coupon-info'>"+
 					"<span>"+object.price+"</span>"+
 					"<button class='coupon-button'>Info</button>"+
 				"</div>"+
         		"<div class='item-popup'>"+
	         		"<i class='fa fa-close close-item-popup' style='color:black;position:relative;left:96%;top:5px;font-size:1.3rem'></i>"+
	         		"<span class='company'>"+object.company+"</span>"+
	         		"<div class='description'>"+
						"<span class='description'>"+object.description+"</span>"+
					"</div>"+
					"<div class='date-wrapper'>"+
						"<div class = 'date'>"+
		 					"<span>Data di Inizio</span>"+
		 					"<span class='date-begin'>"+object.datebegin+"</span>"+	
		 				"</div>"+
		 				"<div class = 'date'>"+
		 					"<span>Data di Inizio</span>"+
		 					"<span class='date-end'>"+object.datefine+"</span>"+	
		 				"</div>"+
					"</div>"+
					"<div class='links'>"+
						"<a href=''>Azienda</a>"+										
						"<a href=''>Acquistare</a>"+
					"</div>"+
	         	"</div>"+
	     	"</div>"+
	 	"</div>");

}
function initJQuery(){
		$(".content .content-wrapper .content-element .item .inner").hover(function(){
		$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"-80px"});
	},function(){
		$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"0px"});
	});

	$('.coupon-button').click(function() {
		if(!clicked){
			clicked = true;
			console.log("clicked");
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
				})
				clicked = false;
			});
		}
	});
}
