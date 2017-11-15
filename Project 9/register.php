<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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
				background:rgba(255,255,255,.25); 
				padding-bottom:20px; 
				box-shadow:0 1px 3px rgba(0,0,0,.2); 
				border-radius:4px
			}
			.form-control{
				border-radius:3px; 
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
			ul{
				font-size:13px;
				text-align:left;
			}
		</style>
    </head>
    <body>
		<div class="container" align="center">
		<div class="col-md-5 col-md-offset-5 login-form text-center">
        </br>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h3>Register</h3>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">
            <div class="input-group">
			<input class="form-control" placeholder="Username" type='text' name='username' id='username' />
			</div>
            <div class="input-group">
			<input class="form-control" placeholder="Email" type="text" name="email" id="email" />
			</div>
            <div class="input-group">
			<input class="form-control" placeholder="Password" type="password" name="password" id="password"/>
			</div>
			<ul>
				<li>Passwords must be at least 6 characters long</li>
				<li>Passwords must contain at least one uppercase letter, one lowercase letter and one number</li>
			</ul>
            <div class="input-group">
			<input class="form-control" placeholder="Confirm Password" type="password" name="confirmpwd" id="confirmpwd" />
			</div>
            <input class="btn btn-danger btn-block" type="button" value="Register" onclick="return regformhash(this.form,
																				this.form.username, 
																				this.form.email,
																				this.form.password,
																				this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="login.php">login page</a>.</p>
    </body>
</html>