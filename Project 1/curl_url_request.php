<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<style>
h2{
	color:#668cff !important;
	text-align:center;
}
b{
	color:white !important;
}
.jumbotron{
	overflow:hidden;
	background-color:#4d4c4c !important;
	padding-top:20px !important;
	height:150px !important;
}
.a{
	height:50px !important;
	background-color:#4d4c4c !important;
	color:white;
	text-align:right;
}
</style>
<title> SEO Details of the entered URL  </title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
<div class="container">
<?php 
$webaddress = $_POST["website"];
echo "<h2>Details of the URL </h2></br><b>$webaddress</b>";
echo "<br/><br/>";
?>
</div>
</div>
<?php include("function_title_desc_keyword.php"); ?>
<?php include("function_ipaddress.php"); ?>
<?php include("function_httpcode.php"); ?>
<?php include("function_url_load_time.php"); ?>
<?php include("function_url_list.php"); ?> 
<div class="container-fluid a">
End of page
</div>
</body>
</html>
