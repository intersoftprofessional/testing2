<?php
//$designation_array = array('1'=>'Student Minister', '2'=>'Associate Student Minister', '3'=>'Associate To Worship & Media', '4'=>'Associate To High School Girls');
$query = 'select * from wp_designations where status="1"';
$designations = $wpdb -> get_results($query, OBJECT);

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	echo $delete = 'delete from wp_team_members where id = '.$_REQUEST['id'].'';exit;
	//$wpdb->query($delete);
	?>
		<script>
			//window.location = 'admin.php?page=tm_admin';
		</script>
	<?php
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='sort')
{
	$sort_hidden = $_REQUEST['sort_hidd'];
	//echo '<pre>';print_r($sort_hidden);
	$sort = $_REQUEST['sort'];
	//print_r($sort);
	$i=0;
	foreach($sort_hidden as $id)
	{
		$update = 'update wp_team_members set sort_order='.$sort[$i].' where id='.$id.'';
		$wpdb->query($update);
		//echo '<br>';
		$i++;
	}
	?>
		<script>
			window.location = 'admin.php?page=tm_admin';
		</script>
	<?php
}


if($_POST['tm_hidden'] == 'Y') {
            $id = $_POST['id'];
            $member_name = $_POST['member_name'];
			$member_email = $_POST['member_email'];
			$member_designation = $_POST['member_designation'];
			$fb_link = $_POST['fb_link'];
			$twitter_link = $_POST['twitter_link'];
			$allowedExts = array("gif", "jpeg", "jpg", "png");

			$temp = explode(".", $_FILES["member_image"]["name"]);
			$extension = end($temp);
			/*echo $_FILES["member_image"]["type"];
			echo '<br>';
			echo $_FILES["member_image"]["size"];
			echo '<br>';*/
			if(isset($_FILES["member_image"]["name"]) && $_FILES["member_image"]["tmp_name"]!='')
			{
				if ((($_FILES["member_image"]["type"] == "image/gif")
				|| ($_FILES["member_image"]["type"] == "image/jpeg")
				|| ($_FILES["member_image"]["type"] == "image/jpg")
				|| ($_FILES["member_image"]["type"] == "image/pjpeg")
				|| ($_FILES["member_image"]["type"] == "image/x-png")
				|| ($_FILES["member_image"]["type"] == "image/png"))
				&& ($_FILES["member_image"]["size"] < 500000)
				&& in_array($extension, $allowedExts))
				{
					if ($_FILES["member_image"]["error"] > 0)
					{
						echo "Error: " . $_FILES["member_image"]["error"] . "<br>";
					}
					else
					{
						$dir = '../member_images';
						$member_image = 'img_'.time().'_'.$_FILES["member_image"]["name"];
						//echo "Type: " . $_FILES["member_image"]["type"] . "<br>";
						//echo "Size: " . ($_FILES["member_image"]["size"] / 1024) . " kB<br>";
						$tmp_name =  $_FILES["member_image"]["tmp_name"];
						if(!is_dir($dir))
						{
							mkdir($dir);
						}
						move_uploaded_file($tmp_name, $dir.'/'.$member_image);
					}
				}
				else
				{
					echo "Invalid file";
				}
			}
			if($id!='')
			{
				$insert = 'update wp_team_members set ';
			}
			else {
				$insert = 'insert into wp_team_members set ';
			}
			$insert .='member_name = "'.$member_name.'", ';
			$insert .='member_email = "'.$member_email.'", ';
			$insert .='member_designation = "'.$member_designation.'", ';
			if(isset($_FILES["member_image"]["name"]) && $_FILES["member_image"]["tmp_name"]!='')
			{
				$insert .='member_image = "'.home_url().'/member_images/'.$member_image.'", ';
			}
			$insert .='fb_link = "'.$fb_link.'", ';
			$insert .='twitter_link = "'.$twitter_link.'"';

			if($id!='')
			{
				$insert .= ' where id='.$id.'';
			}
//echo $insert;
			$wpdb->query($insert);
			//exit;
			?>
			<script>
				window.location = 'admin.php?page=tm_admin';
			</script>
			<?php

        } else {
        	if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
			{
				$query = 'select * from wp_team_members where id="'.$_REQUEST['id'].'"';
				$member_data = $wpdb->get_row($query, OBJECT, 0);
				$id = $member_data->id;
				$name = $member_data->member_name;
				$member_email = $member_data->member_email;
				$member_image = $member_data->member_image;
				$member_designation = $member_data->member_designation;
				$fb_link = $member_data->fb_link;
				$twitter_link = $member_data->twitter_link;
			}
			else {
				$id='';
				$name = '';
				$member_email = '';
				$member_image = '';
				$member_designation = '';
				$fb_link = '';
				$twitter_link = '';
			}

$designation_opt ='';
if(count($designations)>0)
{
	foreach($designations as $designation)
	{
		$sel = $designation->id==$member_designation?'selected="selected"':'';
		$designation_opt .='<option '.$sel.' value="'.$designation->id.'">'.$designation->designation_name.'</option>';
	}
}


        ?>
			    <div class="wrap">

			        <form name="tm_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
						<input type="hidden" name="tm_hidden" value="Y">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<?php    echo "<h4>" . __( 'Team member data', 'oscimp_trdom' ) . "</h4>"; ?>
<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row"><label><?php _e("Name: " ); ?></label></th>
			<td><input type="text" name="member_name" value="<?php echo $name;?>" /></td></tr>
		<tr><th scope="row"><label><?php _e("E-mail: " ); ?></label></th>
			<td><input type="text" name="member_email" value="<?php echo $member_email;?>" /></td>
			</tr>
		<tr><th scope="row"><label><?php _e("Image: " ); ?></label></th>
			<td><input type="file" name="member_image" value="" />
				        	<?php
				        	if($member_image!='')
				        	{
				        		echo '<br><img src="'.$member_image.'" width="100"/>';
				        	}
				        	?>
				   </td></tr>
		<tr><th scope="row"><label><?php _e("Designation: " ); ?></label></th>
		<td>		        	<select name="member_designation">
				        	<?php echo $designation_opt?>
				        	</select>
		  	</td>
		</tr>
		<tr><th scope="row"><label><?php _e("Facebook link: " ); ?></label></th>
			<td><input type="text" name="fb_link" value="<?php echo $fb_link;?>" /></td></tr>
		<tr><th scope="row"><label><?php _e("Twitter link: " ); ?></label></th>
			<td><input type="text" name="twitter_link" value="<?php echo $twitter_link;?>" /></td></tr>
				        <hr />

			<tr><th scope="row">            <p class="submit">

			            <?php
			            if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
			{
				?>
				<input type="submit" name="Submit" value="<?php _e('Update', 'tm_trdom' ) ?>" />
				<?php
				}
				else
				{
					?>
				<input type="submit" name="Submit" value="<?php _e('Save', 'tm_trdom' ) ?>" />
				<?php
				}?>
			            </p>
			            </th>
			            </tr>
   	</tbody>
</table>
			        </form>
			    </div>
        <?php
        }
    ?>