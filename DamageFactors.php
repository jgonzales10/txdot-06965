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

<title>Damage Factors</title>

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
<style type="text/css">
.color {
  background-color: #216389;
}
.center-div
{
     margin: 0 auto;
     width: 100px; 
}
</style>
<script type="text/javascript">
		$(document).ready(function(){
			$("#districtSelect").change(function (){//POPULATE COUNTIES BY DISTRICT SELECTION
				var selectedDistrict = $("#districtSelect").val();
				if(selectedDistrict == "San Antonio"){
					$("#countySelect").empty();
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					$( '<option value="McMullen" id = "McMullenOption">McMullen</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );	
				}
				else if(selectedDistrict == "Corpus Christi"){
					$("#countySelect").empty(); 
	  	  			$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

		  	  		$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$("#roadwaySelect").empty(); 
  	  				$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	  	  		
					$( '<option value="Karnes" id ="KarnesOption">Karnes</option>' ).appendTo( "#countySelect" ); 
  					$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );

				}
				else if(selectedDistrict == "Laredo"){
					$("#countySelect").empty(); 
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
					
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

					$( '<option value="La Salle" id ="LaSalleOption">La Salle</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Dimmit" id ="DimmitOption">Dimmit</option>' ).appendTo( "#countySelect" );
			
				}
				else if(selectedDistrict == "Yoakum"){
					$("#countySelect").empty(); 
					$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
						
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
						
					$( '<option value="Gonzales" id ="GonzalesOption">Gonzales</option>' ).appendTo( "#countySelect" ); 
					$( '<option value="Dewitt" id ="DewittOption">Dewitt</option>' ).appendTo( "#countySelect" );
				}
			});
			
			$("#countySelect").change(function (){//POPULATE COUNTIES BY DISTRICT SELECTION
				var selectedCounty = $("#countySelect").val();
				if(selectedCounty == "McMullen"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="FM">FM</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					$( '<option value="FM624">FM624</option>' ).appendTo( "#roadwaySelect" ); 
					$( '<option value="FM99">FM99</option>' ).appendTo( "#roadwaySelect" );
				}
				else if(selectedCounty == "Atascosa"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="SH16">SH16</option>' ).appendTo( "#roadwaySelect" );
				}
				else if(selectedCounty == "Karnes"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="SH123">SH123</option>' ).appendTo( "#roadwaySelect" );
					$( '<option value="SH72">SH72</option>' ).appendTo( "#roadwaySelect" );
				}
				else if(selectedCounty == "Live Oak"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="US281">US281</option>' ).appendTo( "#roadwaySelect" );
				}
				else if(selectedCounty == "La Salle"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="FM">FM</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="FM468">FM468</option>' ).appendTo( "#roadwaySelect" ); 
				}
				else if(selectedCounty == "Dimmit"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="US83">US83</option>' ).appendTo( "#roadwaySelect" );
				}
				else if(selectedCounty == "Gonzales"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwaySelect" ); 
					$( '<option value="US">US</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="US183">US183</option>' ).appendTo( "#roadwaySelect" ); 
				}
				else if(selectedCounty == "Dewitt"){
					$("#roadwayTypeSelect").empty();
					$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
					$( '<option value="SH">SH</option>' ).appendTo( "#roadwayTypeSelect" );
					$("#roadwaySelect").empty(); 
					$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
					
					$( '<option value="SH119">SH119</option>' ).appendTo( "#roadwaySelect" );
				}

			});

			
			$("#SteeringSingleAxle").click(function(){ //POPULATE AXLE WEIGHTS BY AXLE SELECTION
				$("#optionSelect").empty();
  	  			$('<option value="Select" selected="selected">Select Axle Weight</option>' ).appendTo( "#optionSelect" );
				
				for (i = 3; i <= 41; i += 1) {
					$( '<option value='+(i)+'>'+(i)+'</option>' ).appendTo( "#optionSelect" );  // options 3 through 41
                }
			});
			$("#SingleAxle").click(function(){ 
				$("#optionSelect").empty();
  	  			$('<option value="Select" selected="selected">Select Axle Weight</option>' ).appendTo( "#optionSelect" );
				
				for (i = 3; i <= 41; i += 1) {
					$( '<option value='+(i)+'>'+(i)+'</option>' ).appendTo( "#optionSelect" );  // options 3 through 41
                }
			});
			$("#TandemAxle").click(function(){ 
				$("#optionSelect").empty();
  	  			$('<option value="Select" selected="selected">Select Axle Weight</option>' ).appendTo( "#optionSelect" );
				
				for (i = 6; i <= 82; i += 2) {
					$( '<option value='+(i)+'>'+(i)+'</option>' ).appendTo( "#optionSelect" );  // options 3 through 41
                }
			});
			$("#TridemAxle").click(function(){ 
				$("#optionSelect").empty();
  	  			$('<option value="Select" selected="selected">Select Axle Weight</option>' ).appendTo( "#optionSelect" );
				
				for (i = 12; i <= 102; i += 3) {
					$( '<option value='+(i)+'>'+(i)+'</option>' ).appendTo( "#optionSelect" );  // options 3 through 41
                }
			});
			$("#QuadAxle").click(function(){ 
				$("#optionSelect").empty();
  	  			$('<option value="Select" selected="selected">Select Axle Weight</option>' ).appendTo( "#optionSelect" );
				
				for (i = 12; i <= 102; i += 3) {
					$( '<option value='+(i)+'>'+(i)+'</option>' ).appendTo( "#optionSelect" );  // options 3 through 41
                }
			});
			
			$("#defaultCheck1").click(function(){ //If the 'Show All Rows' checkbox is clicked, it will disable the Axle Weight dropdown form
				if ($(this).is(":checked")) {
					$("#optionSelect").prop("disabled", true);
   				} else {
  					$("#optionSelect").prop("disabled", false);  
				}
			});
			$("#defaultCheck2").click(function(){ //If the 'Show All Rows' checkbox is clicked, it will disable the Axle Weight dropdown form
				if ($(this).is(":checked")) {
					$("#optionSelect2").prop("disabled", true);
   				} else {
  					$("#optionSelect2").prop("disabled", false);  
				}
			});
		});	
		
	</script>
<script type="text/javascript">
		$(document).ready(function(){
				$("#McMullenOption").click(function(){ 
				$( '<option value="FM624">FM624</option>' ).appendTo( "#roadwaySelect" ); 
  			$( '<option value="FM99">FM99</option>' ).appendTo( "#roadwaySelect" );
				});
				$("#AtascosaOption").click(function(){
				$( '<option value="SH16">SH16</option>' ).appendTo( "#roadwaySelect" ); 
				});
				$("#KarnesOption").click(function(){
				$( '<option value="SH123">SH123</option>' ).appendTo( "#roadwaySelect" ); 
  			$( '<option value="SH72">SH72</option>' ).appendTo( "#roadwaySelect" );
				});
				$("#LiveOakOption").click(function(){
				$( '<option value="US281">US281</option>' ).appendTo( "#roadwaySelect" ); 
				});
				$("#LaSalleOption").click(function(){ 
				$( '<option value="FM468">FM468</option>' ).appendTo( "#roadwaySelect" ); 
				});
				$("#DimmitOption").click(function(){ 
				$( '<option value="US83">US83</option>' ).appendTo( "#roadwaySelect" ); 
				});
				$("#GonzalesOption").click(function(){ 
				$( '<option value="US183">US183</option>' ).appendTo( "#roadwaySelect" ); 
				});
				$("#DewittOption").click(function(){ 
				$( '<option value="SH119">SH119</option>' ).appendTo( "#roadwaySelect" ); 
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
.divColor{
	background-color: lightblue;
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


<?php
$GLOBALS['submittedEalf'] = false;
$GLOBALS['showAllSpectra'] = false;
$GLOBALS['submittedSpectra'] = false;
$GLOBALS['selected_season'] = "";
$GLOBALS['selected_axle'] = "";
$GLOBALS['selected_district'] = "";
$GLOBALS['selected_county'] = "";
$GLOBALS['selected_roadway'] = "";
$GLOBALS['selected_axleweight'] = "";
$GLOBALS['showRowsOption'] = false;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand text-white" href="#">Navigation</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNav" aria-controls="navbarNav"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link"
					href="LoadDistribution.php">Axle Load Distribution</a></li>
				<li class="nav-item active"><a class="nav-link" href="DamageFactors.php">Damage Factors<span
						class="sr-only">(current)</span></a></li>
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
			<div class ="jumbotron bg-info text-white" style="max-height:70%; max-width:100%">

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
<?php $htmlString= $GLOBALS['selected_roadway']; ?>
<div class = "center-div" style="width: 75%; border:solid; height: 100%; float:center">
<div id="map"></div>
</div>
<script type="text/javascript">
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
function selectFM624() {
	$('#districtSelect').val("San Antonio");
	//$('#countySelect').val("McMullen");
	//$('#roadwayTypeSelect').val("FM");
	//$('#roadwaySelect').val("FM624");


	//<option name="San Antonio" value="San Antonio" id="SanAntonioOption">San Antonio</option>
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="McMullen" id = "McMullenOption"selected="selected">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="FM624"selected="selected">FM624</option>' ).appendTo( "#roadwaySelect" ); 
	$( '<option value="FM99">FM99</option>' ).appendTo( "#roadwaySelect" );

	//map.setCenter({lat:28.125868,lng:-98.525511});
	//map.setZoom(11);
}
function selectFM99() {
	$('#districtSelect').val("San Antonio");
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="McMullen" id = "McMullenOption"selected="selected">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="FM624">FM624</option>' ).appendTo( "#roadwaySelect" ); 
	$( '<option value="FM99"selected="selected">FM99</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.465600,lng:-98.440487});
	//map.setZoom(11);
}

function selectSH16() {
	$('#districtSelect').val("San Antonio");
	$("#countySelect").empty();
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="McMullen" id = "McMullenOption">McMullen</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Atascosa" id ="AtascosaOption"selected="selected">Atascosa</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="SH16"selected="selected">SH16</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.784422,lng:-98.540370});
	//map.setZoom(11);
}
function selectSH123() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

	$( '<option value="Karnes" id ="KarnesOption"selected="selected">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="SH123"selected="selected">SH123</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="SH72">SH72</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.878125,lng:-97.893333});
	//map.setZoom(11);
}
function selectUS281() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

	$( '<option value="Karnes" id ="KarnesOption">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption"selected="selected">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="US281"selected="selected">US281</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.452511,lng:-98.183444});
	//map.setZoom(11);
}

function selectSH72() {
	$('#districtSelect').val("Corpus Christi");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );

	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

	$( '<option value="Karnes" id ="KarnesOption"selected="selected">Karnes</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Live Oak" id ="LiveOakOption">Live Oak</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="SH123">SH123</option>' ).appendTo( "#roadwaySelect" );
	$( '<option value="SH72"selected="selected">SH72</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.739827,lng:-97.940206});
	//map.setZoom(11);
}

function selectFM468() {
	$('#districtSelect').val("Laredo");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

	$( '<option value="La Salle" id ="LaSalleOption"selected="selected">La Salle</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dimmit" id ="DimmitOption">Dimmit</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="FM"selected="selected">FM</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="FM468"selected="selected">FM468</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.531170,lng:-99.398022});
	//map.setZoom(11);
}

function selectUS83() {
	$('#districtSelect').val("Laredo");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
	
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );

	$( '<option value="La Salle" id ="LaSalleOption">La Salle</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dimmit" id ="DimmitOption"selected="selected">Dimmit</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="US83"selected="selected">US83</option>' ).appendTo( "#roadwaySelect" );
	//map.setCenter({lat:28.504907,lng:-99.838659});
	//map.setZoom(11);
}

function selectUS183() {
	$('#districtSelect').val("Yoakum");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
		
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
		
	$( '<option value="Gonzales" id ="GonzalesOption"selected="selected">Gonzales</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dewitt" id ="DewittOption">Dewitt</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwaySelect" ); 
	$( '<option value="US"selected="selected">US</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="US183"selected="selected">US183</option>' ).appendTo( "#roadwaySelect" ); 


	//map.setCenter({lat:29.459768,lng:-97.435360});
	//map.setZoom(11);
}
function selectSH119(){
	$('#districtSelect').val("Yoakum");
	$("#countySelect").empty(); 
	$('<option value="Select County" selected="selected">Select County</option>' ).appendTo( "#countySelect" );
		
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
		
	$( '<option value="Gonzales" id ="GonzalesOption">Gonzales</option>' ).appendTo( "#countySelect" ); 
	$( '<option value="Dewitt" id ="DewittOption"selected="selected">Dewitt</option>' ).appendTo( "#countySelect" );
	$("#roadwayTypeSelect").empty();
	$( '<option value="Select Roadway Type" selected="selected">Select Roadway Type</option>' ).appendTo( "#roadwayTypeSelect" ); 
	$( '<option value="SH"selected="selected">SH</option>' ).appendTo( "#roadwayTypeSelect" );
	$("#roadwaySelect").empty(); 
	$('<option value="Select Roadway" selected="selected">Select Roadway</option>' ).appendTo( "#roadwaySelect" );
	
	$( '<option value="SH119"selected="selected">SH119</option>' ).appendTo( "#roadwaySelect" );

	//map.setCenter({lat:29.036632,lng:-97.572325});
	//map.setZoom(11);
}
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
	</script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwEDc4pCGdSHICzw-cn7jiKur9KgmV4d8&amp;callback=initMap"
		async defer type="text/javascript">
	</script>

	<p>&nbsp;</p>
	<div class = "center-div" style="width: 90%; height: 100%; float:center">

	<div class="jumbotron bg-info">
		<div class="container-center align-top text-white">
			<h2>Equivalent Axle Load Factors (EALF):</h2>
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
					</select> <label for="dropdownEalfRoadway"></label>
					<p>&nbsp;</p>
					<select class="form-control disabled" id="roadwayTypeSelect"
						name="dropdownEalfRoadwayType">
						<option value="Select Roadway Type" selected="selected">Select
							Roadway Type</option>
						<option value="FM">FM</option>
						<option value="SH">SH</option>
						<option value="US">US</option>
					</select>
					<p>&nbsp;</p>
					<select class="form-control disabled" id="roadwaySelect"
						name="dropdownEalfRoadway">
						<option value="Select Roadway" selected="selected">Select Roadway</option>
					</select>

				</div>
				<p>&nbsp;</p>
				<div class="form-group">
					<label for="dropdownEalfSeason"></label> <select
						class="form-control disabled" id="seasonSelect"
						name="dropdownEalfSeason">
						<option selected>Select Season</option>
						<option value="Summer" id="summerOption">Summer</option>
						<option value="Winter" name="Winter">Winter</option>
					</select> <label for="dropdownEalfAxle"></label> <select
						class="form-control" id="axleSelect" name="dropdownEalfAxle">
						<option selected>Select Axle Type</option>
						<option value="Steering Single Axle " id="SteeringSingleAxle">Steering
							Single Axle</option>
						<option value=" Single Axle" id="SingleAxle">Single Axle</option>
						<option value="Tandem " id="TandemAxle">Tandem Axle</option>
						<option value="Tridem " id="TridemAxle">Tridem Axle</option>
						<option value="Quad " id="QuadAxle">Quad Axle</option>
					</select>

					<p>&nbsp;</p>
					<div class="btn-toolbar">
						<p>&nbsp;</p>
						<input class="btn btn-success btn-sm" type="submit"
							name="submitEALF" value="Run">
					</div>
				</div>
			</div>

		</form>
	</div>


	<form action=""></form>

	<div></div>
	<p></p>

<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
if (isset($_POST['submitEALF'])) {
    $submittedEalf = true;
    $dataPoints = array();
    $asphaltDataPoints = array();
    $showRowsOption = true;
    
    if (((string) $_POST['dropdownEalfSeason'] != "Select Season") && ((string) $_POST['dropdownEalfAxle'] != "Select Axle Type") && ((string) $_POST['dropdownEalfDistrict'] != "Select District") && ((string) $_POST['dropdownEalfCounty'] != "Select County") && ((string) $_POST['dropdownEalfRoadway'] != "Select Roadway") ) {
        $GLOBALS['selected_season'] = (string) $_POST['dropdownEalfSeason']; // Storing Selected Season Globally
        $GLOBALS['selected_axle'] = (string) $_POST['dropdownEalfAxle']; // Storing Selected Axle Globally
        $GLOBALS['selected_district'] = (string) $_POST['dropdownEalfDistrict']; // Storing Selected District Globally
        $GLOBALS['selected_county'] = (string) $_POST['dropdownEalfCounty']; // Storing Selected County Globally
        $GLOBALS['selected_roadway'] = (string) $_POST['dropdownEalfRoadway']; // Storing Selected Roadway Globally
        if (! $showRowsOption) {
            $GLOBALS['selected_axleweight'] = (string) $_POST['dropdownEalfWeight']; // Storing Selected Axle Weight Option Globally
        }
		echo '<div class ="divColor">';

        echo "<h4>You have selected: ".(string) $_POST['dropdownEalfDistrict']. ", "
			.(string) $_POST['dropdownEalfCounty']. ", ".(string) $_POST['dropdownEalfRoadway']. ", "
			.(string) $_POST['dropdownEalfSeason'].", ".(string) $_POST['dropdownEalfAxle']."</h4>"; // Displaying Selected Value// echo ((chr(65).chr(65)) == 'AA'); //chr(num) turns integer ascii into character
		echo "<br/>";
		echo"</div>";
		echo "<br/>";

        require_once "PHPExcel-1.8/Classes/PHPExcel.php"; // Library that allows usage of Excel (.xlsx) Sheet
	$tmpfname = "EALF Database1.xlsx"; // Excel document to be used
	$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0); // This allows for you to choose what page in the .xlsx to be used
        $lastRow = $worksheet->getHighestRow(); // Variable for traversing to the last used row in the .xlsx sheet
        $roadwayColumn = null; // Variable for finding the column where the Roadway matched with the search query
        $axleWeightColumn = null; // Variable for finding the column where the axleWeight matched with the search query
        $axleColumn = null; // Variable for finding the column where the Axle matched with the search query
        $lastAxleRow = null; // Variable that finds out where the Axle Weight options become null to find indeces
        $lastAxleFlag = false; // Boolean that becomes true when it detects the last Axle Option
        $firstAxleFlag = false; // Boolean that becomes true when it detects a match for the first Axle Option
        $currRow = 0;
        $rowFlag = true;
        // echo $lastRow;
	if (($selected_season != "Select Season") && ($selected_axle != "Select Axle Type") && ($selected_district != "Select District") && ($selected_county != "Select County") && ($selected_roadway != "Select Roadway") && ($selected_axleweight != "Select")) {
		switch ($GLOBALS['selected_axle']) {
            case "Steering Single Axle ":
				echo '<script type="text/javascript">selectAxleType("Steering Single Axle ");</script>';
                break;

            case " Single Axle":
				echo '<script type="text/javascript">selectAxleType(" Single Axle");</script>';
                break;

            case "Tandem ":
				echo '<script type="text/javascript">selectAxleType("Tandem ");</script>';
                break;

            case "Tridem ":
				echo '<script type="text/javascript">selectAxleType("Tridem ");</script>';
                break;

            case "Quad ":
				echo '<script type="text/javascript">selectAxleType("Quad ");</script>';
                break;
        }
		echo '<script type="text/javascript">selectAxleType('.$GLOBALS['selected_axle'].');</script>';
 
		if ($showRowsOption) {
                echo '<div id="chartContainer" style="height: 370px; width: 100%;"></div>'; // SCRIPT FOR LINE GRAPH
                echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';
            }

            //echo '<div class="row">';
            //echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
            echo "<center>";
            echo '<h3>EALF Values</h3>';
            echo "</center>";
            
            echo '<table style="width: 50%;" align="center"   id="ealfTable" class="table table-dark text-center bg-primary table-striped table-bordered table-hover" ';
            echo '<thead>';
            echo '<tr>';
            echo '<th class="color" scope="col">Axle Weight (kips)</th>';
            echo '<th class="color" scope="col">EALF Value</th>';
            echo '</tr>';
            echo '</thead>';
        }
        for ($row = 1; $row <= $lastRow; $row ++) {
            if ($GLOBALS['selected_season'] == "Summer") {
				echo '<script type="text/javascript">selectSeason("Summer");</script>';
                for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                    if ($GLOBALS['selected_axle'] == (string) ($worksheet->getCell(chr($charCol) . $row)->getValue())) { // Matched Selected Axle from search Query
                        $axleColumn = chr($charCol);
                        $axleRow = $row;
                        //echo "Axle Column:".$axleRow." + ".$axleColumn."<br/>";
                    }
                    if ($GLOBALS['selected_roadway'] == (string) ($worksheet->getCell(chr($charCol) . $row)->getValue())) { // Matched Selected Roadway from search Query
                        $roadwayColumn = chr($charCol);
                    }
                    // echo $row."<br/>";
                    if ($firstAxleFlag == false) {
                        if ($GLOBALS['selected_axle'] == (string) ($worksheet->getCell(chr($charCol) . $row)->getValue())) { // Finds the First Axle and stores the column location
                            $flag = false;
                            $firstAxleFlag = true;
                            $firstAxleRow = $row; // UNUSED FOR NOW BUT MAYBE WILL REPLACE FIRSTAXLEFLAG
                            $axleWeightColumn = chr($charCol + 1); // COLUMN WHERE THE FIRST AXLE WEIGHT IS FOUND
                        }
                    }

                    // echo "FirstAxleFlag".$firstAxleFlag ." ";
                    if ($firstAxleFlag && $GLOBALS['selected_axleweight'] == (string) ($worksheet->getCell(chr($charCol) . $row)->getValue())) {
                        $axleWeightRow = $row;
                    }
                    if (chr($charCol) == $axleColumn && ! $lastAxleFlag && $roadwayColumn != null && $firstAxleFlag && $showRowsOption) {
                        //if (! $flag) {
                          //  $flag = true; // FOR SOME REASON THE FIRST VALUE REPEATS AND THIS IS MY FIX...
                        //} else {
                            echo '<tr class>';
                            echo '<th scope = "row">' . ($worksheet->getCell($axleWeightColumn . $row)->getValue()) . '</th>';
                            echo '<td>' . round($worksheet->getCell($roadwayColumn . $row)->getValue(), 2) . '</td>';
                            $dataPoints[] = array(
                                "label" => $worksheet->getCell($axleWeightColumn . $row)->getValue(),
                                "y" => round($worksheet->getCell($roadwayColumn . $row)->getValue(), 2)
                            );
                            $asphaltDataPoints[] = array(
                                "label" => $worksheet->getCell($axleWeightColumn . $row)->getValue(),
                                "y" => round($worksheet->getCell(chr(68) . $row)->getValue(), 2)
                            );
                            echo '</tr>';
                            //echo round($worksheet->getCell(chr(68) . $row)->getValue(), 2) ." " ;
                        //}
                    }
                    // echo $axleWeightColumn."<br/>";
                    if ($firstAxleFlag == true && (($worksheet->getCell($axleWeightColumn . $row)->getValue()) == null) && $lastAxleFlag == false) {
                        $lastAxleRow = $row;
                        $lastAxleFlag = true;
                        $firstAxleFlag = false;
                        // echo "Last axle row: ".$lastAxleRow."<br/>";
                    }
                }
            } else if ($GLOBALS['selected_season'] == "Winter") {
				echo '<script type="text/javascript">selectSeason("Winter");</script>';
                for ($charCol = 65; $charCol <= 90; $charCol ++) { // 65 == 'A', 90 == 'Z', this will allow for numeric traversal through the columns
                    if ($GLOBALS['selected_axle'] == (string) ($worksheet->getCell('A'.chr($charCol) . $row)->getValue())) { // Matched Selected Axle from search Query
                        $axleColumn = 'A'.chr($charCol);
                        $axleRow = $row;
                        //echo "Axle Column:".$axleRow." + ".$axleColumn."<br/>";
                    }
                    if ($GLOBALS['selected_roadway'] == (string) ($worksheet->getCell('A'.chr($charCol) . $row)->getValue())) { // Matched Selected Roadway from search Query
                        $roadwayColumn = 'A'.chr($charCol);
                    }
                    // echo $row."<br/>";
                    if ($firstAxleFlag == false) {
                        if ($GLOBALS['selected_axle'] == (string) ($worksheet->getCell('A'.chr($charCol) . $row)->getValue())) { // Finds the First Axle and stores the column location
                            $flag = false;
                            $firstAxleFlag = true;
                            $firstAxleRow = $row; // UNUSED FOR NOW BUT MAYBE WILL REPLACE FIRSTAXLEFLAG
                            $axleWeightColumn = 'A'.chr($charCol + 1); // COLUMN WHERE THE FIRST AXLE WEIGHT IS FOUND
                            //echo $firstAxleRow;
                        }
                    }
                    
                    // echo "FirstAxleFlag".$firstAxleFlag ." ";
                    if ($firstAxleFlag && $GLOBALS['selected_axleweight'] == (string) ($worksheet->getCell('A'.chr($charCol) . $row)->getValue())) {
                        $axleWeightRow = $row;
                    }
                    if ('A'.chr($charCol) == $axleColumn && ! $lastAxleFlag && $roadwayColumn != null && $firstAxleFlag && $showRowsOption) {
                        
                            echo '<tr class>';
                            echo '<th scope = "row">' . ($worksheet->getCell($axleWeightColumn . $row)->getValue()) . '</th>';
                            echo '<td>' . round($worksheet->getCell($roadwayColumn . $row)->getValue(), 2) . '</td>';
                            $dataPoints[] = array(
                                "label" => $worksheet->getCell($axleWeightColumn . $row)->getValue(),
                                "y" => round($worksheet->getCell($roadwayColumn . $row)->getValue(), 2)
                            );
                            $asphaltDataPoints[] = array(
                                "label" => $worksheet->getCell($axleWeightColumn . $row)->getValue(),
                                "y" => round($worksheet->getCell(chr(68) . $row)->getValue(), 2)
                            );
                            echo '</tr>';
                            //echo round($worksheet->getCell(chr(68) . $row)->getValue(), 2) ." " ;
                        
                    }
                    // echo $axleWeightColumn."<br/>";
                    if ($firstAxleFlag == true && (($worksheet->getCell($axleWeightColumn . $row)->getValue()) == null) && $lastAxleFlag == false) {
                        $lastAxleRow = $row;
                        $lastAxleFlag = true;
                        $firstAxleFlag = false;
                        // echo "Last axle row: ".$lastAxleRow."<br/>";
                    }
                }
            }
        }

        if ($roadwayColumn != null && $axleWeightColumn != null) {
            if (! $showRowsOption) {
                echo '<tr>';
                echo '<th scope = "row">' . ($worksheet->getCell($axleWeightColumn . $axleWeightRow)->getValue()) . '</th>';
                echo '<td>' . (round($worksheet->getCell($roadwayColumn . $axleWeightRow)->getValue(), 2)) . '</td>';
                echo '</tr>';
            }
            echo "</table>";
            echo "</br>";
            echo '</div>';
            echo '</div>';
        }
    }
    require_once "PHPExcel-1.8/Classes/PHPExcel.php"; // Library that allows usage of Excel (.xlsx) Sheet
    $tmpfname = "Axle Load Spectra Database - WINTER ONLY.xlsx"; // Excel document to be used
    $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
    $excelObj = $excelReader->load($tmpfname);
    $worksheet = $excelObj->getSheet(1); // This allows for you to choose what page in the .xlsx to be used
    $lastRow = $worksheet->getHighestRow(); // Variable for traversing to the last used row in the .xlsx sheet

    $firstRoadwayColumn = null;
    $firstRoadwayRow = null;
    $lastRoadwayColumn = null;
    $lastRoadwayRow = null;
    $AADTRow = null;

    switch ($GLOBALS['selected_roadway']) {
		case "FM468":
			echo '<script type="text/javascript">selectFM468();</script>';

            $AADTRow = 4;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 14;
            break;
            
		case "US83":
			echo '<script type="text/javascript">selectUS83();</script>';

            $AADTRow = 5;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 14;
            break;
            
		case "FM99":
			echo '<script type="text/javascript">selectFM99();</script>';

            $AADTRow = 6;
            $firstRoadwayColumn = 81; // 'Q'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 83; // 'S'
            $lastRoadwayRow = 14;
            break;
            
		case "FM624":
			echo '<script type="text/javascript">selectFM624();</script>';

            $AADTRow = 7;
            $firstRoadwayColumn = 85; // 'U'
            $firstRoadwayRow = 3;
            $lastRoadwayColumn = 87; // 'W'
            $lastRoadwayRow = 14;
            break;
            
		case "SH16":
			echo '<script type="text/javascript">selectSH16();</script>';

            $AADTRow = 8;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 27;
            break;
            
		case "SH72":
			echo '<script type="text/javascript">selectSH72();</script>';

            $AADTRow = 9;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 27;
            break;
            
		case "SH123":
			echo '<script type="text/javascript">selectSH123();</script>';

            $AADTRow = 10;
            $firstRoadwayColumn = 81; // 'Q'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 83; // 'S'
            $lastRoadwayRow = 27;
            break;
            
		case "US281":
			echo '<script type="text/javascript">selectUS281();</script>';

            $AADTRow = 11;
            $firstRoadwayColumn = 85; // 'U'
            $firstRoadwayRow = 16;
            $lastRoadwayColumn = 87; // 'W'
            $lastRoadwayRow = 27;
            break;
            
		case "SH119":
			echo '<script type="text/javascript">selectSH119();</script>';

            $AADTRow = 12;
            $firstRoadwayColumn = 73; // chr(73) == 'I'
            $firstRoadwayRow = 29;
            $lastRoadwayColumn = 75; // 'K'
            $lastRoadwayRow = 40;
            break;
            
		case "US183":
			echo '<script type="text/javascript">selectUS183();</script>';

            $AADTRow = 13;
            $firstRoadwayColumn = 77; // 'M'
            $firstRoadwayRow = 29;
            $lastRoadwayColumn = 79; // 'O'
            $lastRoadwayRow = 40;
            break;
    }

    /* Hardcoded Columns and Rows for road traffic information */
    /**
     * ********************************************************
     */
    $currRow = 0;
    if ($selected_roadway != "Select Roadway") {
        $barDataPoints = array();
        
        //echo '<div id="barChartContainer" style="height: 300px; width: 100%;"></div>'; // CALLING BAR GRAPH
        //echo '<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>';

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
                    //"label" => $worksheet->getCell(chr($firstRoadwayColumn) . $row)->getValue(),
                    //"y" => round($worksheet->getCell(chr($col) . $row)->getValue() * 100, 2)
				);
				//echo $worksheet->getCell(chr($col) . $row)->getValue();
            }
        }
        // }
        // echo '</tr>';
    }
    // echo "</table>";

    /* Hardcoded Columns and Rows for road traffic information */
    /**
     * ********************************************************
     */
    /*
    $currRow = 0;
    if ($selected_roadway != "Select Roadway") {
        //echo '<div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">';

        echo '<table class="table table-striped table-dark bg-info table-bordered table-hover table-sm"';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Two-Way AADT for: '.$GLOBALS['selected_roadway'].'</th>';
        echo '<th scope="col">Percent Truck (%)</th>';
        echo '<th scope="col">Percent Overweight(%)</th>';
        echo '</tr>';
        echo '</thead>';
    }
    for ($row = 4; $row <= 13; $row ++) {
        if($row == $AADTRow){
            echo '<tr>';
    
            for ($col = 67; $col <= 69; $col ++) {
                echo '<th scope = "row">' . round($worksheet->getCell(chr($col) . $row)->getValue()) . '</th>';
            }
            echo '</tr>';
        }
    }
    echo "</table>";
    echo "</div>";
    */
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>



	<script type="text/javascript">
window.onload = function showCharts() {
	
	var chart1 = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		//theme: "light2",
		title:{
			text: "EALF Values"
		},
		axisX:{
			title: "Axle Weight (kips)",
			crosshair: {
				color: "orange",
				enabled: true,
				snapToDataPoint: true
			}
		},
		axisY:{
			title: "EALF Value",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
			}
		},
		legend: {
			fontSize: 20,
			verticalAlign: "top",
			horizontalAlign: "center",
			dockInsidePlotArea: true
		},
		toolTip:{
			shared: true
		},
		data: [
			{
			toolTipContent: "Axle Weight (kips): {label}",
			type: "area",
			name: "ToolTipTitle",
			color: "orange",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			showInLegend: true,
			name: "Modified EALF Values",
			color: "orange",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		},{
			type: "area",
			showInLegend: true,
			name: "Asphalt Institute EALF Values",
			color: "blue",
			dataPoints: <?php echo json_encode($asphaltDataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	
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
			type: "doughnut",
			dataPoints: <?php echo json_encode($barDataPoints, JSON_NUMERIC_CHECK); ?>

		}]
	});
	
<?php
if ($GLOBALS['submittedEalf']) {
    echo "chart1.render();";
    //echo "chart2.render();";
}
?>

}

function exportToExcel(tableID){
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6' style='height: 75px; text-align: center; width: 250px'>";
    var textRange; var j=0;
    tab = document.getElementById(tableID); // id of table
    for(j = 0 ; j < tab.rows.length ; j++)
    {
        tab_text=tab_text;
        tab_text=tab_text+tab.rows[j].innerHTML.toUpperCase()+"</tr>";
        //tab_text=tab_text+"</tr>";
    }
    tab_text= tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); //remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write( 'sep=,\r\n' + tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa=txtArea1.document.execCommand("SaveAs",true,"sudhir123.txt");
    }
    else {
       sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    }
    
    return (sa);
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
