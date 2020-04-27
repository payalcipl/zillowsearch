<div class="page_layout_content">
		
	<div class="ui container">	
		
		<div class="ui text menu">
			<div class="item">
				<h3 class="ui header">
					<i class="ui home icon"></i><?= $serached_for; ?>
				</h3>
			</div>
			<div class="right menu">
				<div class="item">
					<a class="ui primary button" href="index.php">Search More</a>
				</div>
			</div>
		</div>
		
		<?php include "map.php"; ?>
		
			<div class="ui special cards">
				<?php 
				if ( !empty($propertyArr) ) {
					
					foreach ( $propertyArr as $property ) {
						
				?>							
						<div class="card" id="property_card">
							<div class="blurring dimmable image">
								<div class="ui dimmer">
									<div class="content">
										<div class="center">
											<a>
												<div class="ui inverted button"><?= $property["address"].", ".$property["citystate"]; ?></div>
											</a>	
										</div>
									</div>
								</div>
								<img src="images/img1.jpg">
							</div>
							<div class="content">
								<a class="header" href="detail.php?address=<?= urlencode($property["address"]); ?>&citystate=<?= urlencode($property["citystate"]); ?>">
									<?= $property["address"].", ".$property['citystate']; ?>
								</a>
								<div class="meta">
									<p>
										longitude <?= $property["longitude"]; ?> 
									</p>
									<p>
										latitude <?= $property["latitude"]; ?> 
									</p>
								</div>
							</div>
							<div class="extra content">
								<span class="right floated">
									<i class="bath icon"></i>
									<?= $property["bathrooms"]; ?>
									'&nbsp;&nbsp;
									<i class="bed icon"></i>
									<?= $property["bedrooms"]; ?>
								</span>
							</div>
						</div>
					<?php
					}
					
				}	
				?>		
			</div>
	</div>

</div>