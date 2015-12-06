$(document).ready(function() {
	   
	   $('#checkout_button').click(function(){
		   alert("You are going to check our!");
		   var current_time = new Date();
		   //alert(current_time);
		   $(this).parents('.checkout_div').find('#date_time').attr('value',current_time);
		   //alert($(this).parents('.checkout_div').find('#date_time').val());search_tourDetail
		   $(this).parents('.checkout_div').find('#search_tourDetail').submit();
	   });
	   
	   $('img.tour_pic').click(function(){
		   $(this).parents('.item_result').find('#search_tourDetail').submit();
	   });
	   
	   $('.item_head').click(function(){
		   $(this).parents('.item_result').find('#search_tourDetail').submit();
	   });
	   $('img.guider_pic').click(function(){
		   $(this).parents('.item_result').find('#search_guiderProfile').submit();
	   });
	   
});