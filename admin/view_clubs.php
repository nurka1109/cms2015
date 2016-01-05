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
						<li class="active"><a href="view_clubs.php" ><i class="fa fa-list"></i> View Clubs</a></li>
						<li ><a href="add_clubs.php"><i class="fa fa-pencil"></i> Add Clubs</a></li>
						<li ><a href="add_borad_members.php"><i class="fa fa-pencil"></i> Add Board Members</a></li>
						<li ><a href="edit_clubs.php"><i class="fa fa-tags"></i> Edit Clubs</a></li>
						<li  ><a href="delete_clubs.php"><i class="fa fa-archive"></i>Delete Clubs</a></li>
					</ul>
				</div>
                

				<div class="fluid">
				<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Gediz University Social Clubs
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->

						 <?php
						 $query = "SELECT * FROM gallery_photos gp,creat_club c WHERE c.photo_id = gp.id"; 
						 $rs=$db->query($query);
						 $rs->data_seek(0);
						 while($events= $rs->fetch_assoc()){
						 $club_name =  $events['club_name'];
						 $created_by = $events['created_by'];
						 $club_details =  $events['club_details'];
						 $time_updated = $events["time_updated"];
						 $image_path = $events["image_path"];
						 $thumbnails = $events["thumbnails"];
						
						
						
							
						echo"<div class=\"comment\">";
						echo"<div class=\"img-comment vignette\">";
                        echo"<img src=\"{$events['image_path']}\">";
                        echo"</div>";
                        echo"<div class=\"comment-body\">"; 
                        echo"{$events['club_name']}"; 
                        echo"<br>"; 
                        echo"<div class=\"comment-info\">"; 
                        echo"Created By: <span> {$events['created_by']}</span> Date: <span> {$events['time_updated']}</span>";
						echo" </div>";	
                        echo"<div class=\"comment-controls\">"; 
						echo"<p>{$events['club_details']}</p>";	
						echo " <a href=\"view_clubs.php?view={$events['club_id']}\"><button class=\"btn btn-mini btn-green\">Red More ";
					    echo"</button></a>";
                        echo"</div>"; 
                        echo"</div>";
                        echo"</div> "; 
                        echo"<hr>"; 
						
						 }
						 
						 ?>
						
						
						
						
						

                        <div class="pag pag-mini">
                          <ul class="pagination">
                            <li class="disabled"><a href="#" onclick="return false;"><i class="fa fa-caret-left"></i></a></li>
                            <li class="active"><a href="#" onclick="return false;">1</a></li>
                            <li><a href="#" onclick="return false;">2</a></li>
                            <li><a href="#" onclick="return false;">3</a></li>
                            <li><a href="#" onclick="return false;">4</a></li>
                            <li><a href="#" onclick="return false;">5</a></li>
                            <li class="disabled period"><a href="#" onclick="return false;">...</a></li>
                            <li><a href="#" onclick="return false;">25</a></li>
                            <li><a href="#" onclick="return false;"><i class="fa fa-caret-right"></i></a></li>
                          </ul>
                          <button class="btn btn-blue">View All</button>
                        </div>

					</div> <!-- /widget -->
					
					<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> More about the clubs
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->
						   <?php  if (isset($_GET['view'])) {
							$view = $_GET['view'];
							$query = "SELECT * FROM gallery_photos gp,creat_club c WHERE c.photo_id = gp.id and club_id = {$view}";
							$rs=$db->query($query);
							$rs->data_seek(0);
							while($latest_ns= $rs->fetch_assoc()){					
							?>
							
						       <div class="comment">
							   <div class="img-comment vignette">
                               <img src="<?php echo $latest_ns['image_path']; ?>">
                               </div>
                               <div class="comment-body">
                              <?php echo $latest_ns['club_name']; ?>
                              <br>
                                <div class="comment-info">
                               Created by <span> <?php echo $latest_ns['created_by']; ?></span> Date and Time:: <span><?php echo $latest_ns['time_created']; ?></span>
									  
                            </div>
                            <div class="comment-controls">
								<p><?php echo $latest_ns['club_details']; ?></p>
								<?php echo "<a href=\"add_clubs.php?update=".$latest_ns['club_id']."\"> <button type=\"submit\" name=\"creat_club\"  class=\"btn btn-mini btn-red\">Add</button></a>";?> 					     
								<?php echo "<a href=\"edit_clubs.php?update=".$latest_ns['club_id']."\"> <button type=\"submit\" name=\"delete\"  class=\"btn  btn-mini btn-red\">Edit</button></a>";?>								
								<?php echo "<a href=\"delete_clubs.php?del=".$latest_ns['club_id']."\"> <button type=\"submit\" name=\"update\"  class=\"btn btn-mini btn-red\">Delete</button></a>";?> 
					     
                            </div>
                            </div>
                        </div> <!-- /comment -->
						
						
						
						 <?php
					}
				}
             mysqli_close($db);
                   ?>
			</div>
			</div>
			
			
			
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