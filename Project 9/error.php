<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
        <link rel="stylesheet" href="styles/main.css" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <title>Log In</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<style>
			html,body{
				height:100%; 
				width:100%
			}
			body{
				overflow: hidden;
				background-image:url('laptop-on-work-desk.jpg'); 
				background-position:center center; 
				background-size:cover;
				background-repeat:no-repeat;
				margin-bottom:0;
			}
			.login-form{
				margin-top:130px; 
				padding-bottom:20px; 
			}
			@media(max-width:728px){
				.login-form{margin-top:100px}
			}
			</style>
    </head>
    <body>
		<div class="container" align="center">
		<div class="col-md-5 col-md-offset-5 login-form text-center">
        </br>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
    </div>
	</div>
	</body>
</html>