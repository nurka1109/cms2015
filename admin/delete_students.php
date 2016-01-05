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
						<li ><a href="gediz_students.php" ><i class="fa fa-group"></i> Add Students</a></li>
						<li ><a href="school_clubs.php"><i class="fa fa-list"></i> View Clubs</a></li>
						<li ><a href="update_students.php"><i class="fa fa-group"></i> Edit Studenst</a></li>
						<li class="active"><a href="delete_students.php"><i class="fa fa-globe"></i> Delet Students</a></li>
					</ul>
				</div>
                

				
				
				<div class="fluid">
				<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Gediz University Students 
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->

					 <?php
					
					 if (isset($_GET['del'])) {
					 $del = $_GET['del'];
					
					 
					
					//SQL query for UPDATE.
					  $query = "DELETE FROM students WHERE students_id = ".$del;
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
					 $image_path = $admins_scho["image_path"];
					 $thumbnails = $admins_scho["thumbnails"];
						
					echo "<div class=\"comment\">";
					echo "<div class=\"img-comment vignette\">";
					echo "<img src=\"{$admins_scho['image_path']}\">";
					echo "</div>";
					echo "<div class=\"comment-body\">";
					echo "{$admins_scho['students_name']}";
					echo "<div class=\"widget-controls\">"; 
					echo " <a href=\"delete_students.php?s_id={$admins_scho['students_id']}\"><button class=\"btn btn-mini btn-red\">Delete ";
					echo"</button></a>";
					echo "</div>"; 
					echo "<br>";
					echo "<div class=\"comment-info\">";
					echo "Students Number: <span>{$admins_scho['students_number']}</span> </br>Students Department: <span>{$admins_scho['students_department']}</span>";    	
					echo "</div>";	
					echo "</div>";  
					echo "</div> ";
					echo "<hr>";
                        
						
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
								<i class="fa fa-comments"></i> Delete admins
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->
						   <?php  if (isset($_GET['s_id'])) {
							$s_id = $_GET['s_id'];
							$query = "SELECT * FROM gallery_photos gp, students c WHERE c.students_id = gp.id and students_id = {$s_id}";
							$rs=$db->query($query);
							$rs->data_seek(0);
							while($latest_ns= $rs->fetch_assoc()){					
							?>
							
						         <div class="comment">
							   <div class="img-comment vignette">
                               <img src="<?php echo $latest_ns['image_path']; ?>">
                               </div>
                               <div class="comment-body">
                              <?php echo $latest_ns['students_name']; ?>
                              <br>
                                <div class="comment-info">
                              Student Number: <span> <?php echo $latest_ns['students_number']; ?></span> Department: <span><?php echo $latest_ns['students_department']; ?></span>
							  </br>
                              Student Class: <span> <?php echo $latest_ns['students_class']; ?></span> Country: <span><?php echo $latest_ns['students_country']; ?></span>
									  
                            </div>
                            <div class="comment-controls">
								<?php echo "<a href=\"delete_students.php?del=".$latest_ns['students_id']."\"> <button type=\"submit\" name=\"delete\"  class=\"btn btn-mini btn-red\">Delete</button></a>";?>           
					     
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