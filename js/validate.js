$(document).ready(function() {
	$("#file").after("<span id=\"fileinfo\"></span>");
	$("#first_name").after("<span id=\"firstnameinfo\"></span>");
	$("#last_name").after("<span id=\"lastnameinfo\"></span>");
	$("#phone").after("<span id=\"phoneinfo\"></span>");
	$("#occupation").after("<span id=\"occupationinfo\"></span>");
	$("#sex").after("<span id=\"sexinfo\"></span>");
	$(".dob").after("<span id=\"dobinfo\"></span>");
	$("#password").after("<span id=\"passwordinfo\"></span>");
	$("#email").after("<span id=\"emailinfo\"></span>");
	$("span").hide();

	$("#file").focus(function(){
		$("#fileinfo").text("Profile picture is required");
		$("#fileinfo").removeClass();
		$("#fileinfo").addClass("info");
		$("#fileinfo").show();
	});

	$("#file").blur(function(){
		var inputValue = $("#file").val();
		
		if(inputValue != ""){
		    if (inputValue.indexOf('-') != -1) {
			    $("#fileinfo").text("The file name can not contain special characters.");
			    $("#fileinfo").removeClass();
			    $("#fileinfo").addClass("error");
			    
			} else {
				$("#fileinfo").text("Upload successfully!");
			    $("#fileinfo").removeClass();
			    $("#fileinfo").addClass("ok");

			}
		} else{
			$("#fileinfo").show();

		}

	});

	$("#first_name").focus(function(){
		$("#firstnameinfo").text("First name is required");
		$("#firstnameinfo").removeClass();
		$("#firstnameinfo").addClass("info");
		$("#firstnameinfo").show();

	});

	$("#first_name").blur(function(){
		
		var re= /^[a-zA-Z]*$/;
		var inputValue = $("#first_name").val();
		var is_firstname = re.test(inputValue);
		if(inputValue != ""){
		    if (is_firstname == true) {
			    $("#firstnameinfo").text("OK");
			    $("#firstnameinfo").removeClass();
			    $("#firstnameinfo").addClass("ok");
			    
			} else {
				$("#firstnameinfo").text("Character Only.");
			    $("#firstnameinfo").removeClass();
			    $("#firstnameinfo").addClass("error");

			}
			} 
		 else{
			$("#firstnameinfo").show();

		}

	});


		$("#last_name").focus(function(){
		$("#lastnameinfo").text("Last name is required");
		$("#lastnameinfo").removeClass();
		$("#lastnameinfo").addClass("info");
		$("#lastnameinfo").show();

	});

	$("#last_name").blur(function(){
		var re= /^[a-zA-Z]*$/;
		var inputValue = $("#last_name").val();
		var is_lastname = re.test(inputValue);
		if(inputValue != ""){
		    if (is_lastname == true) {
			    $("#lastnameinfo").text("OK");
			    $("#lastnameinfo").removeClass();
			    $("#lastnameinfo").addClass("ok");
			    
			} else {
				$("#lastnameinfo").text("Character Only.");
			    $("#lastnameinfo").removeClass();
			    $("#lastnameinfo").addClass("error");

			}
			} 
		 else{
			$("#lastnameinfo").show();

		}

	});




	$("#phone").focus(function(){
		$("#phoneinfo").text("Phone number is required.");
		$("#phoneinfo").removeClass();
		$("#phoneinfo").addClass("info");
		$("#phoneinfo").show();

	});

	$("#phone").blur(function(){
		var re= /^[0-9]*$/;
		var inputValue = $("#phone").val();
		var is_phonenumber = re.test(inputValue);
		
		if(inputValue != ""){
		    if (inputValue.length == 10 ) {
			    $("#phoneinfo").text("OK");
			    $("#phoneinfo").removeClass();
			    $("#phoneinfo").addClass("ok");
			    
			} else {
				$("#phoneinfo").text("Number only and 10 numbers long.");
			    $("#phoneinfo").removeClass();
			    $("#phoneinfo").addClass("error");

			}
			} else {
			$("#phoneinfo").show();

		}
	

});




	$("#occupation").focus(function(){
		$("#occupationinfo").text("Occupation is required.");
		$("#occupationinfo").removeClass();
		$("#occupationinfo").addClass("info");
		$("#occupationinfo").show();
	});

	$("#occupation").blur(function(){
		var inputValue = $("#occupation").val();
		
		if(inputValue != ""){
		   $("#occupationinfo").text("OK");
		   $("#occupationinfo").removeClass();
	       $("#occupationinfo").addClass("ok");
			}
		 else{
			$("#occupationinfo").show();

		}

	});


	$("#sex").focus(function(){
		$("#sexinfo").text("Gender is required.");
		$("#sexinfo").removeClass();
		$("#sexinfo").addClass("info");
		$("#sexinfo").show();
	});

	$("#sex").blur(function(){
		var inputValue = $("#sex option:selected").val();
		
		if(inputValue != ""){
		   $("#sexinfo").text("OK");
		   $("#sexinfo").removeClass();
	       $("#sexinfo").addClass("ok");
			}
		 else{
			$("#sexinfo").show();

		}

	});

	$(".dob").focus(function(){
		$("#dobinfo").text("Please select your date of birth.");
		$("#dobinfo").removeClass();
		$("#dobinfo").addClass("info");
		$("#dobinfo").show();

	});

	$(".dob").blur(function(){
		var inputValue = $(".dob option:selected").val();
		
		if(inputValue != ""){
		   $("#dobinfo").text("OK");
		   $("#dobinfo").removeClass();
	       $("#dobinfo").addClass("ok");
			}
		 else{
			$("#dobinfo").show();

		}

	});




	$("#password").focus(function(){
		$("#passwordinfo").text("Please select your gender.");
		$("#passwordinfo").removeClass();
		$("#passwordinfo").addClass("info");
		$("#passwordinfo").show();

	});

	$("#password").blur(function(){
		var inputValue = $("#password").val();
		if(inputValue != ""){
		    if (inputValue.length > 7) {
			    $("#passwordinfo").text("OK");
			    $("#passwordinfo").removeClass();
			    $("#passwordinfo").addClass("ok");
			    
			} else {
				$("#passwordinfo").text("At least 8 characters long");
			    $("#passwordinfo").removeClass();
			    $("#passwordinfo").addClass("error");

			}
		} else{
			$("#passwordinfo").hide();

		}

	});




	$("#email").focus(function(){
		$("#emailinfo").text("Email is required.");
		$("#emailinfo").removeClass();
		$("#emailinfo").addClass("info");
		$("#emailinfo").show();

	});



	$("#email").blur(function(){
		var inputValue = $("#email").val();
		
		if(inputValue != ""){
		    if (inputValue.indexOf('@') != -1) {
			    $("#emailinfo").text("OK");
			    $("#emailinfo").removeClass();
			    $("#emailinfo").addClass("ok");
			    
			} else {
				$("#emailinfo").text("Please input a valid email address");
			    $("#emailinfo").removeClass();
			    $("#emailinfo").addClass("error");

			}
		} else{
			$("#emailinfo").show();

		}

	});
})