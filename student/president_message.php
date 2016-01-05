<?php
include('../config.php');
include('ClubPresident_check_log.php');
//Update messages as seen (messages table checked column to 1) but not as read yet
if($req2 = mysql_query("update messages set checked=1 where user2='".$id."' and checked=0")){
include('set_vars.php');}
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
				
				<h1 class="page-title">Club President</h1>
				
			</div> <!-- /header -->

			<div class="wrp clearfix">	
			<?php $current_user_type="club_president";
			$active_h="";
			$active_s="";
			$active_v="";
			$active_m="active";
			include('quick_nav.php');?>
				<div class="fluid">
				<div style="position: relative;">
					<div class="widget grid7" style="position: relative;">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Inbox Messages
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge"><?php echo $msg_ur;?> unread</div>
							</div>
						</div> <!-- /widget-header -->
						<div class="comment"style="overflow:auto;max-height: 250px;">
						<div class="comment-body" style="padding-left:10px;">
<?php
if(isset($read_more)){
	include('read_message.php');
}
$sql_str="SELECT id,user1,title,message,DATE_FORMAT(created_on, '%d-%m-%Y %H:%i:%s') as created_dt FROM messages where user2='".$id."' and user2read=0";
$req = mysql_query("SELECT id,user1,title,message,DATE_FORMAT(created_on, '%d-%m-%Y %H:%i:%s') as created_dt FROM messages where user2='".$id."' and user2read=0");
while ($dn = mysql_fetch_array($req)){
$msg_id=$dn['id'];
$sender=$dn['user1'];
$title=$dn['title'];  $title_length=strlen($title);
$msg_txt=$dn['message'];
$cr_dt=$dn['created_dt'];
	$req2 = mysql_query("SELECT students_name FROM students where students_number='".$sender."'");
	while ($dn2 = mysql_fetch_array($req2)){
					$s_name=$dn2['students_name'];
					$created_on = substr($cr_dt,0,-8);
					$created_at = substr($cr_dt,-8,11);	
?>                        
							<div style="display: inline-block; width: 470px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">
							<span style="font-size: 100%;color:#000000;"><?php echo $title.' ';?></span> 
							<span style="font-size: 100%;color:#52aed3;"><?php echo $msg_txt.' ';?></span> 
							</div>
<?php //substr($msg_txt,0,80-$title_length)
echo"<a href=\"club_president.php?read_m={$msg_id}\" class=\"btn_btn btn-mini btn-blue\" role=\"button\" style=\"display: inline-block;float:right;\" onclick=\"return readMore();\">Read More</a>";?>
                                <div class="comment-info">
                                	From: <span><?php echo $s_name;?></span> 
									on: <span><?php echo $created_on;?></span> at  <span><?php echo $created_at;?></span>
                                </div>

                        <hr>
                                <!--<div class="comment-controls">
                                    <button class="btn btn-mini btn-green">Reply</button>
                                    <button class="btn btn-mini btn-blue">Forward</button>
                                    <button class="btn btn-mini btn-red">Delete</button>
                                </div>-->
                            
<?php 
		}
	 }     ?></div>
                        </div> <!-- /comment -->
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

	<div>
				<div class="widget grid7" style="position: relative;">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> Sent Messages
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge"><?php echo $msg_s; ?></div>
							</div>
						</div> <!-- /widget-header -->
						
						<div class="comment">
                            <div class="comment-body" style="padding-left:10px;"> 
<?php 

$req5 = mysql_query("SELECT id,user2,title,message,DATE_FORMAT(created_on, '%d-%m-%Y %H:%i:%s') as created_dt FROM messages where user1='".$id."'");
if(!$dn = mysql_fetch_array($req5)) 
{
	echo "<div style ='font:25px/21px Arial,tahoma,sans-serif,bold;color:#0000FF'>No message sent</div>";
}else
{
while ($dn = mysql_fetch_array($req5)){
$rec=$dn['user2'];
$title2=$dn['title'];
$msg_txt2=$dn['message'];
$cr_dt2=$dn['created_dt'];
	$req2 = mysql_query("SELECT students_name FROM students where students_number='".$rec."'");
	$dn2 = mysql_fetch_array($req2);
		$msg_id=$dn['id'];
					$s_name2=$dn2['students_name'];
					$created_on = substr($cr_dt2,0,-8);
					$created_at = substr($cr_dt2,-8,11);
?>
			<div style="display: inline-block; width: 470px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">
			<span style="font-size: 100%;color:#000000;"><?php echo $title2.' ';?></span> 
			<span style="font-size: 100%;color:#52aed3;"><?php echo $msg_txt2.' ';?></span> 
			</div>
<?php //substr($msg_txt,0,80-$title_length)
echo"<a href=\"president_message.php?read_more={$msg_id}\" class=\"btn_btn btn-mini btn-blue\" role=\"button\" style=\"display: inline-block;float:right;\">Read More</a>";?>
                                <div class="comment-info">
                                	To: <span><?php echo $s_name2;?></span> 
									on: <span><?php echo $created_on;?></span> at  <span><?php echo $created_at;?></span>
                                </div>

                        <hr>
	<?php
}
}
?>                     
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
					</div>					
					<div class="widget grid4"  style="position: relative;">
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
									<option value="2">General(All Members will receive the message)</option>
									<option value="3">Announcement</option>
									<option value="4">To Admin</option>
								</select>
						</div>

							<div class="dropdown" id="sel_members_d" style="display:none;">
							<select name="sel_members" id="sel_members" class="dropdown-select" onchange="change(this)">
								<option value="0">Choose Club Member</option>
<?php
$req2 = mysql_query("SELECT s.students_number as st_id,students_name FROM students s,club_members m where m.club_id='".$_SESSION['cl_id']."' and s.students_number<>'".$id."' and s.students_number=m.student_id");
$i=0;
while ($dn2 = mysql_fetch_array($req2)){
	$i=$dn2['st_id'];
	echo '<option value=' . $i . '>'.$dn2['students_name'].'</option>';
	$st_id[$i]=$dn2['st_id'];
	
 }
?>
								</select>	
								</div>

							<label id="receiver_lbl">Receiver</label>
                            <textarea name="receiver_str_area" id="receiver_str_area"></textarea>
							<input type="text" name="receiver_str" id="receiver_str" style="display:none;">
							<label>Title</label>
							<input type="text" name="msg_title" required id="title" placeholder="Title">
							<label>Message Text Area</label>
                            <textarea required rows="100" id="massage_txt_area" style="height:100px;"></textarea>
							<input type="text" name="massage_txt" id="massage_txt" style="display:none;" >
							<input type="submit" name="send_msg_btn" id="send_msg_btn" style="float:left;display:none;">
							</form>								
							
                            <button class="btn btn-blue" onclick="send_message()" style="float:right;width:80px;">Send</button>
<script>
		function 	change_msg_type(obj){
			var selectBox = obj.value;
			if(selectBox=="1"){
				document.getElementById("sel_members_d").style.display = "block";
			}
			else if(selectBox=="2"){
				document.getElementById("sel_members_d").style.display = "none";
				document.getElementById("sel_members_d");
				document.getElementById("receiver_str_area").value = "To All Members";
				document.getElementById("receiver_str").value = "all";
			}
			else if(selectBox=="3"){
				document.getElementById("sel_members_d").style.display = "none";
				document.getElementById("receiver_lbl").style.display = "none";
				document.getElementById("receiver_str_area").style.display = "none";
				document.getElementById("receiver_str").value='announcement';
			}
			else if(selectBox=="4"){
				document.getElementById("sel_members_d").style.display = "none";
				document.getElementById("receiver_str_area").value='admin';
				document.getElementById("receiver_str").value='admin';
			}
		}
		
		var receiver_list_n="";
		function change(obj) {
			var selectBox = obj;
			var e_val = selectBox.options[selectBox.selectedIndex].value;
			var er = document.getElementById("receiver_str");
			var receiver_list=e_val + ";";
			er.value =er.value+receiver_list;
			
			var e_name = selectBox.options[selectBox.selectedIndex].text;
			var er_n=document.getElementById("receiver_str_area");
			receiver_list_n=receiver_list_n+e_name + ";";
			er_n.value=er_n.value+receiver_list_n;
		}
		
		function send_message(){
			document.getElementById("massage_txt").value=document.getElementById("massage_txt_area").value;
			document.getElementById("send_msg_btn").click()
		}
		</script>		
							<?php
							function send_message($sender,$dest,$msgtitle,$msg_txt){
								$req_reg=mysql_query("insert into messages (user1,user2,title,message) values ('$sender','$dest','$msgtitle','$msg_txt')");
								
							if(!$req_reg){$q=False; echo '<script type="text/javascript">alert("Mesagge sendng failed!!");</script>';}
								}
							
							if(isset($_REQUEST['send_msg_btn'])){
								$receiver_array=$_POST['receiver_str'];
								$ms_title=$_POST['msg_title'];
								$message_t=$_POST['massage_txt'];
								
								if($receiver_array=='admin'){
									$req2 = mysql_query("SELECT admin_username as ad_id FROM pbs_admin");
									while($dn=mysql_fetch_array($req2)){
										send_message($id,$dn['ad_id'],$ms_title,$message_t);
									}
								}
								elseif($receiver_array=='all'){
									// $req2 = mysql_query("SELECT s.students_number as st_id FROM students s,club_members m where m.club_id='". $_SESSION['cl_id'] ."' and s.students_number=m.student_id");
									// while($dn=mysql_fetch_array($req_reg)){
										// send_message($receiver,$ms_title,$message_t);
									// }
									foreach($st_id as $u_id){
										send_message($id,$u_id,$ms_title,$message_t);
									}
								}
								elseif($receiver_array=='announcement'){
									
									//$req_reg=mysql_query("insert into last_news (news_title,user1,user2,message) values ('$msgtitle','$sender','$dest','$msg_txt')");
								}
								else{
									echo '<script type="text/javascript">alert("'.$sender.'");</script>';;
								$r_ar=explode(";", $receiver_array);
								$send_to = array_unique($r_ar,SORT_STRING);
								foreach($send_to as $receiver){
									if(!empty($receiver)){
										send_message($id,$receiver,$ms_title,$message_t);
									}
								}}
								//include('send_message.php');
							}
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
							
						</div>

					</div> <!-- /widget -->
					</div>
				

			</div> <!-- /wrp -->

		</div> <!-- /content -->

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