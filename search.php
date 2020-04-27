<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	$address = "";
	$citystatezip = "";
	
	if ( 
		( isset($_POST["street_number"]) ) && 
		( $_POST["street_number"] != "" )
	) {
		$addressArr["street_number"] = $_POST["street_number"];
	}

	if ( 
		( isset( $_POST["route"] ) ) && 
		( $_POST["route"] != "" ) 
	) {
		$addressArr["route"] = $_POST["route"];
	}

	if (!empty($addressArr)) {
		
		$address = implode(" ", $addressArr);
	   
	}  

	if ( 
		( isset( $_POST["city"] ) ) && 
		( $_POST["city"] != "" ) 
	) {
		
		$citystatezipArr["city"] = $_POST["city"];
		
	}

	if ( 
		( isset( $_POST["state"] ) ) && 
		( $_POST["state"] != "" )
	) {
		
		$citystatezipArr["state"] = $_POST["state"];
		
	}

	if ( 
		( isset( $_POST["postal_code"] ) ) && 
		( $_POST["postal_code"] != "" ) 
	) {
		
		$citystatezipArr["postal_code"] = $_POST["postal_code"];
		
	}

	if ( !empty($citystatezipArr) ) {
		
		$citystatezip = implode(" ", $citystatezipArr);
		
	}

	if ( $address == "" ) {
		
		include "error.php";
		die;	
	} else if ( $citystatezip == "" ) {
		
		include "error.php";
		die;		
	
	} else {
	
		$serached_for = trim($address.", ". $citystatezip,",");
		
		$zillow_id = "X1-ZWz1b2xqvwjw23_7rj5m"; //the zillow web service ID that you got from your email	
		$url = "https://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=".$zillow_id."&address=".urlencode($address)."&citystatezip=".urlencode($citystatezip);
		$result = file_get_contents($url);
		$data = simplexml_load_string($result);
		
		// Request is not processed successfully 	
		if ( $data->message->code != 0 ) {
			
			include "error.php";
			die;
			
		} else {
		
			$add = $data->response->results->result->address;
			
			$address = $add->street.", ".$add->city.", ".$add->state; 
			
			$longitude = $data->response->results->result->address->longitude;
			$latitude = $data->response->results->result->address->latitude;
			$bathrooms = (integer)$data->response->results->result[0]->bathrooms;
			$bedrooms = $data->response->results->result[0]->bedrooms;
			$finishedSqFt = $data->response->results->result[0]->finishedSqFt;
			
			$propertyArr = [];
			$markers = [];
			
			$results = (array)$data->response->results;
			
			if ( is_array($results["result"]) ) {
				
				foreach ($results["result"] as $result) {
				
					$result = (array)$result;	
					$addressInfo = (array)$result["address"];
					
					$propertyArr[] = [
										"longitude" => $addressInfo["longitude"],
										"latitude" => $addressInfo["latitude"],
										"address" => $addressInfo["street"],
										"bathrooms" => isset($result["bathrooms"]) ? (integer)$result["bathrooms"] : 0,
										"bedrooms" => isset($result["bedrooms"]) ? $result["bedrooms"] : 0,
										"citystate" => $citystatezip
									 ];	 
				}
		
			} else {
				
				$result = $results["result"];
				$addressInfo = (array)$result->address;
				
				$propertyArr[] = [
									"longitude" => $addressInfo["longitude"],
									"latitude" => $addressInfo["latitude"],
									"address" => $addressInfo["street"],
									"bathrooms" => (integer)$result->bathrooms,
									"bedrooms" => $result->bedrooms,
									"citystate" => $citystatezip
								 ];	 
			}
			
		}	
		
	}	
	
}

include "views/header.php";
include "views/search_view.php";
include "views/footer.php";
?>
