<?php		
require_once 'databconnect.php';
include 'check_log.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Club Memebership System</title>

	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="css/toastr.css">

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
				
				<h1 class="page-title">Dashboard</h1>
				

			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-home"></i> Home <i class="fa fa-caret-right"></i> Dashboard
			</div>

			<div class="wrp clearfix">
			
	           <div class="quick-nav">
					<ul>
						<li class="active"><a href="club_list.php" ><i class="fa fa-list"></i> View Clubs</a></li>
						<li ><a href="presidents_list.php" "><i class="fa fa-group"></i> View Presidents</a></li>
						<li ><a href="event_list.php"><i class="fa fa-globe"></i> View Events</a></li>
						<li >
							<a href="requests_list.php"><i class="fa fa-group"></i> Membership Requests</a>
							<span class="badge qnav-badge blue">16</span>
						</li>
					</ul>
				</div>


				

				<div class="fluid">
					<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Recent News and Events
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
						
                        <hr><?php }?>

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
								<i class="fa fa-pencil"></i> Membership Requests
							</div>
							<div class="widget-controls">
								<input type="checkbox" id="switch-form" />
	  							<label class="switch" for="switch-form"><i></i></label>
							</div>
						</div> <!-- /widget-header -->
						<?php
if (isset($_GET['accept_m'])){
	$acc=$_GET['accept_m']; $cl_id=$_GET['cl_id_m'];
	$req_reg=mysql_query("UPDATE club_members SET approved='1' WHERE club_id='". $cl_id ."' and student_id='". $acc ."'");
	if ($req_reg){
		 echo '<script type="text/javascript">alert(" The user was accepted ");</script>';	 
	}
	else{
		echo '<script type="text/javascript">alert("Something went wrong please retry");</script>';
	}
	header("Location: index.php");
	exit();
}
elseif(isset($_GET['ignore_m'])){
	$acc=$_GET['ignore_m']; $cl_id=$_GET['cl_id_m'];
	$req_reg=mysql_query("DELETE from club_members WHERE club_id='". $cl_id ."' and student_id='". $acc ."'");
	if ($req_reg){
		 echo '<script type="text/javascript">alert(" The user request rejected ");</script>';	 
	}
	else{
		echo '<script type="text/javascript">alert("Something went wrong please retry");</script>';
	}
	header("Location: index.php");
	exit();
}
$query1 = "SELECT s.students_name as s_name,s.students_number,c.club_id as cl_id,c.student_id,DATE_FORMAT(c.created_on, '%d-%m-%Y %H:%i:%s') as created_dt,clubs.name as c_name, gp.image_path FROM club_members c,students s,clubs,gallery_photos gp WHERE c.approved=0 and c.student_id=s.students_number and c.club_id=clubs.id and s.photo_id=gp.id"; 
					$rs1=$db->query($query1);
					$rs1->data_seek(0);
					if($rs1){
					while($dn= $rs1->fetch_assoc()){
					  $st_id=$dn['students_number'];
					  $cl_id=$dn['cl_id'];
					  $cr_dt=$dn['created_dt'];
					  $st_name = $dn['s_name'];	
					  $c_name = $dn['c_name'];
					  $created_on = substr($cr_dt,0,-8);
					  $created_at = substr($cr_dt,-8,11);
					  $i_path=$dn['image_path'];
?>
						<div class="comment">
							<div class="img-comment vignette">
                            	<img src="<?php echo $i_path; ?>">
                            </div>
                            <div class="comment-body"> <?php echo $st_name?> </span>
                                <br>
                                <div class="comment-info">
                                	Membership Request sent on  <span><?php echo $created_on;?></span> at  <span><?php echo $created_at;?> </span> for <?php echo $c_name;?>
                                </div>
							<form method="post" >
                                <div class="comment-controls">
								<style>
								a.btn_btn:link {text-decoration: none;}
								a.btn_btn:visited {text-decoration: none;}
								a.btn_btn:hover {text-decoration: none;}
								</style>
<?php 
echo"<a href=\"index.php?accept_m={$st_id}&cl_id_m={$cl_id}\" class=\"btn_btn btn-mini btn-blue\" role=\"button\">Accept</a>";
echo"<a href=\"index.php?ignore_m={$st_id}&cl_id_m={$cl_id}\" class=\"btn_btn btn-mini btn-blue\" role=\"button\">Delete</a>";
?>
								</div>
							</form>
                            </div>
                        </div> <!-- /comment --><hr>
<?php 
					}}
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

				</div> <!-- /fluid -->

				

			</div> <!-- /wrp -->

		</div> <!-- /content -->
		<footer class="footer">
			2013 © Liberator Admin v1.0. Powered by <a href="http://www.pixeden.com/">pixeden</a>
		</footer>

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