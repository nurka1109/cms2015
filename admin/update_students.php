<?php
include 'databconnect.php';
include 'check_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Club Memebership System -Events and News</title>

	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

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
			 <h1 class="page-title">EVENTS AND RECENT NEWS</h1>	
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Events and Recent News<i class="fa fa-caret-right"></i> Edit Events
			</div>

		<div class="wrp clearfix">
				  <div class="quick-nav">
					<ul>
						<li ><a href="gediz_students.php" ><i class="fa fa-group"></i> Add Students</a></li>
						<li ><a href="school_clubs.php"><i class="fa fa-list"></i> View Clubs</a></li>
						<li class="active" ><a href="update_students.php"><i class="fa fa-group"></i> Edit Studenst</a></li>
						<li ><a href="delete_students.php"><i class="fa fa-globe"></i> Delet Students</a></li>
					</ul>
				</div>

				<div class="fluid">
				
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-pencil"></i> Edit Admins
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">Administrators</div>
							</div>
						</div> <!-- /widget-header -->
						
						 <?php
$uname=$_SESSION['cms_user_name'];
echo $uname." asfdsf ".$id;

					if (isset($_GET['submit'])) {
					 $students_id =  $_GET['students_id'];
					 $students_name = $_GET['students_name'];
					 $students_department =  $_GET['students_department'];
					 $students_number = $_GET["students_number"];
					 $students_password = $_GET["students_password"];
					 $students_country =  $_GET['students_country'];
					 $students_class = $_GET["students_class"];
					 
					 
					 
					
					//SQL query for UPDATE.
					 $query = "UPDATE `students` SET `students_name` = '{$students_name}',`students_department` = '{$students_department}', `students_number` = '{$students_number}',
					 `students_password` = '{$students_password}',`students_country` = '{$students_country}',`students_class` = '{$students_class}' WHERE students_id = {$students_id}";
					 $db->query($query);
					 }
						
						
				     $query = "SELECT * FROM gallery_photos gp, students c WHERE c.students_id = gp.id limit 5"; 
					 $rs=$db->query($query);
					 $rs->data_seek(0);
					 while($admins_scho= $rs->fetch_assoc()){
					  $students_id =  $admins_scho['students_id'];
					 $students_name = $admins_scho['students_name'];
					 $students_department =  $admins_scho['students_department'];
					 $students_number = $admins_scho["students_number"];
					 $students_password = $admins_scho["students_password"];
					 $students_country =  $admins_scho['students_country'];
					 $students_class = $admins_scho["students_class"];
						
					echo "<div class=\"comment\">";
					echo "<div class=\"img-comment vignette\">";
					echo "<img src=\"{$admins_scho['image_path']}\">";
					echo "</div>";
					echo "<div class=\"comment-body\">";
					echo "{$admins_scho['students_name']}";
					echo "<div class=\"widget-controls\">"; 
					echo " <a href=\"update_students.php?update={$admins_scho['students_id']}\"><button class=\"btn btn-mini btn-blue\">Edit ";
					echo"</button></a>";
					echo "</div>"; 
					echo "<br>";
					echo "<div class=\"comment-info\">";
					echo "Student's Name: <span>{$admins_scho['students_number']}</span> </br>Student's Department: <span>{$admins_scho['students_department']}</span>";
					echo "<p>Student's Class: <span>{$admins_scho['students_class']}</span> </br>Student's Country: <span>{$admins_scho['students_country']}</span> </p>";
					echo "</div>";	
					echo "</div>";  
					echo "</div> ";
					echo "<hr>";
                        
						
						}
					
					?>
					
					
					
					

				</div> <!-- /widget -->
				
				<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Edit Recent Added Events
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->

					<?php  if (isset($_GET['update'])) {
						$update = $_GET['update'];
						$query1 = "SELECT * FROM gallery_photos gp, students c WHERE c.students_id = gp.id and students_id={$update}";
						$rs=$db->query($query1);
						$rs->data_seek(0);
						while($eventupdates= $rs->fetch_assoc()){ 
						echo "<form  method=\"get\">";
						echo "<div class=\"widget-content pad20f\">"; 
						echo "<div class=\"img-comment vignette\">";
					    echo "<img src=\"{$eventupdates['thumbnails']}\">";
					    echo "</div>";
						echo "<input id=\"admin_id\" type=\"hidden\" name=\"students_id\" value=\"{$eventupdates['students_id']}\">";
						echo "<input type=\"text\" name=\"students_name\" value=\"{$eventupdates['students_name']}\">";
						echo "<input type=\"text\" name=\"students_department\" value=\"{$eventupdates['students_department']}\">";
						echo "<input type=\"text\" name=\"students_number\" value=\"{$eventupdates['students_number']}\">";
						echo "<input type=\"password\" name=\"students_password\" value=\"{$eventupdates['students_password']}\">";
						echo "<input type=\"text\" name=\"students_country\" value=\"{$eventupdates['students_country']}\">";
						echo "<input type=\"text\" name=\"students_class\" value=\"{$eventupdates['students_class']}\">";
						echo "<button class=\"btn btn-blue\" name=\"submit\" type=\"submit\" value=\"update\">Submit";
						echo"</button>";
						echo"</div>";
						echo "</form>";
						
						 } 
						}
						?>

					</div> <!-- /widget -->
					 <?php
             mysqli_close($db);
                   ?>
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