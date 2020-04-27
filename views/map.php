<div class="ui segment appear hoverable">
				
	<!--The div element for the map -->
	<div id="map"></div>

</div>

<script>
	function initMap() { 
		var map;
		var bounds = new google.maps.LatLngBounds();
		
		// The location of loc
		var loc = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
	  
		var mapOptions = {
			zoom: 10, 
			center: loc
		};
						
		// Display a map on the web page
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		map.setTilt(50);
			
		// Multiple markers location, latitude, and longitude
		var markers = [
			<?php if(!empty($propertyArr)){
				foreach($propertyArr as $property){
					echo '["'.$property['address'].", ".$property['citystate'].'", '.$property['latitude'].', '.$property['longitude'].'],';
				}
			}
			?>
		];
		
		// Info window content
		var infoWindowContent = [
			<?php if(!empty($propertyArr)){
				foreach($propertyArr as $property){ ?>
					[
					'<div class="ui special cards" id="custom_card">' +
						'<div class="card" id="map_info_window_card">'+
							'<div class="blurring dimmable image">'+
								'<div class="ui dimmer">'+
									'<div class="content">'+
										'<div class="center">'+
											'<div class="ui inverted button">Add Friend</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<img src="images/img1.jpg">'+
							'</div>'+
							'<div class="content">'+
								'<a class="header"><?= $property["address"].", ".$property['citystate']; ?></a>'+
								'<div class="meta">' +
									'<p>longitude <?= $property["longitude"]; ?></p>'+
									'<p>latitude <?= $property["latitude"]; ?></p>'+
								'</div>' +
							'</div>' +
							'<div class="extra content">'+
								'<span class="right floated">'+
									'<i class="bath icon"></i><?= $bathrooms; ?>'+
									'&nbsp;&nbsp;<i class="bed icon"></i><?= $bedrooms; ?>'+
								'</span>' +
							'</div>' +
						'</div>' +
					'</div>'
					],
			<?php }
			}
			?>
		];
			
		// Add multiple markers to map
		var infoWindow = new google.maps.InfoWindow(), marker, i;
		
		// Place each marker on the map  
		for( i = 0; i < markers.length; i++ ) {
			var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
			
			bounds.extend(position);
			marker = new google.maps.Marker({
				position: position,
				map: map,
				title: markers[i][0]
			});
			
			// Add info window to marker    
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				
				return function() {
					
					infoWindow.setContent(infoWindowContent[i][0]);
					infoWindow.open(map, marker);
					
				}
				
			   
			})(marker, i));
			
			// Center the map to fit all markers on the screen
			map.fitBounds(bounds);
		}

	}
	$(document).ready(function(){
		google.maps.event.addDomListener(window, "load", initMap);
	});	
</script>