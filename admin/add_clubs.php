<?php
include 'databconnect.php';
include '../check_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liberator Admin Theme ! Form elements - inputs</title>

	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />

	<link href="css/style.css" rel="stylesheet" type="text/css" />

	
	
 <script>
	function club_details()
{
  var club_details=/^[a-zA-Z]|[0-9]/;
   if(document.f1.club_details.value.search(club_details)==-1)
    {
	 alert("Please Enter Club's Detalis ");
	 document.f1.club_details.focus();
	 return false;
	 }
	} 
	
	
		function club_name()
{
  var club_name=/^[a-zA-Z]|[0-9]/;
   if(document.f1.club_name.value.search(club_name)==-1)
    {
	 alert("Please Enter Club's Name ");
	 document.f1.club_name.focus();
	 return false;
	 }
	} 
	
	
	
	

	
	function created_by(){
	var created_by=/^[0-9]/
	 if(document.f1.created_by.value.search(created_by)==-1)
    {
	 alert("Wrong entrey Try Again!");
	 document.f1.created_by.focus();
	 return false;
	 }
		}
	
	
	
	
function vali()
{
var club_details=/^[a-zA-Z]|[0-9]/;
var created_by=/^[0-9]/;
var club_name=/^[a-zA-Z]|[0-9]/;
if(document.f1.club_name.value.search(club_name)==-1)
    {
	 alert("Please Enter Club's Name");
	 document.f1.club_name.focus();
	 return false;
	 }
   
	else if(document.f1.created_by.value.search(created_by)==-1)
    {
	 alert("Please Enter a creator of the Club");
	 document.f1.created_by.focus();
	 return false;
	 }
	  
else if(document.f1.club_details.value.search(club_details)==-1)
    {
	 alert("Please Enter Club's Detalis");
	 document.f1.club_details.focus();
	 return false;
	 }
	 
	  
	 
	 else
	 {
	alert("Successfully club added");
	 return true;
	 }
	}
	</script>	
	
</head>
<body>

	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>

	<div id="wrapper">
<?php include('top.php');?>
		<div id="sidebar">
			<div id="sidebar">
		    <?php include ("admin_menu.php")?>		
		    </div> <!-- /sidebar -->
			
		</div> <!-- /sidebar -->

		<div id="content" class="clearfix">

			<div class="header">	
			<h1 class="page-title">CLUBS INFORMATION</h1>	
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Form elements <i class="fa fa-caret-right"></i> Inputs
			</div>

		<div class="wrp clearfix">

			<div class="quick-nav">
					<ul>
						<li ><a href="view_clubs.php" ><i class="fa fa-list"></i> View Clubs</a></li>
						<li class="active"><a href="add_clubs.php"><i class="fa fa-pencil"></i> Add Clubs</a></li>
						<li ><a href="add_borad_members.php"><i class="fa fa-pencil"></i> Add Board Members</a></li>
						<li  ><a href="edit_clubs.php"><i class="fa fa-tags"></i> Edit Clubs</a></li>
						<li ><a href="requests_list.php"><i class="fa fa-archive"></i>Delete Clubs</a></li>
					</ul></div>
                

				<form  method="post" action="insert_clubs.php" name="f1" onSubmit="return vali()" enctype="multipart/form-data">
				<div class="fluid">
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-pencil"></i> Add A Club To The System
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->
					
				    <div class="widget-content pad20f">
					    <input id="articleCategory" type="hidden" value="1" name="articleCategory">
						<input type="text" name="club_name" onChange="return club_name()"  placeholder="Clubs's Name">
						<div class="dropdown">
							<select type="text" name="created_by" onChange="return created_by()" class="dropdown-select">
								<option value="">Created by</option>
								<option value="1">Option #1</option>
							</select>
						 </div>
						<input type="file" id="uploader" name="images[]" multiple="multiple">
                        <label for="uploader">Uploade Club's Logo</label>
						 
						<textarea type="text"  name="club_details" onChange="return club_details()" placeholder="Clubs Details" value=""> </textarea>
							
					<button class="btn btn-blue" name="submit" type="submit">Submit</button>
					</div> <!-- /widget-content -->

				 </div> <!-- /widget -->
			</div></form>
			
			</div> <!-- /wrp -->

		</div> <!-- /content -->
		<footer class="footer">
			2016 © Club Membership System <a href="#"> CMS</a>
		</footer>

	</div> <!-- /wrapper -->


	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/excanvas.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js/jquery.flot.categories.js"></script>
	<script type="text/javascript" src="js/jquery.flot.fillbetween.js"></script>
	<script type="text/javascript" src="js/jquery.flot.stack.js"></script>
	<script type="text/javascript" src="js/jquery.flot.crosshair.js"></script>

	<script type="text/javascript" src="js/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js/jquery.easytabs.min.js"></script>

	<script type="text/javascript">

		$(window).load(function(){
			$('#loading').fadeOut(1000);

		// $(document).ready(function(){

			$('.collapsible > a').click(function(){
				$(this).parent().toggleClass('open');
				if( $(this).parent().siblings().hasClass('open') ){
					$(this).parent().siblings().removeClass('open');
				}
			return false;
			}) // Collapsible


			// -------------------------- SPARKLINE miniCHARTS -----------------------------//

			$("#stats_visits").sparkline('html',{
		        type: 'pie',
		        sliceColors: ['#499ac7','transparent'],
		        offset:-90,
		        tooltipClassname:'tooltip-sp',
		        disableHighlight:true
		    });
		    $("#stats_users").sparkline('html',{
		        type: 'pie',
		        sliceColors: ['#37343b','transparent'],
		        offset:-90,
		        tooltipClassname:'tooltip-sp',
		        disableHighlight:true 
		    });
		    $("#stats_orders").sparkline('html',{
		        type: 'pie',
		        sliceColors: ['#83a854','transparent'],
		        offset:-90,
		        tooltipClassname:'tooltip-sp',
		        disableHighlight:true
		    });


			// eTabs
			$('#eTabs').easytabs();

			// Mobile Nav
			$('.m-nav').click(function(){
				$('.main-nav').toggleClass('open');
			})

			// Quick Nav clicks
			$('.qn-arrow-left').click(function(){
				var sel = $('.quick-nav ul').find('.active');
				if( sel.hasClass('qn-first') ){
					sel.removeClass('active');
					sel.parent().find('.qn-last').addClass('active');
				} else {
					sel.removeClass('active').prev().addClass('active');
				}
			})
			$('.qn-arrow-right').click(function(){
				var sel = $('.quick-nav ul').find('.active');
				if( sel.hasClass('qn-last') ){
					sel.removeClass('active');
					sel.parent().find('.qn-first').addClass('active');
				} else {
					sel.removeClass('active').next().addClass('active');
				}
			})

			

		}) // Ready.
	</script>
</body>
</html>