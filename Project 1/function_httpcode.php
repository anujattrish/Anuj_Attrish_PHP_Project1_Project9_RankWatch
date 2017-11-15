<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<style>
		h5{
			background-color:#ff9999;
			height:30px;
			margin-top:0em;
		}
	</style>
</head>
<body>
<div class="container">

<?php

function http_header($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    // Get the HTML Code in the response
    $response = curl_exec($handle);

    // Checking http code through curl Inbuilt Function
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    curl_close($handle);
    
    return $httpCode;
}
$webaddress = $_POST["website"];
$htmlcode = http_header($webaddress);
echo "<br/>";
echo "<h5>HTTP Code: </h5> $htmlcode";

?>
</div>
</body>
</html>