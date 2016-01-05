<?php
include '../check_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Club Memebership System -Presidents</title>

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
			 <h1 class="page-title">CLUB'S PRESIDENTS</h1>	
			</div> <!-- /header -->

			<div class="breadcrumbs">
			<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Form elements <i class="fa fa-caret-right"></i> Inputs
			</div>

		     <div class="wrp clearfix">
		   
				<!-- DropDown Responsive -->
				<select id="qn">
					<option>Add an Article</option>
					<option>Save File</option>
					<option>Add More</option>
					<option>Messages</option>
					<option selected>Check Statistics</option>
				</select>
				<!-- /DropDown Responsive -->
				
				<div class="quick-nav">
					<ul>
						<li class="qn-first"><a href="#" onclick="return false;"><i class="fa fa-edit"></i> Add an Article</a></li>
						<li><a href="#" onclick="return false;"><i class="fa fa-save"></i> Save File</a></li>
						<li><a href="#" onclick="return false;"><i class="fa fa-plus"></i> Add More</a></li>
						<li>
							<a href="#" onclick="return false;"><i class="fa fa-envelope"></i> Messages</a>
							<span class="badge qnav-badge blue">16</span>
						</li>
						<li class="qn-last active"><a href="#" onclick="return false;"><i class="fa fa-bar-chart-o"></i> Check Statistics</a></li>
						<li><a class="qn-arrow-left" href="#" onclick="return false;"><i class="fa fa-chevron-left"></i></a></li>
						<li><a class="qn-arrow-right" href="#" onclick="return false;"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>


				<div class="fluid">
				
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-pencil"></i> Add An Event
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">Events</div>
							</div>
						</div> <!-- /widget-header -->
						
						
					
					<div class="widget-content pad20f">

						<input type="text" placeholder="Event's Name">
						  <textarea>Event's Details</textarea>
						  <input type="file" name="uploader" id="uploader">
                            <label for="uploader">Event's Poster</label>
					  <label>Event's Start Time</label>
						<input type="date" ></input>
                      <label>Event's End Time</label>
					  <input type="date" ></input>
					  <input type="time" placeholder="Event's Time" >
							
                    <button class="btn btn-blue" type="submit">Submit</button>
						
					</div> <!-- /widget-content -->
					
					

				</div> <!-- /widget -->
				
				<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Recent Added Events
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->

						<div class="comment">
							<div class="img-comment vignette">
                            	<img src="images/comment-1.jpg">
                            </div>
                            <div class="comment-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                                <br>
                                <div class="comment-info">
                                	User: <span>Kyle</span> on IP: <span>172.10.56.3</span>
                                </div>
                                <div class="comment-controls">
                                    <button class="btn btn-mini btn-blue">Edit</button>
                                    <button class="btn btn-mini btn-green">Approve</button>
                                    <button class="btn btn-mini btn-black">Delete</button>
                                </div>
                            </div>
                        </div> <!-- /comment -->

                        <hr>

                        <div class="comment">
							<div class="img-comment vignette">
                            	<img src="images/comment-2.jpg">
                            </div>
                            <div class="comment-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                                <br>
                                <div class="comment-info">
                                	User: <span>John</span> on IP: <span>172.10.56.3</span>
                                </div>
                                <div class="comment-controls">
                                    <button class="btn btn-mini btn-blue">Edit</button>
                                    <button class="btn btn-mini btn-green">Approve</button>
                                    <button class="btn btn-mini btn-black">Delete</button>
                                </div>
                            </div>
                        </div> <!-- /comment -->

                        <hr>

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