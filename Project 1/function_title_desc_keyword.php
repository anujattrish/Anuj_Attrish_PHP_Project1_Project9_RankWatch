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
		p{
			background-color:#f2f2f2;
			margin-bottom: 0em;
		}
	</style>
</head>
<body>
<div class="container">

<?php
function file_get_contents_curl($url)
{
    $ch = curl_init(); //Initializing Curl

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch); //Executing CURL Function for getting the data
    curl_close($ch); // Closing Curl

    return $data; // Returning the HTML Page through data
}
$webaddress = $_POST["website"]; //Getting the URL From index.html
$html = file_get_contents_curl($webaddress); // Calling the function 

// Starting of Parsing 
$doc = new DOMDocument(); //creating New Dom Document
@$doc->loadHTML($html); // Loading HTML Source in docs
$nodes = $doc->getElementsByTagName('title'); // getting the attributes of Title Tags 

//Putting Details into a variable
$title = $nodes->item(0)->nodeValue; // Getting title 

$metas = $doc->getElementsByTagName('meta'); //getting Elements with the tags meta
// Seperating meta description and meta keyword  with each other with running a loop.
for ($i = 0; $i < $metas->length; $i++)  
{
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description') //Getting attributes with the Attribute "description"
        $description = $meta->getAttribute('content'); // Loading Content of meta description into a variable
    if($meta->getAttribute('name') == 'keywords') //Getting attributes with the Attribute "keywords" 
        $keywords = $meta->getAttribute('content'); // Loading keyword content into a variable
}

echo "<h5>Title:</h5>$title". '<br/><br/>'; // Printing The Title
echo "<h5>Description:</h5>$description". '<br/><br/>'; // Printing The Description
// Checking if any keyword is returned or not if not Print NA
if ($keywords == "")  
{
    echo "<h5>Keywords :</h5>NA" . '<br/><br/>';
}
else
{
    echo "<h5>Keywords: </h5>$keywords" . '<br/></br>';   
}
 
?>
</div>
</body>
</html>
