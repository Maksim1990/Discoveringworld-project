
$(function() {
	$("#headingPeter").click(function(){
		$("#Pics img")[0].src="public/img/brand.jpg";
                $("#Pics1 img")[0].src="public/img/brand.jpg";
              	});
     	$("#headingDanny").click(function(){
		$("#Pics img")[0].src="public/img/bel.jpg";
                $("#Pics1 img")[0].src="public/img/bel.jpg";
               	});
	$("#headingAgumbe").click(function(){
		$("#Pics img")[0].src="public/img/th1.jpg";
               $("#Pics1 img")[0].src="public/img/th1.jpg";
               	});
	$("#headingAlberto").click(function(){
		$("#Pics img")[0].src="public/img/r.jpg";
                $("#Pics1 img")[0].src="public/img/r.jpg";
            	});
});

$(function() {
$("#phone .phone").mouseover(function(){
		$(this)[0].src="public/img/phonebl23.png";
                });
$("#phone .phone").mouseout(function(){
		$(this)[0].src="public/img/phone.png";
});

});
$(function() {
$("#phone .email").mouseover(function(){
		$(this)[0].src="public/img/emailbl22.png";
                });
$("#phone .email").mouseout(function(){
		$(this)[0].src="public/img/email.png";
});

});
$(function() {
$('.panel-heading').on('click',function(e){
    if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
        e.preventDefault();
        e.stopPropagation();
    }
});

});


$(function(){
  $('select option').bind('click',function(){
      $(this).attr("selected","selected");
      
  });      
});
