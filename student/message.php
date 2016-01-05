<?php
include('../config.php');
$id=$_SESSION['cms_username'];
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
		<div id="top">
			
			<div class="main-logo">
				<a href="#" onclick="return false;"><img src="images/logo.png"></a>
			</div>
			
			<div class="m-nav"><i class="fa fa-bars"></i></div>

			<div class="profile-nav">
				<ul>
					<li class="profile-user-info">
						<a href="#" onclick="return false;">
							<img src="images/user.jpg" class="user-img">
							<b>Welcome, </b><span>Member</span> <i class="fa fa-user"></i> <i class="fa fa-caret-down"></i>
						</a>
					</li>
					<li>
						<a href="#" onclick="return false;" class="profile-badge-info">
							<i class="fa fa-envelope"></i> Messages
						</a>
						<span class="badge profile-badge blue">16</span>
					</li>
					<li>
						<a href="login.html">
							<i class="fa fa-times-circle"></i> Logout
						</a>
					</li>
				</ul>
			</div>

		</div> <!-- /top -->

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
	
				<div class="quick-nav">
					<ul>
						<li class="qn-first active"><a href="club_president.html"><i class="fa fa-edit"></i> Home</a></li>
						<li><a href="members.html"><i class="fa fa-list-alt"></i> Members' List</a></li>
						<li><a href="list.html"><i class="fa fa-list-alt"></i> View Lists</a></li>
						<li class="qn-last">
							<a href="#" onclick="return false;"><i class="fa fa-envelope"></i> Messages</a>
							<span class="badge qnav-badge blue">16</span>
						</li>
					</ul>
				</div>

				<div class="fluid">
					<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Inbox Messages
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->

						<div class="comment">
                            <div class="comment-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                                <br>
                                <div class="comment-info">
                                	From: <span>Kyle</span> on: <span>11/09/2015</span>at: <span>16:30</span>
                                </div>
                                <div class="comment-controls">
                                    <button class="btn btn-mini btn-green">Reply</button>
                                    <button class="btn btn-mini btn-blue">Forward</button>
                                    <button class="btn btn-mini btn-red">Delete</button>
                                </div>
                            </div>
                        </div> <!-- /comment -->

                        <hr>

                        <div class="comment">
                            <div class="comment-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...
                                <br>
                                <div class="comment-info">
                                	From: <span>Brad</span> on: <span>11/09/2015</span>at: <span>16:56</span>
                                </div>
                                <div class="comment-controls">
                                    <button class="btn btn-mini btn-green">Reply</button>
                                    <button class="btn btn-mini btn-blue">Forward</button>
                                    <button class="btn btn-mini btn-red">Delete</button>
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

					<div class="widget grid6">
						<div class="widget-header">
							<div class="widget-title">
							<i class="fa fa-envelope"></i>New Message
						<span class="badge profile-badge">+</span>
							</div>
						</div> <!-- /widget-header -->
						
						<div class="widget-content clearauto">
						
							<form method="post" >
						<label for="type">Type</label>
						<div class="dropdown">
								<select name="msg_type" class="dropdown-select" onchange="change_msg_type(this)">
									<option value="0">Choose the message type</option>
									<option value="1">Private Message to Member/Members</option>
									<option value="2">Announcement</option>
								</select>
						</div>

							<div class="dropdown" id="sel_members_d"style="display:none;">
							<select name="sel_members" id="sel_members" class="dropdown-select" >
								<option value="0">Choose Club Member</option>
<?php
$req2 = mysql_query("SELECT name,surname FROM students s,club_members m where m.club_id='". $_SESSION['cl_id'] ."' and s.student_id=m.student_id");
//$id=0;
while ($dn2 = mysql_fetch_array($req2)){
	$i=$dn2['id'];
	echo '<option value=' . $i . '>' . $dn2['id']," ",$dn2['name']," ",$dn2['surname'] . '</option>';
	$club_info[$i]=$dn2['information'];

 }
 ?>
								</select>
								</div>

							<div id="reg" style="display:none;">
							<input type="text" name="o_sel_txt" value="" id="o_sel_txt" style="display:none;"/>
							<textarea id="text_area" style="height: 150px;border: 0;" name="ta_reg"></textarea>
                            <input class="btn btn-blue" type="submit" value="Register/Send Request" name="reg_btn" />
							</div>
							</form>
						<script>
						function 	change_msg_type(obj){
							var selectBox = parseInt(obj.value);
							if(selectBox=="1"){
								document.getElementById("sel_members_d").style.display = "block";
								document.getElementById("sel_announcement").style.display = "none";
								document.getElementById("to_admin").style.display = "none";
							}
							else if(selectBox=="2"){
								document.getElementById("sel_members_d").style.display = "none";
								document.getElementById("sel_announcement").style.display = "block";
								document.getElementById("to_admin").style.display = "none";
							}
							else if(selectBox=="3"){
								document.getElementById("to_admin").style.display = "block";
							}
						}
						function change(obj) {
							var selectBox = obj;
							var selected = parseInt(selectBox.value);
							//alert(selected);
							var elem = document.getElementById("o_sel_txt");
							elem.value =selectBox.value;
							var club_info_array = <?php echo json_encode($club_info); ?>;
							//alert(club_info_array[selected]);
							var regi=document.getElementById("reg");
							var textarea = document.getElementById("text_area");
							if(selected > 0){
								regi.style.display = "block";
								textarea.value = club_info_array[selected];
							}
							else{
									textarea.style.display = "none";
							}
						}
						</script>
							<?php
							if (isset($_REQUEST['reg_btn']))
							{
								$state = $_POST['one'];
								$req_reg=mysql_query("insert into club_members (club_id,student_id) values ('$state','$id')");
							if (!$req_reg){
								 echo '<script type="text/javascript">alert("Your Registration Failed");</script>';
							}
							else 
								 echo '<script type="text/javascript">alert("Your Membership Request sent Successfully");</script>';
							}
							?>
							<label for="receiver">Receiver</label>
							<input type="text" name="receiver" id="receiver" placeholder="Receiver">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" placeholder="Title">
							<label for="receiver">Message Text Area</label>
                            <textarea name="massage_txt" id="massage_txt" style="height:100px;"></textarea>
                            <button class="btn btn-blue" type="submit">Send</button>
						</div>

					</div> <!-- /widget -->

				</div> <!-- /fluid -->

				

			</div> <!-- /wrp -->

		</div> <!-- /content -->
		<footer class="footer">
			2013 © Liberator Admin v1.0. Powered by <a href="http://www.pixeden.com/">pixeden</a>
		</footer>

	</div> <!-- /wrapper -->
<!--

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
	</script>-->
</body>
</html>