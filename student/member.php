<?php
include('../config.php');
include('student_check_log.php');
include('set_vars.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Member</title>

	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

	<!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="css/toastr.css">

	<link href="css/style.css" rel="stylesheet" type="text/css" />

	
</head>
<body>
<div id="wrapper">
<?php include('top.php');?>

		<div id="sidebar">
			<ul class="main-nav">
				<li class="active">
					<a href="index.html" onclick="return true;"><i class="fa fa-users"></i> CMS</a>
				</li>				
			</ul>
		</div> <!-- /sidebar -->

		<div id="content" class="clearfix">

			<div class="header">
				
				<h1 class="page-title">Member</h1>
				
			</div> <!-- /header -->

			<div class="wrp clearfix">	
				<?php 
				$current_user_type="member"; 
				$active_h="active";
				$active_r="";
				$active_m="";
				include('quick_nav.php');?>
				<div class="fluid">
				
					<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Recent News
							</div>
						</div> <!-- /widget-header -->
<?php
$club_name="";
$rm_c = mysql_query("SELECT Count(id) as cl_num FROM club_members where student_id='". $id ."'");
if($rm_c){ $cl_number= mysql_fetch_array($rm_c)['cl_num'];
echo "You are having membership of $cl_number clubs<hr>";
$rm_c = mysql_query("SELECT club_id,name FROM club_members,clubs where student_id='". $id ."' and clubs.id=club_members.club_id");
if($rm_c) 
{
while ($dn2 = mysql_fetch_array($rm_c)){	
    $cl_id=$dn2['club_id'];
	$club_name = $dn2['name'];
$rm_anp = mysql_query("SELECT name,news_id,news_title,DATE_FORMAT(an.time_created, '%d-%m-%Y %H:%i:%s') as created_dt,news_details,image_path FROM clubs,latest_news an,gallery_photos gp where clubs.id='". $cl_id."' and clubs.id=club_id and an.photo_id = gp.id");

if ($rm_anp){
	while ($dnp3 = mysql_fetch_array($rm_anp)){
	
					  $club_name = $dnp3['name'];
					  $an_id=$dnp3['news_id'];
					  $title =  $dnp3['news_title'];					  
					  $text =  $dnp3['news_details']; 
					  $created_on = substr($dnp3['created_dt'],0,-8);
					  $created_at = substr($dnp3['created_dt'],-8,11);
					  $im_p=$dnp3['image_path'];
?>
						<div class="comment">
							<div class="img-comment vignette">
                            	<img src="<?php echo '../'.$im_p;?>">
                            </div>
                            <div class="comment-body"> <?php echo $title;?></span>
                                <br>
                                <div class="comment-info">
                                	From: <span><?php echo $club_name;?></span> on  <span><?php echo $created_on;?></span> at  <span><?php echo $created_at;?></span>
                                </div>
                                <div class="comment-controls">
								<p> <?php echo $text;
echo"</p><a href=\"member.php?view={$an_id}\" class=\"btn_btn btn-mini btn-blue\" id=\"rm_btn\" role=\"button\">Read More</a>";
								?>
								</div>
                            </div>
                        </div> <!-- /comment --><hr>
<?php }}else{ ?>
							<div class="comment">
							<div class="img-comment vignette">
                            	<img src="">
                            </div>
                            <div class="comment-info">
							From: <span><?php echo $club_name;?></span> <br> No News
							</div>
							<hr>
							</div>
<?php	}}}}
else{
	echo 'You are not member of any club, but you may become of one <a href="member_registration.php"> JUST CLICK HERE</a>';
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
					
<div class="widget grid6" id="m_a_e" style="float:right;"><!--style="display:none;">-->
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> More about the Events
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">Evenst</div>
							</div>
						</div> <!-- /widget-header -->
						   <?php 
							if (isset($_GET['view'])) {
							$view = $_GET['view'];
								$query = mysql_query("SELECT * FROM gallery_photos gp,latest_news ln WHERE ln.photo_id = gp.id and news_id = {$view}");
							while($latest_ns= mysql_fetch_array($query)){						
							?>
							
						       <div class="comment">
							   <div class="img-comment vignette">
                               <img src="<?php echo '../'.$latest_ns['image_path']; ?>">
                               </div>
                               <div class="comment-body">
                              <?php echo $latest_ns['news_title']; ?>
                              <br>
                                <div class="comment-info">
                               Start Date <span> <?php echo $latest_ns['start_date']; ?></span> End Date <span> <?php echo $latest_ns['end_date']; ?></span> Posted Date and Time:: <span><?php echo $latest_ns['time_updated']; ?></span>
                            </div>
                            <div class="comment-controls">
								<p><?php echo $text;?></p>
								<?php
								if(isset($_SESSION['cl_id'])){echo $latest_ns['news_details']; 
								 echo "<a href=\"add_events.php?update=".$latest_ns['news_id']."\"> <button type=\"submit\" name=\"creat_club\"  class=\"btn btn-mini btn-red\">Add</button></a>";?> 					     
								<?php echo "<a href=\"edit_events.php?update=".$latest_ns['news_id']."\"> <button type=\"submit\" name=\"delete\"  class=\"btn  btn-mini btn-red\">Edit</button></a>";?>								
								<?php echo "<a href=\"delete_events.php?del=".$latest_ns['news_id']."\"> <button type=\"submit\" name=\"update\"  class=\"btn btn-mini btn-red\">Delete</button></a>";}?> 
					     
                            </div>
                            </div>
                        </div> <!-- /comment -->
						
						
						
						 <?php
					}
				}
                   ?>
			</div>
			
				</div> <!-- /fluid -->

				

			</div> <!-- /wrp -->

		</div> <!-- /content -->
	</div> <!-- /wrapper -->


	<script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/excanvas.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
	<script type="text/javascript" src="js/toastr.min.js"></script>

	<script type="text/javascript">

		$(window).load(function(){
			$('#loading').fadeOut(1000);

			toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "positionClass": "toast-bottom-right",
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
			setTimeout(function(){
				toastr.info('<span style="color:#333;">Welcome to Liberator! The new clean Admin Template.</span>');	
			},2000) ;
			
			setTimeout(function(){
				toastr.warning('<span style="color:#333;">You could navigate the different sections to discover it...</span>');	
			},4500) ;

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

		    
		    // -------------------------- FLOT CHARTS -----------------------------//

		    var sin = [], cos = [];
		    for (var i = 0; i < 20; i += 0.5) {
		        sin.push([i, Math.sin(i-1.5)]);
		        cos.push([i, Math.cos(i+1.6)]);
		    }

		    var sin2 = [], cos2 = [];
		    for (var i = 0; i < 40; i += 0.7) {
		        sin2.push([i, Math.sin(i-0.23) - 0.1]);
		        cos2.push([i, Math.cos(i+0.80)]);
		    }

		    var sin3 = [], cos3 = [];
		    for (var i = 0; i < 74; i += 0.7) {
		        sin3.push([i, Math.sin(i-0.23) - 0.1]);
		        cos3.push([i, Math.cos(i+0.80)]);
		    }

		    // Chart Month
		    var plot = $.plot($("#chart-month"),
		           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
		               series: {
		                   lines: { show: true },
		                   points: { show: true }
		               },
		               grid: { hoverable: true, clickable: true },
		               yaxis: { min: -1.1, max: 1.1 },
		               xaxis: { min: 0, max: 14 },
		               legend: {
		                    show: true,
		                    // margin: number of pixels or [x margin, y margin]
		                    //container: '.cLegend'
		                    // sorted: null/false, true, "ascending", "descending", "reverse", or a comparator
		                },
		                colors: [ '#52aed3', '#83a854' ]
		             });

		    // Chart Week
		     var plot = $.plot($("#chart-week"),
		           [ { data: sin2, label: "sin(x)"}, { data: cos2, label: "cos(x)" } ], {
		               series: {
		                   lines: { show: true },
		                   points: { show: true }
		               },
		               grid: { hoverable: true, clickable: true },
		               yaxis: { min: -1.1, max: 1.1 },
		               xaxis: { min: 0, max: 14 },
		               legend: {
		                    show: true,
		                    // margin: number of pixels or [x margin, y margin]
		                    //container: '.cLegend'
		                    // sorted: null/false, true, "ascending", "descending", "reverse", or a comparator
		                },
		                colors: [ '#52aed3', '#83a854' ]
		             });

		     // Chart Day
		     var plot = $.plot($("#chart-day"),
		           [ { data: sin3, label: "sin(x)"}, { data: cos3, label: "cos(x)" } ], {
		               series: {
		                   lines: { show: true },
		                   points: { show: true }
		               },
		               grid: { hoverable: true, clickable: true },
		               yaxis: { min: -1.1, max: 1.1 },
		               xaxis: { min: 0, max: 74 },
		               legend: {
		                    show: true,
		                    // margin: number of pixels or [x margin, y margin]
		                    //container: '.cLegend'
		                    // sorted: null/false, true, "ascending", "descending", "reverse", or a comparator
		                },
		                colors: [ '#52aed3', '#83a854' ]
		             });


		    function showTooltip(x, y, contents) {
		        $('<div id="chart-tooltip" class="chart-tooltip">' + contents + '</div>').css( {
		            position: 'absolute',
		            display: 'none',
		            top: y + 5,
		            left: x + 5,
		            'z-index': '9999',
		            'color': '#fff',
		            'font-size': '11px',
		            opacity: 0.8
		        }).appendTo("body").fadeIn(200);
		    }

		    var previousPoint = null;
		    $(".chart").bind("plothover", function (event, pos, item) {
		        $("#x").text(pos.x.toFixed(2));
		        $("#y").text(pos.y.toFixed(2));

		        if ($(".chart").length > 0) {
		            if (item) {
		                if (previousPoint != item.dataIndex) {
		                    previousPoint = item.dataIndex;
		                    
		                    $("#chart-tooltip").remove();
		                    var x = item.datapoint[0].toFixed(2),
		                        y = item.datapoint[1].toFixed(2);
		                    
		                    showTooltip(item.pageX, item.pageY,
		                                item.series.label + " of " + x + " = " + y);
		                }
		            }
		            else {
		                $("#chart-tooltip").remove();
		                previousPoint = null;            
		            }
		        }
		    });

		    $(".chart").bind("plotclick", function (event, pos, item) {
		        if (item) {
		            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
		            plot.highlight(item.series, item.datapoint);
		        }
		    });


		    // -------------------------- jQueryUI SLIDERS -----------------------------//

		    $('.slider').slider();

		    $('.slider.range-min').slider({
				range: "min",
				slide: function( event, ui ) {
			        $('.slider.range-min > a.ui-slider-handle').html("<div class='range-tooltip'>$ " + ui.value + "</div>")
			      },
			    stop: function( event, ui ) {
			    	$('.range-tooltip').delay(1000).fadeOut();
			    }
			});

			$('.slider.range-min').on( "slide", function( event, ui ) {
				if($(this).slider('value') > 5){
					$('.slider.range-min > a.ui-slider-handle').addClass('color');
				} else {
					$('.slider.range-min > a.ui-slider-handle').removeClass('color');
				}
			} );

			$('.slider.range').slider({
				range: true,
			    max: 750,
			    values: [ 75, 300 ],
			    slide: function( event, ui ) {
			    	var handleIndex = $(ui.handle).index(); // left:0 - right:2
			    	if( handleIndex == 0 ){
			    		$(ui.handle).html("<div class='range-tooltip'>$ " + ui.values[0] + "</div>");
			    	} else if( handleIndex == 2 ){
			    		$(ui.handle).html("<div class='range-tooltip'>$ " + ui.values[1] + "</div>");
			    	}
			      },
			    stop: function( event, ui ) {
			    	$('.range-tooltip').delay(1000).fadeOut();
			    }
			});

			// Iteration to set the default value of Vertical Sliders

			$('.slider.vertical').each(function(){
				$(this).slider({
				orientation: "vertical",
			      range: "min",
			      min: 0,
			      max: 100,
			      value: $(this).attr('data-vY')
				})	
			})
			
			$('.progressbar').each(function(){
				var v = parseInt($(this).attr('value'));
				$(this).progressbar({
			      value: v
			    })
			})

			$('.progressbar > .ui-progressbar-value').hover(function(){
				$(this).html("<div class='progress-tooltip'>" + $(this).parent().progressbar('value') + " %</div>");
				$('.progress-tooltip').delay(2000).fadeOut()
			})

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