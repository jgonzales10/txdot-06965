<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION['msg'] = "You must log in first to view this page";
	header("location: index.php");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	echo "<script type='text/javascript'>  window.location='index.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">

<title>Reduction of Service Life</title>

<link rel="stylesheet"
	href="https://stackpath.
	bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
	type="text/javascript"></script>

<style type="text/css">
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
	height: 100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
	height: 80%;
	margin: 0;
	padding: 0;
}
</style>
<style type="text/css">
.table-fixed {
  width: 100%;
}

/*This will work on every browser but Chrome Browser*/
.table-fixed thead {
  position: sticky;
  position: -webkit-sticky;
  top: 0;
  z-index: 999;
  background-color: #216389;
  color: #fff;
}

/*This will work on every browser*/
.table-fixed thead th {
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    z-index: 999;
    background-color: #216389;
    color: #fff;
}
}</style>
<style type="text/css">
.color {
  background-color: #216389;
}
</style>
<style>
#container {
    width:100%;
    text-align:center;
}

#left {
    float:left;
    width:100px;
}

#center {
    display: inline-block;
    margin:0 auto;
    width:100px;
}

#right {
    float:right;
    width:100px;
}
</style>
<style>
.flex-container {
  /* We first create a flex layout context */
  display: flex;
  
  /* Then we define the flow direction 
     and if we allow the items to wrap 
   * Remember this is the same as:
   * flex-direction: row;
   * flex-wrap: wrap;
   */
  flex-flow: row wrap;
  
  /* Then we define how is distributed the remaining space */
  justify-content: space-around;
}
.divColor{
	background-color: lightblue;
}
</style>
<script type="text/javascript">
		$(document).ready(function(){		
			//if(document.getElementById("SanAntonioOption").selected = true;
			$("#districtSelect").change(function (){//POPULATE COUNTIES BY DISTRICT SELECTION
				var selectedDistrict = $("#districtSelect").val();
				if(selectedDistrict == "San Antonio"){
					$("#countySelect").empty();
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					$( '<option value="McMullen" id = "McMullenOption">McMullen</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );	
				}
				else if(selectedDistrict == "Corpus Christi"){
					$("#countySelect").empty(); 
	  	  			$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

		  	  		$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$("#SpectraRoadSelect").empty(); 
  	  				$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	  	  		
					$( '<option value="Karnes" id ="KarnesOption">Karnes</option>' ).appendTo( "#countySelect" ); 
  					$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );

				}
				else if(selectedDistrict == "Laredo"){
					$("#countySelect").empty(); 
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
					
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

					$( '<option value="La Salle" id ="LaSalleOption">La Salle</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Dimmit" id ="DimmitOption">Dimmit</option>' ).appendTo( "#countySelect" );
			
				}
				else if(selectedDistrict == "Yoakum"){
					$("#countySelect").empty(); 
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
						
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
						
					$( '<option value="Gonzales" id ="GonzalesOption">Gonzales</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Dewitt" id ="DewittOption">Dewitt</option>' ).appendTo( "#countySelect" );
				}
			});
			
			$("#countySelect").change(function (){//POPULATE COUNTIES BY DISTRICT SELECTION
				var selectedCounty = $("#countySelect").val();
				if(selectedCounty == "McMullen"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="FM">FM</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					$( '<option value="FM624">FM624</option>' ).appendTo( "#SpectraRoadSelect" ); 
					$( '<option value="FM99">FM99</option>' ).appendTo( "#SpectraRoadSelect" );
				}
				else if(selectedCounty == "Atascosa"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="SH16">SH16</option>' ).appendTo( "#SpectraRoadSelect" );
				}
				else if(selectedCounty == "Karnes"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="SH123">SH123</option>' ).appendTo( "#SpectraRoadSelect" );
					$( '<option value="SH72">SH72</option>' ).appendTo( "#SpectraRoadSelect" );
				}
				else if(selectedCounty == "Live Oak"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="US281">US281</option>' ).appendTo( "#SpectraRoadSelect" );
				}
				else if(selectedCounty == "La Salle"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="FM">FM</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="FM468">FM468</option>' ).appendTo( "#SpectraRoadSelect" ); 
				}
				else if(selectedCounty == "Dimmit"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="US83">US83</option>' ).appendTo( "#SpectraRoadSelect" );
				}
				else if(selectedCounty == "Gonzales"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadSelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="US183">US183</option>' ).appendTo( "#SpectraRoadSelect" ); 
				}
				else if(selectedCounty == "Dewitt"){
					$("#SpectraRoadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
					$("#SpectraRoadSelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
					
					$( '<option value="SH119">SH119</option>' ).appendTo( "#SpectraRoadSelect" );
				}

			});
			/*
			$("#SpectraFM").click(function(){//(Spectra) POPULATE ONLY FM ROADS
	  			$("#SpectraRoadSelect").empty();
	  			$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
				$('<option value="FM624">FM624</option>').appendTo( "#SpectraRoadSelect" ); 
				$('<option value="FM99">FM99</option>').appendTo( "#SpectraRoadSelect" );
				$('<option value="FM468">FM468</option>').appendTo( "#SpectraRoadSelect" );
			});
			$("#SpectraSH").click(function(){//(Spectra) POPULATE ONLY SH ROADS
				$("#SpectraRoadSelect").empty();
	  			$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
				$( '<option value="SH16">SH16</option>' ).appendTo( "#SpectraRoadSelect" ); 
				$( '<option value="SH123">SH123</option>' ).appendTo( "#SpectraRoadSelect" );
				$( '<option value="SH72">SH72</option>' ).appendTo( "#SpectraRoadSelect" );
				$( '<option value="SH119">SH119</option>' ).appendTo( "#SpectraRoadSelect" ); 
				
			});
			$("#SpectraUS").click(function(){//(Spectra) POPULATE ONLY US ROADS
				$("#SpectraRoadSelect").empty();
	  			$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
				$( '<option value="US281">US281</option>' ).appendTo( "#SpectraRoadSelect" ); 
				$( '<option value="US83">US83</option>' ).appendTo( "#SpectraRoadSelect" );
				$( '<option value="US183">US183</option>' ).appendTo( "#SpectraRoadSelect" );
			});
			*/
			$("#defaultCheck2").click(function(){ //If the 'Show All Rows' checkbox is clicked, it will disable the Axle Weight dropdown form
				if ($(this).is(":checked")) {
					$("#vehicleClassSelect").prop("disabled", true);
   				} else {
  					$("#vehicleClassSelect").prop("disabled", false);  
				}
			});
		});	
	</script>

<style type="text/css">
.my-custom-scrollbar {
	position: relative;
	height: 400px;
	overflow: scroll;
	overflow: auto;
}

.table-wrapper-scroll-y {
	display: block;
}
.Table-Normal {
	table-layout:fixed;
    position: static;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 25%;
    border-collapse: separate;
    text-align: center;
	max-width:100%;
	border-spacing:0; 

	}
.Table-Normal td:nth-child(1),
.Table-Normal td:nth-child(3) {
  width: 12.5%;
  height:100%;
  margin: 0;
    padding: 0;
	border-collapse: collapse;
  white-space:nowrap;
  
}
.Table-Normal img{
	margin: 0;
    padding: 0;
}
.Table-Normal td:nth-child(2) {
  width: 75%;
  height:100%;
  margin: 0;
    padding: 0;
  height: auto;
  
} 
.center-div
{
     margin: 0 auto;
     width: 100px; 
}
.logoutLblPos{

position:fixed;
right:10px;
top:5px;
}
</style>

</head>

<body>

<?php
	if(isset($_SESSION['success'])) : ?>
	<div>
		<h3>
			<?php
			echo $_SESSION['success'];
			unset($_SESSION['success']);
			?>
		<h3>
	</div>
<?php endif ?>

<?php if(isset($_SESSION['username'])) : ?>
	<h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
	<button class="logoutLblPos btn-danger"><a href="logout.php" style="color: #FFFFFF">Logout</button>
<?php endif?>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand text-white" href="#">Navigation</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNav" aria-controls="navbarNav"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="LoadDistribution.php">Axle Load Distribution</a></li>
			<li class="nav-item"><a class="nav-link" href="DamageFactors.php">Damage Factors</a></li>
				
			<li class="nav-item active"><a class="nav-link"
					href="ReductionLife.php">Reduction of Service Life<span
						class="sr-only">(current)</span></a></li>
				
			</ul>
		</div>
	</nav>

	<table class="Table-Normal">
		<tr>
			<td>
				<div class = 'illustration'>
					<img src="txdot3.png"
						alt="Texas Department of Transportation Logo"  style="max-height:70%; max-width:60%"/>
				</div>
			</td>
			<td>
			<div class ="jumbotron bg-danger text-white" style="max-height:70%; max-width:100%">

					<h1 >Project Tx 0-6965</h1>
					<h3 >Characterization and Quantification of Traffic Load Spectra in
						Texas Overweight Corridors and Energy Sector Zones</h3>
			</td>
				</div>

			<td>
			<div class = 'illustration'>

				<img src="ctis.gif"  style="max-height:70%; max-width:60%"/>
			</div>

			</td>
		</tr>
	</table>
	<div></div>

	<div class = "center-div" style="width: 75%; border:solid; height: 100%; float:center">
<div id="map"></div>
</div>
<script type="text/javascript">

		var map; //GOOGLE MAPS API implementation
		function initMap() {
			// New map
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat:29.459768,lng:-97.435360},
				zoom: 7.0
			});

			addMarker({coords:{lat:28.125868,lng:-98.525511}},"FM 624"); //FM 624
			addMarker({coords:{lat:28.465600,lng:-98.440487}},"FM 99"); //FM 99
			addMarker({coords:{lat:28.784422,lng:-98.540370}},"SH 16"); //SH 16
			addMarker({coords:{lat:28.878125,lng:-97.893333}},"SH 123"); //SH 123
			addMarker({coords:{lat:28.452511,lng:-98.183444}},"US 281"); //US 281
			addMarker({coords:{lat:28.739827,lng:-97.940206}},"SH 72"); //SH 72
			addMarker({coords:{lat:28.531170,lng:-99.398022}},"FM 468"); //FM 468
			addMarker({coords:{lat:28.504907,lng:-99.838659}},"US 83"); //US 83
			addMarker({coords:{lat:29.459768,lng:-97.435360}},"US 183"); //US 183
			addMarker({coords:{lat:29.036632,lng:-97.572325}},"SH 119"); //SH 119

			// Define the LatLng coordinates for the EALGLE FORD SHALE polygon.
			var eagleFordShaleCoords = [
				//{lat:29.08317,lng:-100.66412}, //Maerick County
				//{lat:27.27777,lng:-99.45555}, //Webb County

				//{lat:30.520502,lng:-95.421104}, //Walker County
				//{lat:31.610843,lng:-95.791260}, //Leon County
				{lat:29.08222,lng:-100.66196},
				{lat:29.09777,lng:-98.7982},
				{lat:29.24851,lng:-98.81066},
				{lat:29.11513,lng:-98.4176},
				{lat:29.4399,lng:-98.12739},
				{lat:29.37574,lng:-98.11762},
				{lat:29.38143,lng:-97.84541},
				{lat:29.64569,lng:-97.63485},
				{lat:29.78688,lng:-97.32296},
				{lat:30.0682,lng:-97.65103},
				{lat:30.21354,lng:-97.49020},
				{lat:30.41552,lng:-97.36508},
				{lat:30.46096,lng:-97.15482},
				{lat:30.72856,lng:-97.27414},
				{lat:30.75969,lng:-97.32206},
				{lat:30.89457,lng:-97.26011},
				{lat:31.11159,lng:-96.82737},
				{lat:31.65367,lng:-95.7382},
				{lat:31.3294,lng:-95.65398},
				{lat:31.09498,lng:-95.77331},
				{lat:31.05779,lng:-95.63446},
				{lat:30.91931,lng:-95.62195},
				{lat:31.06573,lng:-95.43365},
				{lat:30.85655,lng:-95.32776},
				{lat:30.51232,lng:-95.35579},
				{lat:30.51276,lng:-95.59871},
				{lat:30.63381,lng:-95.84163},
				{lat:30.25539,lng:-95.81539},
				{lat:30.24635,lng:-96.105},
				{lat:30.07581,lng:-96.15292},
				{lat:30.04862,lng:-96.63174},
				{lat:29.9682,lng:-96.56705},
				{lat:29.63737,lng:-96.87589},
				{lat:29.33657,lng:-96.57774},
				{lat:29.0589,lng:-96.93876},
				{lat:29.10976,lng:-96.98942},
				{lat:28.86996,lng:-97.30925},
				{lat:28.92948,lng:-97.41302},
				{lat:28.6724,lng:-97.78228},
				{lat:28.39294,lng:-97.38251},
				{lat:28.13455,lng:-97.56226},
				{lat:28.17859,lng:-97.82715},
				{lat:28.1185,lng:-97.9245},
				{lat:28.06414,lng:-98.80708},
				{lat:27.27557,lng:-98.80556},
				{lat:27.27893,lng:-99.33315},
				{lat:27.32820,lng:-99.38107},
				{lat:27.26519,lng:-99.44821},
				{lat:27.56949,lng:-99.51630},
				{lat:28.20989,lng:-100.19664},
				{lat:29.08222,lng:-100.66196},
				
			];

			// Construct the polygon.
			var eagleFordShalePolygon = new google.maps.Polygon({
				paths: eagleFordShaleCoords,
				strokeColor: '#FF0000', //RED
				//strokeColor: '#0000FF', //YELLOW
				//strokeColor: '#008000', //GREEN
				strokeOpacity: 0.8,
				strokeWeight: 3,
				//fillColor: '#FFFF00',
				fillColor: '#FF8C00', //ORANGE
				fillOpacity: 0.35
				});
			eagleFordShalePolygon.setMap(map);

			attachPolygonInfoWindow(eagleFordShalePolygon);
			function attachPolygonInfoWindow(polygon) {
			    var infoWindow = new google.maps.InfoWindow();
    			google.maps.event.addListener(polygon, 'mouseover', function (e) {
        		infoWindow.setContent("EAGLE FORD SHALE REGION");
        		var latLng = e.latLng;
        		infoWindow.setPosition(latLng);
        		infoWindow.open(map);
    			});
			}


			// Define the LatLng coordinates for the ROADWAY polygon.
			var roadsCoords = [
				//{lat:28.531170,lng:-99.398022}, //FM 468
				{lat:28.504907,lng:-99.838659}, //US 83
				{lat:29.459768,lng:-97.435360}, //US 183
				{lat:29.036632,lng:-97.572325}, //SH 119
				//{lat:28.878125,lng:-97.893333}, //SH 123
				{lat:28.739827,lng:-97.940206}, //SH 72
				{lat:28.452511,lng:-98.183444}, //US281
				{lat:28.125868,lng:-98.525511}, //FM 624
				//{lat:28.465600,lng:-98.440487}, //FM 99
				//{lat:28.784422,lng:-98.540370}, //SH 16
			];

			// Construct the polygon.
			var roadsPolygon = new google.maps.Polygon({
				paths: roadsCoords,
				strokeColor: '#0000FF', //BLUE
				//strokeColor: '#0000FF', //YELLOW
				//strokeColor: '#008000', //GREEN
				strokeOpacity: 0.8,
				strokeWeight: 3,
				//fillColor: '#FFFF00',
				fillColor: '#008000',
				fillOpacity: 0.35
			});
			//roadsPolygon.setMap(map);

			function addMarker(props,markLabel){
				var marker = new google.maps.Marker({
					position:props.coords,
					map:map,
					label: markLabel,
					scaledSize: new google.maps.Size(40,32),
					icon: 'icon7.png'
				});
				
				marker.addListener('click', function() {
					map.setZoom(9);
					map.setCenter(marker.getPosition());
					var markerLabel = marker.getLabel();
					if(markerLabel == "FM 624"){
						//downloadFM624();
						selectFM624();
						//clickedSanAntonio();
						//document.getElementById("SanAntonioOption").selected = true;

						//document.getElementById("FM").selected = true;
						
						//document.getElementById("SanAntonioOption").submit();					
						//SA();
						//document.getElementById('SanAntonioOption').click();
						//document.getElementById("SanAntonioOption").click;
						//var someLink = document.querySelector('SanAntonioOption');
						//simulateClick(someLink);
												
						//document.getElementById("McMullenOption").selected = true;
						//document.getElementById("SanAntonioOption").selected = true;
						
						//document.getElementById("SanAntonioOption").click();
						//alert(document.getElementById('districtSelect').selectedIndex);
						//document.getElementById('districtSelect').click();
						//alert(document.getElementById('SanAntonioOption').click());
						//("#SanAntonioOption").click();
						//$("#McMullenOption").click();
						
					}
					if(markerLabel == "FM 99"){
						//downloadFM99();
						selectFM99();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "SH 16"){
						//downloadSH16();
						selectSH16();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "SH 123"){
						//downloadSH123();
						selectSH123();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "US 281"){
						selectUS281();
						//window.open('file:///C:/Users/Jaime/eclipse-workspace/CTIS/Remaining%20Service%20Life-US281.pdf');
						//downloadUS281();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "SH 72"){
						selectSH72();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "FM 468"){
						selectFM468();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "US 83"){
						selectUS83();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "US 183"){
						selectUS183();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					if(markerLabel == "SH 119"){
						selectSH119();
						//clickedSanAntonio();
						//$("#McMullenOption").click();	
					}
					
					
					//alert(htmlString);
					//alert(markerLabel);
				});

			}
				

		}
			function clickedSanAntonio() {
					alert("San Antonio");

			}
function downloadFM624() {
	javascript:void(window.open('remainingLife/FM624.pdf'));
}
function downloadFM99() {
	javascript:void(window.open('remainingLife/FM99.pdf'));
}

function downloadSH16() {
	javascript:void(window.open('remainingLife/SH16.pdf'));
}
function downloadSH123() {
	javascript:void(window.open('remainingLife/SH123.pdf'));
}
function downloadUS281() {
	javascript:void(window.open('remainingLife/US281.pdf'));
}

function downloadSH72() {
	javascript:void(window.open('remainingLife/SH72.pdf'));
}

function downloadFM468() {
	javascript:void(window.open('remainingLife/FM468.pdf'));
}

function downloadUS83() {
	javascript:void(window.open('remainingLife/US83.pdf'));
}

function downloadUS183() {
	javascript:void(window.open('remainingLife/US183.pdf'));
}

function downloadSH119() {
	javascript:void(window.open('remainingLife/SH119.pdf'));
}
function selectFM624() {
	$('#districtSelect').val("San Antonio");
	//$('#countySelect').val("McMullen");
	//$('#SpectraRoadwayTypeSelect').val("FM");
	//$('#SpectraRoadSelect').val("FM624");


	//<option name="San Antonio" value="San Antonio" id="SanAntonioOption">San Antonio</option>
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="McMullen" id = "McMullenOption"selected="selected">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="FM624"selected="selected">FM624</option>' ).appendTo( "#SpectraRoadSelect" ); 
	$( '<option value="FM99">FM99</option>' ).appendTo( "#SpectraRoadSelect" );

	//map.setCenter({lat:28.125868,lng:-98.525511});
	//map.setZoom(11);
}
function selectFM99() {
	$('#districtSelect').val("San Antonio");
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="McMullen" id = "McMullenOption"selected="selected">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="FM624">FM624</option>' ).appendTo( "#SpectraRoadSelect" ); 
	$( '<option value="FM99"selected="selected">FM99</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.465600,lng:-98.440487});
	//map.setZoom(11);
}

function selectSH16() {
	$('#districtSelect').val("San Antonio");
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="McMullen" id = "McMullenOption">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption"selected="selected">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="SH16"selected="selected">SH16</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.784422,lng:-98.540370});
	//map.setZoom(11);
}
function selectSH123() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

	$( '<option value="Karnes" id ="KarnesOption"selected="selected">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="SH123"selected="selected">SH123</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="SH72">SH72</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.878125,lng:-97.893333});
	//map.setZoom(11);
}
function selectUS281() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

	$( '<option value="Karnes" id ="KarnesOption">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption"selected="selected">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="US281"selected="selected">US281</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.452511,lng:-98.183444});
	//map.setZoom(11);
}

function selectSH72() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

	$( '<option value="Karnes" id ="KarnesOption"selected="selected">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="SH123">SH123</option>' ).appendTo( "#SpectraRoadSelect" );
	$( '<option value="SH72"selected="selected">SH72</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.739827,lng:-97.940206});
	//map.setZoom(11);
}

function selectFM468() {
	$('#districtSelect').val("Laredo");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

	$( '<option value="La Salle" id ="LaSalleOption"selected="selected">La Salle</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dimmit" id ="DimmitOption">Dimmit</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="FM468"selected="selected">FM468</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.531170,lng:-99.398022});
	//map.setZoom(11);
}

function selectUS83() {
	$('#districtSelect').val("Laredo");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );

	$( '<option value="La Salle" id ="LaSalleOption">La Salle</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dimmit" id ="DimmitOption"selected="selected">Dimmit</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="US83"selected="selected">US83</option>' ).appendTo( "#SpectraRoadSelect" );
	//map.setCenter({lat:28.504907,lng:-99.838659});
	//map.setZoom(11);
}

function selectUS183() {
	$('#districtSelect').val("Yoakum");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
		
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
		
	$( '<option value="Gonzales" id ="GonzalesOption"selected="selected">Gonzales</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dewitt" id ="DewittOption">Dewitt</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadSelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="US183"selected="selected">US183</option>' ).appendTo( "#SpectraRoadSelect" ); 


	//map.setCenter({lat:29.459768,lng:-97.435360});
	//map.setZoom(11);
}
function selectSH119(){
	$('#districtSelect').val("Yoakum");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
		
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
		
	$( '<option value="Gonzales" id ="GonzalesOption">Gonzales</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dewitt" id ="DewittOption"selected="selected">Dewitt</option>' ).appendTo( "#countySelect" );
	$("#SpectraRoadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#SpectraRoadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#SpectraRoadwayTypeSelect" );
	$("#SpectraRoadSelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#SpectraRoadSelect" );
	
	$( '<option value="SH119"selected="selected">SH119</option>' ).appendTo( "#SpectraRoadSelect" );

	//map.setCenter({lat:29.036632,lng:-97.572325});
	//map.setZoom(11);
}
	</script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwEDc4pCGdSHICzw-cn7jiKur9KgmV4d8&amp;callback=initMap"
		async defer type="text/javascript">
	</script>
	<p>&nbsp;</p>

<?php
$GLOBALS['selected_val'] = "";
$GLOBALS['selected_val2'] = "";
$GLOBALS['selected_val3'] = "";
$GLOBALS['selected_val4'] = "";
$GLOBALS['selected_SpectraRoadway'] = "";
?>
<div class = "center-div" style="width: 90%; height: 100%; float:center">

<div class="jumbotron bg-danger">
		<div class="container-center align-top text-white">
			<h2>Reduction of Service Life:</h2>
		</div>
		<form action="#" method="post">
			<div class="form-inline well">
				<div class="form-group">
					<label for="dropdownEalfDistrict"></label> <select
						class="form-control disabled" id="districtSelect"
						name="dropdownEalfDistrict">
						<option value="Select District" selected="selected">Select
							District</option>
						<option value="San Antonio" id="SanAntonioOption">San Antonio</option>
						<option value="Corpus Christi" id="CorpusChristiOption">Corpus
							Christi</option>
						<option value="Laredo" id="LaredoOption">Laredo</option>
						<option value="Yoakum" id="YoakumOption">Yoakum</option>

					</select> <label for="dropdownEalfCounty"></label> <select
						class="form-control disabled" id="countySelect"
						name="dropdownEalfCounty">
						<option value="Select County" selected="selected">Select County</option>
					</select>
					<p>&nbsp;</p>
					<select class="form-control disabled" id="SpectraRoadwayTypeSelect"
						name="dropdownEalfRoadway">
						<option value="Select Roadway Type" selected="selected">Select
							Roadway Type</option>
						<option value="FM" id="SpectraFM">FM</option>
						<option value="SH" id="SpectraSH">SH</option>
						<option value="US" id="SpectraUS">US</option>
					</select>
					<p>&nbsp;</p>
					<label for="dropdownSpectraRoadway"></label> <select
						class="form-control" id="SpectraRoadSelect"
						name="dropdownSpectraRoadway">
						<option value="Select Roadway" selected="selected">Select Roadway</option>
					</select>
				</div>
				<div class="form-group">

					<div class="btn-toolbar">
						<p>&nbsp;</p>
						<input class="btn btn-success btn-sm" type="submit"
							name="submitSpectra" value="Run">
						
					</div>
				</div>
			</div>
		</form>
	</div>

	<form action=""></form>

	<div></div>
	<p></p>
<?php
if (isset($_POST['submitSpectra'])) {
    $dataPointsSpectra = array();
    $classValues = array();
    $class4 = array();
    $class5 = array();
    $class6 = array();
    $class7 = array();
    $class8 = array();
    $class9 = array();
    $class10 = array();
    $class11 = array();
    $class12 = array();
    $class13 = array();
    $rowsArray = array();
    $columnsArray = array();
    if (isset($_POST['defaultCheck2']) && $_POST['defaultCheck2'] == 'showAllClicked') {
        $showAllOption = true;
        $GLOBALS['showAllSpectra'] = true;
    } else {
        $showAllOption = false;
    }

    echo "<br/>";
    if ((string) $_POST['dropdownSpectraRoadway'] != "Select Roadway"){
        $GLOBALS['selected_SpectraRoadway'] = (string) $_POST['dropdownSpectraRoadway']; // Storing Selected Value In Variable
			echo '<div class="divColor">';
            echo "<h4>You have selected: ".(string) $_POST['dropdownEalfDistrict']. ", "
      .(string) $_POST['dropdownEalfCounty']. ", ".(string) $_POST['dropdownSpectraRoadway']."</h4>"; // Displaying Selected Value
	   echo "<br/>";
	   echo "</div>";
	   echo "</br>";
        if($GLOBALS['selected_SpectraRoadway'] == "FM624"){
			
			echo '<script type="text/javascript">',
            'downloadFM624();',
            '</script>'
			;
			echo '<script type="text/javascript">selectFM624();</script>';
            
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "FM99"){
            echo '<script type="text/javascript">',
            'downloadFM99();',
            '</script>'
						;
						echo '<script type="text/javascript">selectFM99();</script>';

							
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH16"){
			echo '<script type="text/javascript">',
            'downloadSH16();',
            '</script>'
      	  		    ;
            			echo '<script type="text/javascript">selectSH16();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH123"){
            echo '<script type="text/javascript">',
            'downloadSH123();',
            '</script>'
				    ;
					echo '<script type="text/javascript">selectSH123();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US281"){
            echo '<script type="text/javascript">',
            'downloadUS281();',
            '</script>'
  	  			    ;
            			echo '<script type="text/javascript">selectUS281();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH72"){
            echo '<script type="text/javascript">',
            'downloadSH72();',
            '</script>'
					  ;
					  echo '<script type="text/javascript">selectSH72();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "FM468"){
            echo '<script type="text/javascript">',
            'downloadFM468();',
            '</script>'
						;
						echo '<script type="text/javascript">selectFM468();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US83"){
            echo '<script type="text/javascript">',
            'downloadUS83();',
            '</script>'
					;
					echo '<script type="text/javascript">selectUS83();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US183"){
            echo '<script type="text/javascript">',
            'downloadUS183();',
            '</script>'
						;
						echo '<script type="text/javascript">selectUS183();</script>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH119"){
            echo '<script type="text/javascript">',
            'downloadSH119();',
            '</script>'
					  ;
					  echo '<script type="text/javascript">selectSH119();</script>';

        }
		}
		echo '</div>';
}
        
?>

	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous" type="text/javascript"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous" type="text/javascript"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous" type="text/javascript"></script>

</body>
</html>