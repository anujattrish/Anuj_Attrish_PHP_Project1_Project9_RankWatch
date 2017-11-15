<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
	  <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
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
				margin-top:180px;
				background:rgba(255,255,255,.25); 
				padding-bottom:20px; 
				box-shadow:0 1px 3px rgba(0,0,0,.2); 
				border-radius:4px
			}
			.form-control{
				border-radius:0 3px 3px 0; 
				border:none; 
				color:#fff; 
				outline:none !important; 
				box-shadow:none !important; 
				background:#4e4a59
			}
			.input-group{
				margin-bottom:15px
			}
			.btn{
				border-radius:3px; 
				border:none; 
				padding:8px; 
				outline:none !important; 
				box-shadow:0 1px 3px rgba(0,0,0,.2);
			}
			@media(max-width:728px){
				.login-form{margin-top:100px}
			}
		</style>
    </head>
    <body>
		<body>
		<div class="container" align="center">
		<div class="col-md-5 col-md-offset-5 login-form text-center">
        </br>
		<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">
			<div class="input-group">
				
				<input class="form-control" placeholder="Email" type="text" name="email"/>
			</div>
			<div class="input-group">
				
				<input class="form-control" placeholder="Password" type="password" name="password" id="password"/>
			</div>
		  
			<input class="btn btn-danger btn-block" type="button" value="Login" onclick="formhash(this.form, this.form.password);" /> 
        </form>
 
		<?php
        if (login_check($mysqli) == true) {
            echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
			echo '<p>Currently logged ' . $logged . '.</p>';
            echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
            }
		?> 
	</div>
	</div>
    </body>
</html>