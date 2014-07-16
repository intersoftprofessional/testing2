<?php
$query = 'select * from wp_designations where status="1"';
$designations = $wpdb -> get_results($query, OBJECT);
//$designation_array = array('1'=>'Student Minister', '2'=>'Associate Student Minister', '3'=>'Associate To Worship & Media', '4'=>'Associate To High School Girls');
$html='';
$bg='#eeeeee';
if(count($designations)>0)
{
	$i=1;
	foreach($designations as $designation)
	{
		if($i%2==0)
		{
			$bg='';
		}
		else {
			$bg='alternate';
		}
		$html .='<tr valign="top" class="post-2 type-page status-publish hentry iedit author-self level-0 '.$bg.'">
			<th class="check-column" scope="row" style="padding-left:5px;">
				'.$i.'
			</th>
			<td class="post-title page-title column-title">
				<strong>
					<a title="Edit “Sample Page”" href="?page=tm_admin_manage_designations&id='.$designation->id.'" class="row-title">
						'.$designation->designation_name.'
					</a>
				</strong>
			</td>
			<td class="date">
				<div><a href="?page=tm_admin_manage_designations&id='.$designation->id.'&action=delete">Delete</a></div>
			</td>
		</tr>';
		$i++;
	}
}
//echo '<pre>';print_r($members);
			?>
<table cellspacing="0" class="wp-list-table widefat fixed pages">
	<thead>
		<tr>
			<th class="manage-column column-cb check-column" id="cb" scope="col" style="padding-left:5px;">
				#
			</th>
			<th style="" class="manage-column column-title sortable desc" id="title" scope="col">
				<a href="javascript:void(0);">
					<span>Designation Name	</span>
				</a>
			</th>
			<th style="" class="manage-column column-date sortable asc" id="date" scope="col">
				Action
			</th>
		</tr>
	</thead>
	<tbody id="the-list">
		<?php echo $html;?>
	</tbody>
</table>