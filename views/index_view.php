<style>
body{
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	background-color: rgba(0, 0, 0, 0.04);		
	background-size: cover;
	background-position: center;
	background-image: url("images/bg4.jpg");	
}
</style>

    
	<div class="ui card raised" id="custom_card">
		<div class="content">
			<div class="center aligned header" id="heading">
				Search for a property	
			</div>
			<div class="center aligned description">

				<form action="search.php" class="ui form" method="post" autocomplete="off" style="max-width: 550px;">

					<div class="field">
						<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" autocomplete="off" required/>
					</div>
					<div class="field">
						<div class="two fields">
							<div class="seven wide field">
								<input class="field" id="street_number" name="street_number" placeholder="Street Number" disabled="true" readonly />
							</div>
							<div class="nine wide field">						
								<input class="field" id="route" name="route" disabled="true" placeholder="Route" readonly />
							</div>
						</div>
					</div>
					<div class="field">
						<input class="field" id="locality" name="city" disabled="true" placeholder="City" readonly />
					</div>
					<div class="field">
						<input class="field" id="administrative_area_level_1" name="state" disabled="true" placeholder="State" readonly />
					</div>
					<div class="field">
						<div class="two fields">
							<div class="seven wide field">
								<input class="field" id="postal_code" name="postal_code" disabled="true" placeholder="Postal Code" readonly />
							</div>
							<div class="nine wide field">	
								<input class="field" id="country" name="country" disabled="true" placeholder="Country" readonly />
							</div>
						</div>
					</div>	
					<div class="field" style="margin-bottom: 0px;">
						<button class="ui fluid button primary" type="submit">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
		<script>
		$(document).ready(function(){
			google.maps.event.addDomListener(window, "load", initAutocomplete);
		});
		
	</script>	