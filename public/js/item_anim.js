$(".content .content-element .item .inner").hover(function(){
	$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"-80px"});
},function(){
	$(this).find(".coupon-info").css({"transition":"0.2s","position":"relative","top":"0px"});
});