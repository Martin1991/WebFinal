function showName()
{
  var str=$("#year").val();
  if (str=="")
  {
	document.getElementById("maleName").innerHTML="";
	document.getElementById("femaleName").innerHTML="";
	return;
  }
  else
  {
	  if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
	  }
	  else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		  {
			document.getElementById("maleName").innerHTML=xmlhttp.responseText;
		  }  
	  }
	  xmlhttp.open("GET","babynames.php?q="+str+"&sid="+0,true);    //?: represent there are parameters following
	  xmlhttp.send();                                               //&: connect different parameters
	  
	  xmlhttp1.onreadystatechange=function(){
		  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		  {
			document.getElementById("femaleName").innerHTML=xmlhttp1.responseText;
		  }  
	  }
	  xmlhttp1.open("GET","babynames.php?q="+str+"&sid="+1,true);
	  xmlhttp1.send();
  }
}