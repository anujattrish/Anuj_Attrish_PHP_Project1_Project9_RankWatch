<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			h1{
				text-align:center;
			}
			body{
				background:#ebebe0;
			}
			.navbar{
				border-radius:0px;
			}
		</style>
    </head>
    <body>
		<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Home</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if (login_check($mysqli) == true) : ?>
				<li><a href="includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				<?php else : ?>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
		</nav>
		<div class="container">
        <?php if (login_check($mysqli) == true) : ?>
			</br>
            <h1>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</h1>
            
        <?php else : ?>
            <h1></br>
                <span class="error"></span> Please Login
            </h1>
        <?php endif; ?>
		</div>
    </body>
</html>