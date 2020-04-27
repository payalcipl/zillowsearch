<div class="page_layout_content">
	<div class="ui container">
		<div class="ui text menu">
			<div class="item">
				<h3 class="ui header">
					<i class="ui home icon"></i><?= $address.", ".$citystatezip; ?>
				</h3>
			</div>
			<div class="right menu">
				<div class="item">
					<a class="ui primary button" href="index.php">Search More</a>
				</div>
			</div>
		</div>
				
		<div class="ui segment appear hoverable">
			<table class="ui very basic striped selectable table">
				<tbody>
					<tr>
						<th>Zpid: </th>
						<td style="word-break: break-all;"><?= $response["zpid"]; ?></td>
					</tr>
					<tr>
						<th>Home details page: </th>
						<td style="word-break: break-all;">
							<a href="<?= $response["links"]->homedetails; ?>" target="_blank">
								<?= $response["links"]->homedetails; ?>
							</a>	
						</td>
					</tr>
					<tr>
						<th>Map this home page: </th>
						<td style="word-break: break-all;">
							<a href="<?= $response["links"]->mapthishome; ?>" target="_blank">
								<?= $response["links"]->mapthishome; ?>
							</a>	
						</td>
					</tr>
					<tr>
						<th>Similar sales page: </th>
						<td style="word-break: break-all;">
							<a href="<?= $response["links"]->comparables; ?>" target="_blank">
								<?= $response["links"]->comparables; ?>
							</a>	
						</td>
					</tr>
					<tr>
						<th>Full address: </th>
						<td style="word-break: break-all;">
							<?= $response["address"]->street; ?><br/>
							<?= $response["address"]->city; ?><br/>
							<?= $response["address"]->state; ?><br/>
							<?= $response["address"]->zipcode; ?><br/>
						</td>
					</tr>
					<tr>
						<th>Latitude: </th>
						<td style="word-break: break-all;"><?= $response["address"]->latitude; ?></td>
					</tr>
					<tr>
						<th>Longitude: </th>
						<td style="word-break: break-all;"><?= $response["address"]->longitude; ?></td>
					</tr>
					<tr>
						<th>Last updated: </th>
						<td style="word-break: break-all;"><?= $zestimate["last-updated"]; ?></td>
					</tr>
					<tr>
						<th>Bathrooms: </th>
						<td style="word-break: break-all;"><?= isset($response["bathrooms"]) ? (integer)$response["bathrooms"] : 0; ?></td>
					</tr>
					<tr>
						<th>Bedrooms: </th>
						<td style="word-break: break-all;"><?= isset($response["bedrooms"]) ? (integer)$response["bedrooms"] : 0; ?></td>
					</tr>
					<tr>
						<th>Local Real Estate: </th>
						<td style="word-break: break-all;"><?= $localRealEstate["@attributes"]["name"]; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>