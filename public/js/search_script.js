var trigger = false;

$('.search-container input').keypress(function(event){
	if($(this)["0"].value!="" && event.which==13 && trigger==false){
		$('body').css("overflow","visible");
		$(".search-container *").animate({
			"border-radius":"0"
		},200,function(){});
		$(this).parent().parent().css("width","50%");
		$(this).parent().parent().animate({
			margin:"0"	
		},200,function(){
			trigger=true;
			$('.info').css("visibility","hidden");
			$('.content').toggleClass("content-active").animate({
				height:"125%",
				top:"-90px"
			},100,function(){});
		});		
	}

});
/*"
*/

$('.content .close-btn').click(function(){
	$(this).parent().animate({
		height:"0",
		top:"560px"
	},100,function(){
		trigger=false;
		$(this).toggleClass("content-active");
		$(".search-container").animate({
		"margin-left":"40%",
		"margin-top":"20%"		
		},100,function(){
			$('body').css("overflow","hidden");
			$(this).find('.info').css("visibility","visible");
		});
	});
});

$(".content .content-element").css({
								"margin-top":"50px",
								"display":"grid",
								"grid-template-columns": "450px 450px",
    							"grid-template-rows": "400px 400px",
    							"grid-auto-flow": "column"});
$(".content .content-element .inner").css({
	"overflow": "hidden"
});
$(".content .content-element .item .inner").hover(function(){
	$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"-80px"});
},function(){
	$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"0px"});
});
/*$('.content .content-element').append("<div>Text</div>");
$('.content .content-element').append("<div>Text1</div>");
$('.content .content-element').append("<div>Text2</div>");
$('.content .content-element').append("<div>Text2</div>");

$(".content .content-element div").css({
										"width":"150px",
										"height":"150px",
										"background-color":"red",
										"margin":"5px"
										});
*/