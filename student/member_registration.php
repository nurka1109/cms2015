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
				$active_h="";
				$active_r="active";
				$active_m="";
				include('quick_nav.php');?>
				<div class="fluid">
				
				<div class="widget grid6">
					<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-pencil"></i> Become Member of ANY Club you like.
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge">34</div>
							</div>
						</div> <!-- /widget-header -->
					
					<div class="widget-content pad20f">

							<form method="post" >
							<div class="dropdown">
								<select name="one" class="dropdown-select" onchange="change(this)">
								<option value="0">Club's Name</option>
								<?php 
$req2 = mysql_query("SELECT id,name,information FROM clubs");
//$id=0;
while ($dn2 = mysql_fetch_array($req2)){
	$i=$dn2['id'];
	echo '<option value=' . $i . '>' . $dn2['name'] . '</option>';
	$club_info[$i]=$dn2['information'];

 }
 ?>
								</select>
							</div>
							<div id="reg" style="display:none;">
							<textarea id="text_area" style="height: 150px;border: 0;" name="ta_reg"></textarea>
                            <input class="btn btn-blue" type="submit" value="Register/Send Request" name="reg_btn" />
							<input type="text" name="o_sel_txt" value="" id="o_sel_txt" style="display:none;"/>
							</div>
							</form>
						<script>
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
								 echo '<script type="text/javascript">alert("Something went wrong, please try again");</script>';
							}
							else 
								 echo '<script type="text/javascript">alert("Your Membership Request sent Successfully");</script>';
							}
							?>
					</div> <!-- /widget-content -->

				</div> <!-- /widget -->
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