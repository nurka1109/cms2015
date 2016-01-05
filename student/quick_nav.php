<?php ?>

<?php
if($current_user_type=="club_president"){
	echo "<div class=\"quick-nav\">	<ul>		<li class=\"qn-first $active_h\"><a href=\"club_president.php\"><i class=\"fa fa-edit\"></i> Home</a></li>   	<li class=\"$active_s\"><a href=\"search.php\"><i class=\"fa fa-list-alt\"></i> Seacrh </a></li>		<li class=\"$active_v\"><a href=\"list.php\"><i class=\"fa fa-list-alt\"></i> View Lists</a></li>			<li class=\"qn-last $active_m\">			<a href=\"president_message.php\"><i class=\"fa fa-envelope\"></i> Messages</a>			<span class=\"badge qnav-badge blue\"> $msg </span>		</li>		<!--<li><a href=\"president_new_message.php\"><i class=\"fa fa-list-alt\"></i> New Message</a></li>	-->		</ul>	</div>";
}
elseif($current_user_type=="member")
{
	echo "<div class=\"quick-nav\">   <ul>    <li class=\"qn-first $active_h\"><a href=\"member.php\"><i class=\"fa fa-edit\"></i> Home</a></li>      <li class=\"$active_r\"><a href=\"member_registration.php\"><i class=\"fa fa-list-alt\"></i> Register</a></li>       <li class=\"qn-last $active_m\">    <a href=\"member_message.php\"><i class=\"fa fa-envelope\"></i> Messages</a>        <span class=\"badge qnav-badge blue\"> $msg</span>  </li>  </ul> </div>";
}
?>
