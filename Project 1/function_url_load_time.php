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

function http_loadtime($url) {
    $handle = curl_init($url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    // gtting the Page Contents into Response
    $response = curl_exec($handle);

    // Calculating Loadtime Using Curl Inbuilt Function
    $loadtime = curl_getinfo($handle, CURLINFO_TOTAL_TIME);
    curl_close($handle);
    return $loadtime;
}

$webaddress = $_POST["website"];
$loadtime = http_loadtime($webaddress);
echo "<br/>";
echo "<h5>URL Load Time:</h5> $loadtime" . " " . "Seconds";
echo "<br/>";

?>
</div>
</body>
</html>