<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if ( isset ($_GET["address"]) ) {
		$address = $_GET["address"];
	}	
	
	if ( isset ($_GET["citystate"]) ) {
		$citystatezip = $_GET["citystate"];
	}	
}

$zillow_id = "X1-ZWz1b2xqvwjw23_7rj5m"; //the zillow web service ID that you got from your email	
$url = "https://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=".$zillow_id."&address=".urlencode($address)."&citystatezip=".urlencode($citystatezip);
$result = file_get_contents($url);
$data = simplexml_load_string($result);

$response = (array)$data->response->results->result;
$zestimate = (array)$response["zestimate"];
$localRealEstate = (array)$data->response->results->result->localRealEstate->region;

include "views/header.php";
include "views/detail_view.php";
include "views/footer.php";
?>