<?php
//$query = 'select * from wp_team_members where status="1"';
$query = 'select a.*, b.designation_name from wp_team_members a left join wp_designations b on a.member_designation = b.id where a.status="1" order by a.sort_order';
$members = $wpdb -> get_results($query, OBJECT);
$designation_array = array('1'=>'Student Minister', '2'=>'Associate Student Minister', '3'=>'Associate To Worship & Media', '4'=>'Associate To High School Girls');
$html='';
if(count($members)>0)
{
	$i=1;
	foreach($members as $member)
	{
		if($i==3)
		{
			$last = 'last';
		}
		else {
			$last='';
		}
		if($member->member_image=='')
		{
			$member_image = home_url().'/wp-content/uploads/2013/02/image_4.jpg';
		}
		else {
			$member_image = $member->member_image;
		}

		$memberName = $member->member_name;
		$memberName = explode(' ', $memberName);


		$html .='<div class="one_third '.$last.'">
					<div class="person">
						<img alt="" src="'.$member_image.'" class="person-img" style="height:193px;">
						<div class="person-desc">
							<div class="person-author clearfix">
								<div class="person-author-wrapper">
									<span class="person-name">'.$member->member_name.'</span>
									<span class="person-title">'.$member->designation_name.'</span>
								</div>
								<span class="social-icon">
									<a class="facebook" target="" href="'.$member->fb_link.'">Facebook</a>
									<div class="popup">
										<div class="holder">
											<p>Facebook</p>
										</div>
									</div>
								</span>
								<span class="social-icon">
									<a class="twitter" target="" href="'.$member->twitter_link.'">Twitter</a>
									<div class="popup">
										<div class="holder">
											<p>Twitter</p>
										</div>
									</div>
								</span>
								<div class="clear"></div>
							</div>
							<div class="person-content">
								<a href="mailto:'.$member->member_email.'">Email '.$memberName[0].'</a>
							</div>
						</div>
					</div>
				</div>';
				if($last!='')
				{
					$html .='<div class="clearboth"></div>
<div class="demo-sep" style="margin-top: 40px;"></div>';
$i=0;
				}
		$i++;
	}
}

echo '<div class="title"><h2>The Heights Student Ministry Team</h2></div>'.$html;