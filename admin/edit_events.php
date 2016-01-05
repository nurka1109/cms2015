<?php
include 'databconnect.php';
include '../check_log.php';
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
			 <h1 class="page-title">EVENTS AND RECENT NEWS</h1>	
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Events and Recent News<i class="fa fa-caret-right"></i> Edit Events
			</div>

		<div class="wrp clearfix">

				
				<div class="quick-nav">
					<ul>
						<li ><a href="view_events.php" ><i class="fa fa-globe"></i> Recent Events and News</a></li>
						<li ><a href="add_events.php"><i class="fa fa-list"></i> Add Events</a></li>
						<li class="active" ><a href="edit_events.php"><i class="fa fa-pencil"></i>Edit Events</a></li>
						<li ><a href="delete_events.php"><i class="fa fa-archive"></i> Delete Events</a></li>
					</ul>
				</div>

				<div class="fluid">
				
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-pencil"></i> Edit Events
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">Events</div>
							</div>
						</div> <!-- /widget-header -->
						
						 <?php
					if (isset($_GET['submit'])) {
					$news_id = $_GET['news_id'];
					$news_title = $_GET['news_title'];
					$news_details = $_GET['news_details'];
					$start_date = $_GET['start_date'];
					$end_date = $_GET['end_date'];
					
					//SQL query for UPDATE.
					 $query = "UPDATE `latest_news` SET `news_title` = '{$news_title}',`news_details` = '{$news_details}', `start_date` = '{$start_date}', 
					 `end_date` = '{$end_date}' WHERE `latest_news`.`news_id` = {$news_id}";
					 $db->query($query);
					 }
						
						
				     $query = "SELECT * FROM system_gallery sg, gallery_photos gp,latest_news c WHERE sg.gallery_id=gp.gallery_id and c.photo_id = gp.id and sg.gallery_id=c.gallery_id "; 
					 $rs=$db->query($query);
					 $rs->data_seek(0);
					 while($latest_events= $rs->fetch_assoc()){
					 $news_id = $latest_events['news_id'];
					 $news_title =  $latest_events['news_title'];
					 $news_details = $latest_events['news_details'];
					 $start_date = $latest_events["start_date"];
					 $end_date = $latest_events["end_date"];
						
					echo "<div class=\"comment\">";
					echo "<div class=\"img-comment vignette\">";
					echo "<img src=\"{$latest_events['image_path']}\">";
					echo "</div>";
					echo "<div class=\"comment-body\">";
					echo "{$latest_events['news_title']}"; 
					echo "<br>";
					echo "<div class=\"comment-info\">";
					echo "Start Date: <span>{$latest_events['start_date']}</span> End Date: <span>{$latest_events['end_date']}</span>";    	
					echo "</div>";		
					echo "<div class=\"comment-controls\">";
					echo "<p> {$latest_events['news_details']}</p>";	
					echo " <a href=\"edit_events.php?update={$latest_events['news_id']}\"><button class=\"btn btn-mini btn-blue\">Edit ";
					echo"</button></a>";
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
						$query1 = "SELECT * FROM  latest_news where news_id={$update}";
						$rs=$db->query($query1);
						$rs->data_seek(0);
						while($eventupdates= $rs->fetch_assoc()){	
						echo "<form  method=\"get\">";
						echo "<div class=\"widget-content pad20f\">"; 
						echo "<input id=\"news_id\" type=\"hidden\" name=\"news_id\" value=\"{$eventupdates['news_id']}\">";
						echo "<input type=\"text\" name=\"news_title\" value=\"{$eventupdates['news_title']}\">";
						echo "<input type=\"text\" name=\"start_date\" value=\"{$eventupdates['start_date']}\">";
						echo "<input type=\"text\" name=\"end_date\" value=\"{$eventupdates['end_date']}\">";
						echo "<textarea type=\"text\" name=\"news_details\">{$eventupdates['news_details']}";
						echo "</textarea>";
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