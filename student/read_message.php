<?php 
$req5 = mysql_query("SELECT title FROM messages where user1='".$id."'");
?>
<div class="widget grid9" style="position: relative;">
						<div class="widget-header">
							<div class="widget-title">
								<i class="fa fa-comments"></i> <?php echo mysql_fetch_array($req5)['title'];?>
							</div>
							<div class="widget-controls">
								<div class="badge msg-badge fa fa-times"><?php echo $msg_s; ?></div>
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

					</div> <!-- /widget -->
<?php ?>   