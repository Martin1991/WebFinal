<?php
echo "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN'
'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
	    <meta name='description' content='This is Local Guider!' />
	    <meta name='keywords' content='Local Guider, travel' />
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
	    <link href='css/thanks.css' type='text/css' rel='stylesheet'/>
		<link href='css/bootstrap.min.css' type='text/css' rel='stylesheet'/>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Tangerine'>
        <link href='images/my_icon.ico'  type='image/x-icon' rel='icon' />	
		<script src='js/jquery-1.9.1.min.js'></script>
		<script src='js/search_tourDetail.js'></script>
		
		<link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'/> 
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script> 
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js'></script> 
		<script> $(document).ready(function() { $('.datepicker').datepicker(); }); </script>
		<title>Thanks page</title>
	</head>
	<h1 class='admin_head'>Thanks for placing your order !</h1>
	<body>
		<div class='container'>
			<div class='pic_div col-md-6'>
				<a href='localguider.php'><img src='images/admin/admin1.jpg' id='admin_pic1' class='admin_pic' value='Go back to Homepage' alt='Go back to Homepage' title='Go back to Homepage'/></a>
				<p>Go back to Homepage</p>
			</div>
			<div class='pic_div col-md-6'>
				<a href='userResult.php' ><img src='images/admin/admin2.jpg' id='admin_pic2' class='admin_pic' value='Go to order history alt='Go to order history' title='Go to order history'/></a>
				<p>Go to Order History</p>
			</div>
		</div>
	</body>
</html>  ";
?>