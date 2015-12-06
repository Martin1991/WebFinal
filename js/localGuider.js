$(document).ready(function() {
	$('img.pic_submit').click(function(){
		  if($(this).attr('value')=="Beijing")
		  {
			  //alert("Beijing");
			  document.getElementById('Location').value="Beijing";
		  } 
		  else if($(this).attr('value')=="Bangkok")
		  {
			  //alert("Bangkok");
			  document.getElementById('Location').value="Bangkok";
		  } 
		  else if($(this).attr('value')=="Moscow")
		  {
			  //alert("Moscow");
			  document.getElementById('Location').value="Moscow";
		  } 
		  else if($(this).attr('value')=="NewYork")
		  {
			  //alert("NewYork");
			  document.getElementById('Location').value="NewYork";
		  } 
		  else if($(this).attr('value')=="Paris")
		  {
			  //alert("Paris");
			  document.getElementById('Location').value="Paris";
		  } 
		  else if($(this).attr('value')=="Seoul")
		  {
			  //alert("Seoul");
			  document.getElementById('Location').value="Seoul";
		  } 
		  else if($(this).attr('value')=="Tokyo")
		  {
			  //alert("Tokyo");
			  document.getElementById('Location').value="Tokyo";
		  } 
		  else if($(this).attr('value')=="NewDelhi")
		  {
			  //alert("NewDelhi");
			  document.getElementById('Location').value="New Delhi";
		  } 
		  else if($(this).attr('value')=="Singapore")
		  {
			  //alert("Singapore");
			  document.getElementById('Location').value="Singapore";
		  } 
		  $('#searchForm').submit();
	   });
	   
	   $('button').click(function(){
		   $('#search_tourDetail').submit();
	   });
});