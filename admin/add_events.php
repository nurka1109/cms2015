<?php
require_once 'databconnect.php';
include '../check_log.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Club Memebership System - Events and News</title>

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
	function news_title()
{
  var news_title=/^[a-zA-Z]|[0-9]/;
   if(document.f1.news_title.value.search(news_title)==-1)
    {
	 alert("enter news title ");
	 document.f1.news_title.focus();
	 return false;
	 }
	} 
	
	
	function news_details(){
	var news_details=/^[a-zA-Z]|[0-9]/;
	 if(document.f1.news_details.value.search(news_details)==-1)
    {
	 alert("Please enter news details");
	 document.f1.news_details.focus();
	 return false;
	 }
		}
	
	
	
	
function vali()
{
var news_details=/^[a-zA-Z]|[0-9]/;
var news_title=/^[a-zA-Z]|[0-9]/;


   if(document.f1.news_details.value.search(news_details)==-1)
    {
	 alert("Please enter news details");
	 document.f1.news_details.focus();
	 return false;
	 }
	 
	else if(document.f1.news_title.value.search(news_title)==-1)
    {
	 alert("Please enter news title");
	 document.f1.news_title.focus();
	 return false;
	 }
	  

	 
	 else
	 {
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
		<?php include ("admin_menu.php")?>		
		</div> <!-- /sidebar -->

		<div id="content" class="clearfix">
		<div class="header">
		<h1 class="page-title">EVENTS AND RECENT NEWS</h1>
		</div> <!-- /header -->

			<div class="breadcrumbs">
			<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Form elements <i class="fa fa-caret-right"></i> Inputs
			</div>

		<div class="wrp clearfix">

				<div class="quick-nav">
					<ul>
						<li ><a href="view_events.php" ><i class="fa fa-globe"></i> Recent Events and News</a></li>
						<li class="active"><a href="add_events.php"><i class="fa fa-list"></i> Add Events</a></li>
						<li  ><a href="edit_events.php"><i class="fa fa-pencil"></i>Edit Events</a></li>
						<li ><a href="delete_events.php"><i class="fa fa-archive"></i> Delete Events</a></li>
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
						
						
					<form method="post" action="insert_news.php" name="f1" onSubmit="return vali()" enctype="multipart/form-data">
					<div class="widget-content pad20f">
					<input type="text" name="news_title" onChange="return news_title()" placeholder="Event's Name">
					
					<input type="file" id="uploader" name="images[]" multiple="multiple" required>
                    <label for="uploader">Event's Poster</label>
					  
				    <input id="articleCategory" type="hidden" value="3" name="articleCategory">
					  
					<textarea type="text" name="news_details" onChange="return news_details()">Event's Details</textarea>
					
					 <label>Event's Start Date</label>
					<input type="date" name="start_date" required></input>
						
                    <label>Event's End Date</label>
					<input type="date" name="end_date" required></input>
					  
					<input type="time" value="00:00:00" placeholder="Event's Time" name="news_time"  required></input>
							
                    <button class="btn btn-blue" name="submit"  type="submit">Submit</button>
						
					</div> <!-- /widget-content -->
					</form>
					
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
 
                     <?php
					 $query = "SELECT * FROM system_gallery sg, gallery_photos gp,latest_news ln WHERE sg.gallery_id=gp.gallery_id and ln.photo_id = gp.id and sg.gallery_id=ln.gallery_id "; 
					 $rs=$db->query($query);
					$rs->data_seek(0);
					while($events= $rs->fetch_assoc()){
					  $news_id =  $events['news_id'];
					  $news_title = $events['news_title'];
					  $news_details =  $events['news_details'];
					  $start_date =  $events['start_date'];
					  $end_date =  $events['end_date'];
					  $news_time =  $events['news_time'];
					 $time_updated = $events["time_updated"];
					  $image_path = $events["image_path"];
					$thumbnails = $events["thumbnails"];
					?>
 
						<div class="comment">
							<div class="img-comment vignette">
                            <img src="<?php echo $image_path;?>">
                            </div>
                            <div class="comment-body">
                             <?php echo $news_title;?>
                             <br>
                            <div class="comment-info">
                                	Date: <span><?php echo $time_updated;?></span> Time: <span><?php echo $news_time;?></span>
									  
                            </div>
                            <div class="comment-controls">
								<p> <?php echo $news_details;?></p>
								<button class="btn btn-mini btn-blue"> Read More</button>
                            </div>
                            </div>
                        </div> <!-- /comment -->
						
                        <hr>
						
						<?php }?>

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