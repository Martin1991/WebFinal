$(document).ready(function() { 
	
	$("#datepicker").datepicker(); 

	$(".login").click(function(event){
		event.preventDefault();
		$(".overlay").fadeToggle("fast");
	});
	$(".close").click(function(){
		$(".overlay").fadeOut("fast");
	});
	$(".overlay").click(function(){
		$(".overlay").fadeToggle("fast");
	});
	$(".login-wrapper").click(function(event){
		event.stopPropagation();
	});
	$(".register").click(function(event){
		event.preventDefault();
		$(".register-overlay").fadeToggle("fast");
	});
	$(".close").click(function(){
		$(".register-overlay").fadeOut("fast");
	});
	$(".register-overlay").click(function(){
		$(".register-overlay").fadeToggle("fast");
	});



	// $(".tourdelete").click(function(){
	// 	if (confirm('Are you sure you want to DELETE this tour??')) {
	// 	} else {
	// 		$( ".form_1" ).submit(function( event ) {
	// 		  event.preventDefault();
	// 		});
	// 	}
	// });
	$(".tourdelete").click(function(){
		if (confirm('Are you sure you want to DELETE this tour??')) {
			$(".form_1").unbind("submit");	

		} else {
			$( ".form_1" ).submit(function(event) {
			  event.preventDefault();  
			});
		}
	});

	$(".touredit").click(function(){
		
			$(".form_1").unbind("submit");
	});


	//check user name
    var x_timer;    
    $("#new_username").keyup(function (e){
        clearTimeout(x_timer);
        x_timer = setTimeout(function(){
            username_check();
        }, 1000);
    }); 
    

	//Check if password is strong enough
	$('#pswd-info').hide();
	$('form #new_password_1').keyup(function(){	
		password_chek();	
	});
	$('form #new_password_1').focus(function(){
		$('#pswd-info').show();
	});
	$('form #new_password_1').blur(function(){
		$('#pswd-info').hide();
	});


	
});

	//check user name
	function username_check(){
		var e = document.getElementById("new_username");
		var str = e.value;
		
		if(str==""||str==null){
			document.getElementById("user-result").innerHTML ="";
			
			return;
		}else {
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
					//alert(xmlhttp.responseText);
					var txt = xmlhttp.responseText;
					var txt1 = txt.slice(-1);
					//alert(txt1);
					
					if (txt1 == '1') {
						document.getElementById("user-result").innerHTML = "Exists";
						flag = false;
						
					} else {
						//alert(txt);
						document.getElementById("user-result").innerHTML = "OK";
						flag = true;
					}
					
				}
			}
			//alert(str);
			xmlhttp.open("GET","sign_up.php?q="+str, true);
			xmlhttp.send();
		}
		return flag;
	}


	//check if all mandatory fileds are filled out
	function mandatory_check() {
		var flag = true;
	    $('form .required').each(function() {
	        if ($(this).val() == "") {
	            alert('Please enter a value for ' + $(this).attr('name'));
	            flag = false;
	        } 
	    });
	 	return flag;

	}
	//Check if password is strong enough
	function password_chek(){
    		var pswd = $('form #new_password_1').val();
			
			if(pswd.length < 8){
				 $('#length').removeClass('valid').addClass('invalid');
				a = false;
			} else {
				$('#length').removeClass('invalid').addClass('valid');
				a = true;
			}

			if(pswd.match(/[A-z]/)){
				$('#letter').removeClass('invalid').addClass('valid');
				b = true;
				
			} else {
				$('#letter').removeClass('valid').addClass('invalid');
				b= false;
			}

			if(pswd.match(/[A-Z]/)){
				$('#capital').removeClass('invalid').addClass('valid');
				c = true;
				
			} else {
				 $('#capital').removeClass('valid').addClass('invalid');
				 c = false;
			}

			if(pswd.match(/\d/)){
				 $('#number').removeClass('invalid').addClass('valid');
				d = true;
				
			} else {
				$('#number').removeClass('valid').addClass('invalid');
				d = false;
			}
			//alert(a);
			if (a==true&&b==true&&c==true&&d==true) {return true;} else { return false;}	
    }
    //form validation main function
    function validateForm(){
		  var validation = true;
		  validation &= password_chek();
		  validation &= mandatory_check();
		  validation &= username_check();
		 
		  if (validation == 0) {
		  	return false;
		  } else{
		  	return true;
		  }
		}



