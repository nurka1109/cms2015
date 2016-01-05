<?php
require_once 'databconnect.php';
include '../check_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Club Membership System - Presidents</title>

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
		<?php include ("admin_menu.php")?>		
		</div> <!-- /sidebar -->

		<div id="content" class="clearfix">
		<div class="header">
		<h1 class="page-title">President's Information</h1>
		</div> <!-- /header -->

			

			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Clubs <i class="fa fa-caret-right"></i> board members
			</div>

		    <div class="wrp clearfix">
               <div class="quick-nav">
					<ul>
						<li ><a href="gediz_students.php" ><i class="fa fa-group"></i> Add Students</a></li>
						<li ><a href="school_clubs.php"><i class="fa fa-list"></i> View Clubs</a></li>
						<li ><a href="club_presidents.php"><i class="fa fa-group"></i> View Club Presidents</a></li>
						<li class="active"><a href="board_members.php"><i class="fa fa-group"></i> Club Board Members</a></li>
						<li ><a href="events_news.php"><i class="fa fa-globe"></i> Events and News</a></li>
					</ul>
				</div>


				<div class="fluid">
				
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
							<i class="fa fa-pencil"></i> Add A Club Presidents
							</div>
							<div class="widget-controls">
							<div class="badge msg-badge">Presidents</div>
							</div>
					</div> <!-- /widget-header -->
					<form method="post" action="insert_students.php"  enctype="multipart/form-data">
					<div class="widget-content pad20f">
					
					 <input type="text" name="students_name" placeholder="student's Name">
						
					 <input type="file"  id="uploader" name="images[]" multiple="multiple">
					 <label for="uploader">Student's Photo</label>
						
					   
					   <div class="dropdown">
							<select name="students_department" class="dropdown-select">
								<option value="">Departments</option>
								<option value="comp">Option #1</option>
							</select>
						</div><br> 
						<input id="articleCategory" type="hidden" value="2" name="articleCategory">
						
					<input type="text" name="students_number" placeholder="Student's Number">
					
					<input type="text" name="students_country" placeholder="Student's Country">
					
					<div  class="dropdown">
					<select name="students_class" class="dropdown-select">
						<option value="">Academic Year</option>
						<option value="1">First Year</option>
						<option value="2">Second Year</option>
						<option value="3">Third Year</option>
						<option value="4">Fourth Year</option>
						<option value="5">Fifth Year</option>
					</select>
					</div><br> 
					<button class="btn btn-blue" name="submit" type="submit">Submit</button>
						
					</div> <!-- /widget-content -->
                     </form> 
			 </div> <!-- /widget -->
			</div>
			</div> <!-- /wrp -->

		</div> <!-- /content -->
		<footer class="footer">
			2016 © Club Membership System<a href="#">CMS</a>
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