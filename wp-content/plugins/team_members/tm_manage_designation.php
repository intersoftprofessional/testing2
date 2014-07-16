<?php
//$designation_array = array('1'=>'Student Minister', '2'=>'Associate Student Minister', '3'=>'Associate To Worship & Media', '4'=>'Associate To High School Girls');

if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete')
{
	$delete = 'delete from wp_designations where id = '.$_REQUEST['id'].'';
	$wpdb->query($delete);
	?>
		<script>
			window.location = 'admin.php?page=tm_admin_list_designations';
		</script>
	<?php
}


if($_POST['tm_hidden'] == 'Y') {
            $id = $_POST['id'];
            $designation_name = $_POST['designation_name'];

			if($id!='')
			{
				$insert = 'update wp_designations set ';
			}
			else {
				$insert = 'insert into wp_designations set ';
			}

			$insert .='designation_name = "'.$designation_name.'" ';

			if($id!='')
			{
				$insert .= ' where id='.$id.'';
			}
//echo $insert;exit;
			$wpdb->query($insert);

			?>
			<script>
				window.location = 'admin.php?page=tm_admin_list_designations';
			</script>
			<?php

        } else {
        	if(isset($_REQUEST['id']) && $_REQUEST['id']!='')
			{
				$query = 'select * from wp_designations where id="'.$_REQUEST['id'].'"';
				$designation_data = $wpdb->get_row($query, OBJECT, 0);
				$id = $designation_data->id;
				$designation_name = $designation_data->designation_name;
			}
			else {
				$id='';
				$designation_name = '';
			}



        ?>
			    <div class="wrap">

			        <form name="tm_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
						<input type="hidden" name="tm_hidden" value="Y">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<?php    echo "<h4>" . __( 'Designation', 'oscimp_trdom' ) . "</h4>"; ?>
<table class="form-table">
	<tbody>
		<tr valign="top">
			<th scope="row"><label><?php _e("Designation Name: " ); ?></label></th>
			<td><input type="text" style="width: 300px;" name="designation_name" value="<?php echo $designation_name;?>" /></td></tr>				        <hr />

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