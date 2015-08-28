</br></br></br></br>
<div class="row-fluid breadcrumbs margin-bottom-40">
    <div class="container">
        <h3 class="pull-left">Location</h3>
        </div><!--/container-->
</div><!--/breadcrumbs-->
<div class="page-content">
	<div class="hr hr32 hr-dotted"></div>

	<div class="row-fluid">
		<div class="span12">
		<!--PAGE CONTENT BEGINS-->
			<div class="row-fluid">
				<div class="span12">
					<div class="tabbable">					
						<div class="tab-content">
								<div id="map" />
								Contact Info
								University of Dhaka
								Dhaka, Bangladesh 
								Phone: 880 1678 656 657 
								Fax: 02 547 768 
								Email: dsm@du.ac.bd
								</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		<!--PAGE CONTENT ENDS-->
		</div>
	<!--/.span-->
	</div>
<!--/.row-fluid-->
</div>


    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR8iTW0ckmY6EhvEtVgNeSiHKTnDhN0pc">
    </script>
	
	<script src="http://www.google.com/jsapi?key=AIzaSyAR8iTW0ckmY6EhvEtVgNeSiHKTnDhN0pc"></script>
	
    <script>
	(function () {
		google.load("maps", "2");
		google.setOnLoadCallback(function () {
			// Create map
			var map = new google.maps.Map2(document.getElementById("map")),
				markerText = "<h4 style='color:red'> <i> Hi, You are here </i></h4>",
				markOutLocation = function (lat, long) {
					var latLong = new google.maps.LatLng(lat, long),
						marker = new google.maps.Marker(latLong);
					map.setCenter(latLong, 13);
					map.addOverlay(marker);
					marker.openInfoWindow(markerText);
					google.maps.Event.addListener(marker, "click", function () {
						marker.openInfoWindow(markerText);
					});
				};
				map.setUIToDefault();

			// Check for geolocation support	
			if (navigator.geolocation) {
				// Get current position
				navigator.geolocation.getCurrentPosition(function (position) {
						// Success!
						markOutLocation(position.coords.latitude, position.coords.longitude);
					}, 
					function () {
						// Gelocation fallback: Defaults to Stockholm, Sweden
						markerText = "<p>Please accept geolocation for me to be able to find you. <br>I've put you in Stockholm for now.</p>";
						markOutLocation(59.3325215, 18.0643818);
					}
				);
			}
			else {
				// No geolocation fallback: Defaults to Eeaster Island, Chile
				markerText = "<p>No location support. Try Easter Island for now. :-)</p>";
				markOutLocation(-27.121192, -109.366424);
			}
		});	
	})();
</script>








