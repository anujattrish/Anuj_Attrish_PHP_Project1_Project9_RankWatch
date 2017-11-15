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
		h6{
			color:#cc0000 !important; 
		}
		p{
			color:#006699 !important;
			background: rgb(255, 255, 255) !important;
			text-align:left !important;
		}
	</style>
</head>
<body>
<div class="container">
<?php

echo "<br/>";
echo "<h5>Internal and External Links : </h5>";
echo "<br/>";


function checkLink($url,$gathered_from) {
    if(filter_var($url, FILTER_VALIDATE_URL)){
                 $position = strpos($url, $gathered_from);

                  if($position !== FALSE)
                  {
                    echo "<b><p>Internal Link: </p></b> ";
                    echo "$url";
                    echo "<br/>";
                  }
                  else
                  {
                    echo "<h6>External Link : </h6> ";
                    echo "$url";
                    echo "<br/>";
                  }
        }
}


$webaddress = $_POST["website"];
$target_url = $webaddress;
$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';

// make the cURL request to $target_url
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_URL,$target_url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$html= curl_exec($ch);
if (!$html) {
    echo "<br />cURL error number:" .curl_errno($ch);
    echo "<br />cURL error:" . curl_error($ch);
    exit;
}

// parse the html into a DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);

//grab titles and all the things 

// grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");

for ($i = 0; $i < $hrefs->length; $i++) {
    $href = $hrefs->item($i);
    $url = $href->getAttribute('href');
    checkLink($url,$target_url);
}
?>
</div>
</body>
</html>