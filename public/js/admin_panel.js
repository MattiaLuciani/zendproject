var actionstring = "admin/";
postobject = new Object;

$.when( $.ready ).then(function() {
    $('.operation').click(function(){

        var id = $(this).parent().parent().parent().find(':first-child').first()["0"].innerText;
        postobject.id = id;

        console.log(postobject);

        if($(this).hasClass('update')){
            actionstring+="editAjax/";
            console.log(actionstring);
        }
        else if($(this).hasClass('delete')){
            actionstring+="delete/";
            console.log(actionstring);   
        }

        $.post("admin/editajax/",postobject,
        function (data) {
            initJQuery();
            console.log(data);                
        },"json");
        
    });
});

/*$.when( $.ready ).then(function() {
	
 $.get('admin/edit/',getObject,
 	function (data) {
 		//console.log(offset);
 		getObject.offset+=8;
 		for(var i = 0;i<data.length;i++){
 			createTemplate(data[i]);	
 		}
 		initJQuery();
 		if(data.length==0){

 		}
		         	
 },"json");
 console.log("Page load");
    
    
});*/