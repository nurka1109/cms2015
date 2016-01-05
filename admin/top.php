<?php
?>
<div id="top">
			
			<div class="main-logo">
				<a href="#" onclick="return false;"><img src="images/logo.png"></a>
			</div>
			
			<div class="m-nav"><i class="fa fa-bars"></i></div>

			<div class="profile-nav">
				<ul>
					<li class="profile-user-info">
						<a href="#" onclick="return false;">
							<img src="<?php echo '../'.$u_ipath;?>" class="user-img">
							<b>Welcome, </b><span><?php echo $uname?></span> <i class="fa fa-user"></i> <i class="fa fa-caret-down"></i>
						</a>
					</li>
					<li>
						<a href="#" onclick="return false;" class="profile-badge-info">
							<i class="fa fa-envelope"></i> Messages
						</a>
						<span class="badge profile-badge blue"><?php echo $msg; ?></span>
					</li>
					<li>
						<a href="../login.php">
							<i class="fa fa-times-circle"></i> Logout
						</a>
					</li>
				</ul>
			</div>

		</div> <!-- /top -->
