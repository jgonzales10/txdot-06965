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

<title>Axle Load Distribution</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">


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
  margin:0 auto;
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
.content-table {
    margin: 0 auto;
}
.content-table td {
    text-align: center;
}

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
table.center1 {
    margin: 0 auto;
  }
  tbody.full{
    width: 100%;
    display: table;
}
.centerBoldText{
	text-align: center;
	font-weight: bold;

}
p.inset {border-style: inset;}
</style>
<script>

		$(document).ready(function(){
			var selectedDistrict = $("#districtSelect").val();
			var selectedCounty = $("#countySelect").val();
			var selectedRoadType = $("#SpectraRoadwayTypeSelect").val();
			var selectedRoad = $("#SpectraRoadSelect").val();
			var selectedSeason = $("#seasonSelect").val();
			var selectedAxle = $("#axleSelect").val();
			var selectedClass = $("#vehicleClassSelect").val();
			//alert(selectedClass);
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
			$("#defaultCheck2").change(function(){ //If the 'Show All Rows' checkbox is clicked, it will disable the Axle Weight dropdown form
				if ($(this).is(":checked")) {
					$("#vehicleClassSelect").prop("disabled", true);
   				} else {
  					$("#vehicleClassSelect").prop("disabled", false);  
				}
			});
			$("#vehicleClassSelect").change(function(){ //If the 'Show All Rows' checkbox is clicked, it will disable the Axle Weight dropdown form
				if ($("#defaultCheck2").is(":checked")) {
					$("#defaultCheck2").attr('checked', false);
   				}
			});
			if(selectedDistrict == "Select District" || selectedCounty == "Select County" || selectedRoadType == "Select RoadwayType"
			|| selectedRoad == "Select Roadway" || selectedSeason == "Select Season" 
			|| selectedAxle == "Select Axle Type" || ((selectedClass == "dropdownSpectraClass") && !($("#defaultCheck2").is(":checked")))){
				$("#btnRun").prop("disabled", true);

			}else{
				$("#btnRun").prop("disabled", false);

			}
		});	


		$(document).change(function(){
			//alert(($("#defaultCheck2").is(":checked")));
			var selectedDistrict = $("#districtSelect").val();
			var selectedCounty = $("#countySelect").val();
			var selectedRoadType = $("#SpectraRoadwayTypeSelect").val();
			var selectedRoad = $("#SpectraRoadSelect").val();
			var selectedSeason = $("#seasonSelect").val();
			var selectedAxle = $("#axleSelect").val();
			var selectedClass = $("#vehicleClassSelect").val();
			//alert(selectedRoadType);
			if(selectedDistrict == "Select District" || selectedCounty == "Select County" || selectedRoadType == "Select Roadway Type"
			|| selectedRoad == "Select Roadway" || selectedSeason == "Select Season" 
			|| selectedAxle == "Select Axle Type" || ((selectedClass == "dropdownSpectraClass") && !($("#defaultCheck2").is(":checked")))){
				$("#btnRun").prop("disabled", true);
			}else{
				$("#btnRun").prop("disabled", false);

			}
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
.tableCentered {
    margin: auto; /* or margin: 0 auto 0 auto */
  }
.tContainer {
	text-align: center;
	border: 1px solid green;
	padding: 5px;
}
.tContainer table {
	border: 1px solid red;        
	/* You can also uncomment this and remove the align="center" attribute    
		margin: 0 auto;
	*/
}
.divColor{
	background-color: lightblue;
}
.center-div
{
     margin: 0 auto;
     width: 100px; 
}

div.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
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
			<li class="nav-item active"><a class="nav-link"
					href="LoadDistribution.php">Axle Load Distribution<span
						class="sr-only">(current)</span></a></li>
				<li class="nav-item"><a class="nav-link" href="DamageFactors.php">Damage Factors</a></li>
				<li class="nav-item"><a class="nav-link" href="ReductionLife.php">Reduction of Service Life</a></li>
				
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
			<div class ="jumbotron bg-primary text-white" style="max-height:70%; max-width:100%">

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
function downloadFM624() {
	//javascript:void(window.open('/ald/SAT- FM 624 - Copy.ald'));
	//alert("FM624");
}
function downloadFM99() {
	//javascript:void(window.open('/ald/SAT- FM 99 - Copy.ald'));
}

function downloadSH16() {
	//javascript:void(window.open('/ald/SAT- SH 16 - Copy.ald'));
}
function downloadSH123() {
	//javascript:void(window.open('/ald/CRP-SH 123 - Copy.ald'));
}
function downloadUS281() {
	//javascript:void(window.open('/ald/CRP-US 281 - Copy.ald'));
}

function downloadSH72() {
	//javascript:void(window.open('/ald/CRP SH 72 - Copy.ald'));
}

function downloadFM468() {
	//javascript:void(window.open('/ald/LRD- FM  468 - Copy.ald'));
}

function downloadUS83() {
	//javascript:void(window.open('/ald/LRD - US 83 - Copy.ald'));
}

function downloadUS183() {
	//javascript:void(window.open('/ald/SAT- US 183 - Copy.ald'));
}

function downloadSH119() {
	//window.open('file:///C:/Users/Jaime/eclipse-workspace/CTIS/ald/SAT- FM 624 - Copy.ald');
	alert("File Unavailable");
}

function selectSeason(season){
	if(season == "Summer"){
		$('#seasonSelect').val("Summer");

	}else{
		$('#seasonSelect').val("Winter");
	}
}
function selectAxleType(selectedAxle){
	$('#axleSelect').val(selectedAxle);
}
function selectVehicleClass(selectedClass){
	var vehicleClass = "Class " + selectedClass;
	//alert(vehicleClass);
	$('#vehicleClassSelect').val(selectedClass);
}
function selectShowAll(){
	$('#defaultCheck2').attr('checked', true);
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
				strokeOpacity: 0.9,
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
			

			function downloadSH119() {
				//window.open('file:///C:/Users/Jaime/eclipse-workspace/CTIS/ald/SAT- FM 624 - Copy.ald');
				alert("File Unavailable");
			}
			function addMarker(props,markLabel){
				var marker = new google.maps.Marker({
					position:props.coords,
					map:map,
					label: markLabel,
					//icon: 'marker.png'
					icon: 'icon7.png'
				});
				
				marker.addListener('click', function() {
					map.setZoom(9);
					map.setCenter(marker.getPosition());
					var markerLabel = marker.getLabel();
					if(markerLabel == "FM 624"){
						selectFM624();
						
					}
					if(markerLabel == "FM 99"){
						selectFM99();
						
					}
					if(markerLabel == "SH 16"){
						selectSH16();
						
					}
					if(markerLabel == "SH 123"){
						selectSH123();
						
					}
					if(markerLabel == "US 281"){
						selectUS281();
						
					}
					if(markerLabel == "SH 72"){
						selectSH72();
						
					}
					if(markerLabel == "FM 468"){
						selectFM468();
						
					}
					if(markerLabel == "US 83"){
						selectUS83();
						
					}
					if(markerLabel == "US 183"){
						selectUS183();
						
					}
					if(markerLabel == "SH 119"){
						selectSH119();
						
					}
					
				});

			}
				

		}
			function clickedSanAntonio() {
					alert("San Antonio");

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

<div class="jumbotron bg-primary">
		<div class="container-center align-top text-white">
			<h2>Axle Load Distribution:</h2>
		</div>
		<form action="#" method="post">
			<div class="form-inline well">
				<div class="form-group">
					<label for="dropdownEalfDistrict"></label> <select
						class="form-control disabled" id="districtSelect"
						name="dropdownEalfDistrict">
						<option value="Select District" selected="selected">Select
							District</option>
						<option name="San Antonio" value="San Antonio" id="SanAntonioOption">San Antonio</option>
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
					<label for="dropdownSpectraSeason"></label> <select
						class="form-control disabled" id="seasonSelect"
						name="dropdownSpectraSeason">
						<option selected>Select Season</option>
						<option value="Summer" id="summerOption">Summer</option>
						<option value="Winter" name="Winter">Winter</option>
					</select> <label for="dropdownSpectraClass"></label>
					<p>&nbsp;</p>
					<label for="dropdownSpectraAxle"></label> <select
						class="form-control" id="axleSelect" name="dropdownSpectraAxle">
						<option selected>Select Axle Type</option>
						<option value="Steering Single Axle" id="SpectraSteeringSingle">Steering Single Axle</option>
						<option value="Single Axle" id="SpectraSingle">Single Axle</option>
						<option value="Tandem" id="SpectraTandem">Tandem Axle</option>
						<option value="Tridem" id="SpectraTridem">Tridem Axle</option>
						<option value="Quad" id="SpectraQuad">Quad Axle</option>
					</select>
					<p>&nbsp;</p>
					<select class="form-control disabled" id="vehicleClassSelect"
						name="dropdownSpectraClass">
						<option value="dropdownSpectraClass" selected="selected">Select
							Vehicle Class</option>
						<option value="4">Class 4</option>
						<option value="5">Class 5</option>
						<option value="6">Class 6</option>
						<option value="7">Class 7</option>
						<option value="8">Class 8</option>
						<option value="9">Class 9</option>
						<option value="10">Class 10</option>
						<option value="11">Class 11</option>
						<option value="12">Class 12</option>
						<option value="13">Class 13</option>
					</select> <label for="dropdownSpectraSelect"></label>
					<p>&nbsp;</p>

					<div class="btn-toolbar">
						<p>&nbsp;</p>
						<input class="btn btn-success btn-sm" type="submit"
							name="submitSpectra" id="btnRun" value="Run">
						<p>&nbsp;</p>
						<input class="form-check-input" name="defaultCheck2"
							type="checkbox" value="showAllClicked" id="defaultCheck2"> <label
							class="form-check-label text-white" for="defaultCheck2"> Show All Trucks </label>
					</div>
				</div>
		</form>
	</div>

	<form action=""></form>

	<div></div>
	<p></p>
<?php
ini_set('max_execution_time',300);
ini_set("display_errors",1);
error_reporting(E_ALL);
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
	$barDataPoints = array();

    if (isset($_POST['defaultCheck2']) && $_POST['defaultCheck2'] == 'showAllClicked') {
        $showAllOption = true;
		$GLOBALS['showAllSpectra'] = true;
		echo '<script type="text/javascript">selectShowAll();</script>';
    } else {
        $showAllOption = false;
		$GLOBALS['showAllSpectra'] = false;
		echo '<script type="text/javascript">selectVehicleClass('.(string) $_POST['dropdownSpectraClass'].');</script>';
    }

    echo "<br/>";
    if (((string) $_POST['dropdownSpectraRoadway'] != "Select Roadway") && ((string) $_POST['dropdownSpectraAxle'] != "Select Axle Type") && ((string) $_POST['dropdownSpectraSeason'] != "Select Season")) {
        $GLOBALS['selected_val'] = (string) $_POST['dropdownSpectraAxle']; // Storing Selected Value In Variable
        $GLOBALS['selected_val2'] = (string) $_POST['dropdownSpectraSeason']; // Storing Selected Value In Variable
		if(!$showAllOption){
			$GLOBALS['selected_val3'] = (string) $_POST['dropdownSpectraClass']; // Storing Selected Value In Variable
		}
		                                                                     // $GLOBALS['selected_val4'] = (string) $_POST['dropdownSpectraSelect']; // Storing Selected Value In Variable
        $GLOBALS['selected_SpectraRoadway'] = (string) $_POST['dropdownSpectraRoadway']; // Storing Selected Value In Variable
		echo '<div class ="divColor">';
        if($showAllOption){
            echo "<h4>You have selected: ".(string) $_POST['dropdownEalfDistrict']. ", "
    .(string) $_POST['dropdownEalfCounty']. ", ".(string) $_POST['dropdownSpectraRoadway']. ", ".(string) $_POST['dropdownSpectraSeason'].", "
         .(string) $_POST['dropdownSpectraAxle'].", "."Vehicle Classes 4-13"."</h4>"; // Displaying Selected Value
         //echo "<br/>";
        }else{
            echo "<h4>You have selected: ".(string) $_POST['dropdownEalfDistrict']. ", "
      .(string) $_POST['dropdownEalfCounty']. ", ".(string) $_POST['dropdownSpectraRoadway']. ", ".(string) $_POST['dropdownSpectraSeason'].", "
			    .(string) $_POST['dropdownSpectraAxle'].", Vehicle Class ".(string) $_POST['dropdownSpectraClass']."</h4>"; // Displaying Selected Value
       //echo "<br/>";
		}
        if($GLOBALS['selected_SpectraRoadway'] == "FM624"){
			echo '<a href="SAT- FM 624 - Copy.zip" download="SAT-FM 624 - 2.0 Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';
			
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "FM99"){
			echo '<a href="SAT- FM 99 - Copy.zip" download="SAT-FM 99  - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';
			
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH16"){
			echo '<a href="SAT- SH 16 - Copy.zip" download="SAT-SH 16  - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';
  
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH123"){
			echo '<a href="CRP-SH 123 - Copy.zip" download="SH 123- BU 181 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

			
        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US281"){
			echo '<a href="CRP-US 281 - Copy.zip" download="CRP- US 281 Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH72"){
			echo '<a href="CRP SH 72 - Copy.zip" download="CRP SH 72 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "FM468"){
			echo '<a href="LRD- FM  468 - Copy.zip" download="LRD FM 468 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US83"){
			echo '<a href="LRD - US 83 - Copy.zip" download="LRD - US 83 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "US183"){
			echo '<a href="SAT- US 183 - Copy.zip" download="YKM- US 183 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

        }
        else if($GLOBALS['selected_SpectraRoadway'] == "SH119"){
			echo '<a href="YKM- SH 119 - Copy.zip" download="YKM- SH 119 - Copy.zip" target="_blank"><button type="button" class="btn btn-danger btn-md"style="Float:left;">Download TxME Compatible File (.zip)</button></a>';

		}
		echo '<p>&nbsp;</p>';
		echo '<p>&nbsp;</p>';


		echo '</div>';
		echo '<p>&nbsp;</p>';

		require_once "./PHPExcel-1.8/Classes/PHPExcel.php";
		if((string) $_POST['dropdownSpectraSeason'] == "Summer"){
			$tmpfname = "Axle Load Spectra Database - SUMMER - ONLY.xlsx";
		}
		else{
			$tmpfname = "Axle Load Spectra Database - WINTER ONLY.xlsx";
		}
        //$tmpfname = "Axle Load Spectra Database - SUMMER - WINTER 1.0.xlsx";
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $firstRoadwayColumn = 0;
        $lastRoadwayColumn = 0;
        $firstRoadwayRow = 0;
        $lastRoadwayRow = 0;
        $axleWeight = 0;
        $axleWeightIncremental = 0;
        $axleWeightMax = 0;
        $lastColumn = 0;
		$searchQuery = "";

        switch ($GLOBALS['selected_SpectraRoadway']) {
			case "US281":
				echo '<script type="text/javascript">selectUS281();</script>';
                $searchQuery = "CRP US 281 ";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 3;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 12;
                break;
			case "FM468":
				echo '<script type="text/javascript">selectFM468();</script>';
                $searchQuery = "LRD FM 468";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 17;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 26;
                break;
                
            case "SH123":
				echo '<script type="text/javascript">selectSH123();</script>';
                $searchQuery = "CRP SH 123";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 31;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 40;
                break;
                
			case "SH72":
				echo '<script type="text/javascript">selectSH72();</script>';
                $searchQuery = "CRP SH 72";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 44;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 53;
                break;
			case "US83":
				echo '<script type="text/javascript">selectUS83();</script>';
                $searchQuery = "LRD US 83";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 58;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 67;
                break;
                
			case "FM99":
				echo '<script type="text/javascript">selectFM99();</script>';
                $searchQuery = "SAT FM 99";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 72;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 81;
                break;
                
			case "FM624":
			echo '<script type="text/javascript">selectFM624();</script>';
                $searchQuery = "SAT FM 624";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 86;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 95;
                break;
                
			case "SH16":
				echo '<script type="text/javascript">selectSH16();</script>';
                $searchQuery = "SAT SH 16";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 100;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 109;
                break;
                
			case "SH119":
				echo '<script type="text/javascript">selectSH119();</script>';
                $searchQuery = "YKM FM 119";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 114;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 123;
                break;
                
			case "US183":
				echo '<script type="text/javascript">selectUS183();</script>';
                $searchQuery = "YKM US 183";
                $firstRoadwayColumn = "C";
                $firstRoadwayRow = 128;
                $lastRoadwayColumn = "AQ";
                $lastRoadwayRow = 137;
                break;
		}
        switch ($GLOBALS['selected_val']) {
            case "Steering Single Axle":
                $worksheet = $excelObj->getSheet(2);
                $axleWeight = 3000;
                $axleWeightIncremental = 1000;
                $axleWeightMax = 41000;
                $lastRoadwayColumn = "AQ";
                $lastColumn = 81;
				echo '<script type="text/javascript">selectAxleType("Steering Single Axle");</script>';

                
                
                break;

            case "Single Axle":
                $worksheet = $excelObj->getSheet(3);
                $axleWeight = 3000;
                $axleWeightIncremental = 1000;
                $axleWeightMax = 41000;
                $lastRoadwayColumn = "AQ";
                $lastColumn = 81;
				echo '<script type="text/javascript">selectAxleType("Single Axle");</script>';

                
                break;

            case "Tandem":
                $worksheet = $excelObj->getSheet(4);
                $axleWeight = 6000;
                $axleWeightIncremental = 2000;
                $axleWeightMax = 82000;
                
                $lastRoadwayColumn = "AQ";
                $lastColumn = 81;
				echo '<script type="text/javascript">selectAxleType("Tandem");</script>';

                
                break;

            case "Tridem":
                $worksheet = $excelObj->getSheet(5);
                $axleWeight = 12000;
                $axleWeightIncremental = 3000;
                $axleWeightMax = 102000;
                
                $lastRoadwayColumn = "AI";
                $lastColumn = 73;
				echo '<script type="text/javascript">selectAxleType("Tridem");</script>';

                
                break;

            case "Quad":
                $worksheet = $excelObj->getSheet(6);
                $axleWeight = 12000;
                $axleWeightIncremental = 3000;
                $axleWeightMax = 102000;
                
                $lastRoadwayColumn = "AI";
                $lastColumn = 73;
				echo '<script type="text/javascript">selectAxleType("Quad");</script>';

                
                break;
        }
        $lastRow = $worksheet->getHighestRow();
        $firstRoadwayFlag = false;
        $lastRoadwayFlag = false;
        for ($row = 1; $row <= $lastRow; $row ++) {
                for ($charCol = 65; $charCol < 66; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                    if ($firstRoadwayFlag == false) {
                        if ($searchQuery == (string) ($worksheet->getCell(chr($charCol) . $row)->getValue())) { // Finds the First Axle and stores the column location
                            $firstRoadwayFlag = true;
                            $firstRoadwayRow = $row+2; // UNUSED FOR NOW BUT MAYBE WILL REPLACE FIRSTAXLEFLAG
                        }
                    }
                    // echo $axleWeightColumn."<br/>";
                    if ($firstRoadwayFlag == true && (($worksheet->getCell(chr($charCol) . $row)->getValue()) == null) && $lastRoadwayFlag == false) {
                        //echo $lastRoadwayRow;
                        $lastRoadwayRow = $row-1;
                        $lastRoadwayFlag = true;
                        $firstRoadwayFlag = false;
                        // echo "Last axle row: ".$lastAxleRow."<br/>";
                    }
                }
            
        }

        $currRow = 0;
        if ($selected_val != "Select Axle Type") {
            #echo "<h1>" . "Axle Load Distributions for: " . $GLOBALS['selected_SpectraRoadway'] . "</h1>";
            if (!$showAllOption) {
                echo '<div id="chartContainer3" style="height: 90%; width: 100%;"></div>';
				echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
				echo "<p>&nbsp;</p>";
				echo '<div class="row">';
				echo '<div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">';
				echo '<div id="divTable" name="divTable" style="border:solid">';
                echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
            } else {
				//echo '<input type="button" value="export Spectra" onclick="exportToExcel("tableSpectra")" />';
                echo '<div id="chartContainer4"style="height: 90%; width: 100%;"></div>';
                echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
				echo "<p>&nbsp;</p>";
				echo '<div id="divTable" name="divTable" style="border:solid">';

				
            }

            echo "<h4 class='centerBoldText'>Axle Load Distribution</h4>";
			if ($showAllOption) { // Shows table for all vehicle classes (4-13)
				echo '<div class="scrollmenu">';
				echo '<table table id = "tableSpectra" class="table table-fixed table-striped text-center table-dark bg-info table-bordered table-hover table-sm">';
                echo '<thead class = "header-fixed">';
                echo '<tr>';
                for ($row = $firstRoadwayRow - 1; $row <= $firstRoadwayRow - 1; $row ++) {
                    for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        if ($charCol == 65 || $charCol == 66 || $charCol == 67) {
                            echo '<th class = "color" scope = "row">' . ($worksheet->getCell(chr($charCol) . $row)->getValue()) . '</th>';
                        } else if ($charCol != 68) {
                            echo '<th class = "color" scope = "col">' . (($worksheet->getCell(chr($charCol) . $row)->getValue())) . '</th>';
                        }
                    }
                    for ($charCol = 65; $charCol <= 81; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        echo '<th class = "color" scope = "col">' . (($worksheet->getCell("A" . chr($charCol) . $row)->getValue())) . '</th>';
                    }
                }
                echo '</tr>';
                echo '</thead>';
                for ($row = $firstRoadwayRow; $row <= $lastRoadwayRow; $row ++) {
                    $classRow = $firstRoadwayRow;
                    echo '<tr>';
                    for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        if ($charCol == 65) {
                            echo '<th class = "color" scope = "row">' . ($worksheet->getCell(chr($charCol) . $row)->getValue()) . '</th>';
                        } else if ($charCol != 68) {
                            if ($charCol > 68) {
                                array_push($columnsArray, round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2));
                                array_push($classValues, round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2));
                            }
                            if ($charCol == 66) {
                                echo '<th class = "color" scope = "col">' . (($worksheet->getCell(chr($charCol) . $row)->getValue())) . '</th>'; // basically don't round when the value is "SUMMER"
                            } else {
                                if($charCol == 67){
                                    echo '<th class = "color" scope = "col">' . (round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2)) . '</th>';
                                }else{
                                    echo '<th scope = "col">' . (round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2)) . '</th>';
                                }
                                // echo round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2) ." ";
                            }
                        }
                        if ($charCol == 67) {
                            array_push($rowsArray, $worksheet->getCell(chr($charCol) . $row)->getValue());
                        }
                        $classRow ++;
                    }
                    for ($charCol = 65; $charCol <= $lastColumn; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        array_push($columnsArray, round($worksheet->getCell("A" . chr($charCol) . $row)->getValue(), 2));
                        array_push($classValues, round($worksheet->getCell("A" . chr($charCol) . $row)->getValue(), 2));
                        echo '<th scope = "col">' . (round($worksheet->getCell("A" . chr($charCol) . $row)->getValue(), 2)) . '</th>';
                    }
                    echo '</tr>';
                }
                echo "</table>";
            	echo "</div>";
            } else { // Shows table for only one certain vehicle class
                for ($row = $firstRoadwayRow - 1; $row <= $firstRoadwayRow - 1; $row ++) {
                    for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        
                        if ($charCol == 65 || $charCol == 66 || $charCol == 67) {
                        } else if ($charCol != 68) {
                           
                        }
                    }
                    for ($charCol = 65; $charCol <= $lastColumn; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        
                    }
                }
               
                for ($row = $firstRoadwayRow + (intval($GLOBALS['selected_val3']) - 4); $row <= $firstRoadwayRow + (intval($GLOBALS['selected_val3']) - 4); $row ++) {
                    for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        if ($charCol == 65) {
                            
                        } else if ($charCol != 68) {
                            if ($charCol > 68) {
                                array_push($columnsArray, round($worksheet->getCell(chr($charCol) . $row)->getValue(), 2));
                            }
                            if ($charCol == 66) {
                            } else {
                            }
                        }
                        if ($charCol == 67) {
                            array_push($rowsArray, $worksheet->getCell(chr($charCol) . $row)->getValue());
                        }
                    }
                    for ($charCol = 65; $charCol <= $lastColumn; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                        array_push($columnsArray, round($worksheet->getCell("A" . chr($charCol) . $row)->getValue(), 2));
                    }
                }
                

                $i = $axleWeight;
                for ($j = 0; $j < count($columnsArray); $j ++) {
					$dataPointsSpectra[] = array(
                        "label" => $i,
                        "y" => $columnsArray[$j]
                    );
                    $i += $axleWeightIncremental;
                }
				$i = $axleWeight;
				
				for ($k = 0; $k < count($columnsArray); $k ++) {
					//echo $columnsArray[$k] . " " . "</br>";
				}

            }
            
            if(!$showAllOption){
                echo '<table class="table table-fixed table-striped text-center table-dark bg-info table-bordered table-hover table-sm">';
                echo '<thead class = "header-fixed">';
                echo '<tr>';
                echo '<th scope="col">Axle Weight</th>';
                echo '<th scope="col">Axle Percentage (%)</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($dataPointsSpectra as $arr) {
                    echo "<tr>";
                    echo '<th scope = "col">'.($arr['label']).'</th>';
                    echo '<th scope = "col">'.($arr['y']).'</th>';
                    echo "</tr>";
                }
                echo '</tbody>';
				echo "</table>";
                echo "</div>";
				echo "</div>";
			}
			
			echo "</div>";
            
        }
	}
	if($showAllOption){
		$curr = 0;
		$i = $axleWeight;
		for ($k = 0; $k < count($classValues); $k ++) {
			if ($curr == 0) {
				if ($i <= $axleWeightMax) {
					$class4[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$i = $axleWeight;
					$k --;
				}
			} elseif ($curr == 1) {
				if ($i <= $axleWeightMax) {
					$class5[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
					$i = $axleWeight;
				}
			} elseif ($curr == 2) {
				if ($i <= $axleWeightMax) {
					
					$class6[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 3) {
				if ($i <= $axleWeightMax) {
					
					$class7[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 4) {
				if ($i <= $axleWeightMax) {
					
					$class8[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 5) {
				if ($i <= $axleWeightMax) {
					
					$class9[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 6) {
				if ($i <= $axleWeightMax) {
					
					$class10[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 7) {
				if ($i <= $axleWeightMax) {
					
					$class11[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
	
					$i = $axleWeight;
				}
			} elseif ($curr == 8) {
				if ($i <= $axleWeightMax) {
					
					$class12[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
					$i = $axleWeight;
				}
			} elseif ($curr == 9) {
				if ($i <= $axleWeightMax) {
					
					$class13[] = array(
						"label" => $i,
						"y" => $classValues[$k]
					);
					$i += $axleWeightIncremental;
				} else {
					$curr ++;
					$k --;
					$i = $axleWeight;
				}
			}
		}
		for ($k = 0; $k < count($classValues); $k ++) {
			//echo $classValues[$k] . " " . "</br>";
		}
	
	}
    $columnChange = 0; //This modifies the number of Roadway Column since the Winter and Summer Distribution are different
    require_once "PHPExcel-1.8/Classes/PHPExcel.php"; // Library that allows usage of Excel (.xlsx) Sheet
    //$tmpfname = "Axle Load Spectra Database - SUMMER - WINTER 1.0.xlsx"; // Excel document to be used
	if((string) $_POST['dropdownSpectraSeason'] == "Summer"){
		echo '<script type="text/javascript">selectSeason("Summer");</script>';
		$tmpfname = "Axle Load Spectra Database - SUMMER - ONLY.xlsx";
		$columnChange = 1;
	}
	else{
		echo '<script type="text/javascript">selectSeason("Winter");</script>';
		$tmpfname = "Axle Load Spectra Database - WINTER ONLY.xlsx";
		$columnChange = 1;
	}
	
	$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
    $excelObj = $excelReader->load($tmpfname);
    $worksheet = $excelObj->getSheet(1); // This allows for you to choose what page in the .xlsx to be used
    $lastRow = $worksheet->getHighestRow(); // Variable for traversing to the last used row in the .xlsx sheet

    $firstRoadwayColumn = null;
    $firstRoadwayRow = null;
    $lastRoadwayColumn = null;
    $lastRoadwayRow = null;
    $AADTRow = null;

    switch ($GLOBALS['selected_SpectraRoadway']) {
        case "FM468":
            $AADTRow = 4;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 14;
            break;

        case "US83":
            $AADTRow = 5;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 14;
            break;

        case "FM99":
            $AADTRow = 6;
            $firstRoadwayColumn = 81; // 'Q'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 83; // 'S'
            $lastRoadwayRow = 14;
            break;

        case "FM624":
            $AADTRow = 7;
            $firstRoadwayColumn = 85; // 'U'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 87; // 'W'
            $lastRoadwayRow = 14;
            break;

        case "SH16":
            $AADTRow = 8;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 27;
            break;

        case "SH72":
            $AADTRow = 9;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 27;
            break;

        case "SH123":
            $AADTRow = 10;
            $firstRoadwayColumn = 81; // 'Q'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 83; // 'S'
            $lastRoadwayRow = 27;
            break;

        case "US281":
            $AADTRow = 11;
            $firstRoadwayColumn = 85; // 'U'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 87; // 'W'
            $lastRoadwayRow = 27;
            break;

        case "SH119":
            $AADTRow = 12;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 29;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 40;
            break;

        case "US183":
            $AADTRow = 13;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 29;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 40;
            break;
    }
	$firstRoadwayColumn = $firstRoadwayColumn + $columnChange;
	$lastRoadwayColumn = $lastRoadwayColumn + $columnChange;
    /* Hardcoded Columns and Rows for road traffic information */
    /**
     * ********************************************************
     */
    
    // echo "</table>";

    /* Hardcoded Columns and Rows for road traffic information */
    /**
     * ********************************************************
     */
    $currRow = 0;
    if ($GLOBALS['selected_SpectraRoadway'] != "Select Roadway") {
        //echo '<div class="row">';
        if($showAllOption){
			echo '<div style="width: 50%; height: 50%; float:right;">';
            echo "</br>";
            echo "</br>";
            echo "</br>";
        }
        else{
			echo '<div id="divTable" name="divTable" style="border:solid; width:50%;height:100%">';
			//echo '<div style="width: 50%; height: 50%; left:50%">';
            //echo "<h4>General Traffic Information</h4>";
            
        }
        echo "<h4 class='centerBoldText'>General Traffic Information</h4>";
        echo '<table class="table table-fixed table-striped text-center table-dark bg-info table-bordered table-hover table-sm"';
        echo '<thead>';
		echo '<tr>';
		if((string) $_POST['dropdownSpectraSeason'] == "Winter" || (string) $_POST['dropdownSpectraSeason'] == "Summer"){
			echo '<th class = "color" scope="col">Two-Way ADT</th>';	
		}
		echo '<th class = "color" scope="col">Two-Way AADTT</th>';
		echo '<th class = "color" scope="col">Percent Truck (%)</th>';
        echo '<th class = "color" scope="col">Percent Overweight(%)</th>';
        echo '</tr>';
        echo '</thead>';
    }

    for ($row = 4; $row <= 13; $row ++) {

        if ($row == $AADTRow) {
            echo '<tr>';
			if((string) $_POST['dropdownSpectraSeason'] == "Winter" || (string) $_POST['dropdownSpectraSeason'] == "Summer"){
				for ($col = 67; $col <= 70; $col ++) {
					echo '<th scope = "row">' . round($worksheet->getCell(chr($col) . $row)->getValue()) . '</th>';
				}
			}
			else{
				for ($col = 67; $col <= 69; $col ++) {
					echo '<th scope = "row">' . round($worksheet->getCell(chr($col) . $row)->getValue()) . '</th>';
				}
			}
            echo '</tr>';
        }
    }
	echo "</table>";
	//echo "</div>";
    if($showAllOption){
        echo "</div>";
    }
    $currRow = 0;
    if ($GLOBALS['selected_SpectraRoadway'] != "Select Roadway") {
        $barDataPoints = array();
        if($showAllOption){
            echo '<div style="width: 50%; height: 50%; float:left;">';
        }
        else{
            //echo '<div style="width: 100%; height: 50%; float:left;">';
        }
        echo '<div id="barChartContainer" style="height: 300px; width: 100%;"></div>'; // CALLING BAR GRAPH
        echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
        echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
    }
    for ($row = $firstRoadwayRow + 2; $row <= $lastRoadwayRow; $row ++) {
        // if($GLOBALS['selected_season'] == "Summer"){
        /*
         * echo '<tr>';
         * echo '<th scope = "row">'.($worksheet->getCell(chr($firstRoadwayColumn).$row)->getValue()).'</th>';
         */
        // for($col = 0; $col <= 3; $col++){
        for ($col = $firstRoadwayColumn + 1; $col <= $lastRoadwayColumn; $col ++) {
            // echo '<td>'.(round($worksheet->getCell(chr($col).$row)->getValue()*100,2))."%".'</td>';
            if ($col == $firstRoadwayColumn + 1) {
                $barDataPoints[] = array(
                    "label" => $worksheet->getCell(chr($firstRoadwayColumn) . $row)->getValue(),
                    "y" => round($worksheet->getCell(chr($col) . $row)->getValue() * 100, 2)
                    
                );
            }
        }
        // }
        // echo '</tr>';
	}
}


?>

	<script type="text/javascript">
window.onload = function showCharts() {
	
	var chart2 = new CanvasJS.Chart("barChartContainer", {
		animationEnabled: true,
		title: {
			text: "Vehicle Class Distribution"
		},
		axisX: {
			interval: 1
		},
		axisY: {
			title: "Percent Truck (%)",
		},
		data: [{
			type: "bar",
			dataPoints: <?php echo json_encode($barDataPoints, JSON_NUMERIC_CHECK); ?>

		}]
	});
	
	var chart3 = new CanvasJS.Chart("chartContainer3", { //Axle Load Distribution
		animationEnabled: true,
		//theme: "light2",
		title:{
			text: "Axle Load Distribution",
			fontSize: 35
		},
		axisX:{
			title: "Axle Weight (lb)",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY:{
			title: "Axle Percentage (%)",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		toolTip:{
			enabled: false
		},
		dataPointWidth: 30,
		data: [{
			color: "orange",
			type: "column",
			dataPoints: <?php echo json_encode($dataPointsSpectra, JSON_NUMERIC_CHECK); ?>
		}]
		});
		//chart3.render();
		
	
	var chart4 = new CanvasJS.Chart("chartContainer4", {
		animationEnabled: true,
		//theme: "light2",
		title:{
			text: " Axle Load Distributions"
		},
		axisX:{
			title: "Axle Weight (lb)",
			
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		legend: {
			fontSize: 15,
			verticalAlign: "top",
			horizontalAlign: "center",
			dockInsidePlotArea: true
		},
		axisY:{
			title: "Axle Percentage (%)",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		toolTip:{
			shared: true
			
		},
		data: [
		{toolTipContent: "Axle Weight (lb): {label}",
			type: "scatter",
			name: "ToolTipTitle",
			dataPoints: <?php echo json_encode($class4, JSON_NUMERIC_CHECK); ?>
		},{	
			type: "scatter",
			showInLegend: true,
			name: "Class 4",
			dataPoints: <?php echo json_encode($class4, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 5",
			dataPoints: <?php echo json_encode($class5, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 6",
			dataPoints: <?php echo json_encode($class6, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 7",
			dataPoints: <?php echo json_encode($class7, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 8",
			dataPoints: <?php echo json_encode($class8, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 9",
			dataPoints: <?php echo json_encode($class9, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 10",
			dataPoints: <?php echo json_encode($class10, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 11",
			dataPoints: <?php echo json_encode($class11, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 12",
			dataPoints: <?php echo json_encode($class12, JSON_NUMERIC_CHECK); ?>
		},{
			type: "scatter",
			
			showInLegend: true,
			name: "Class 13",
			dataPoints: <?php echo json_encode($class13, JSON_NUMERIC_CHECK); ?>
		}]
		});
	
		//chart4.render();
	
<?php
if ($GLOBALS['showAllSpectra'] == true) {
    echo "chart4.render();";
    
} else {
    echo "chart3.render();";
}
echo "chart2.render();";
?>

}

</script>


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
