<?php
$query = 'select wtm.*, wd.designation_name from wp_team_members wtm left join wp_designations wd on wtm.member_designation=wd.id where wtm.status="1" order by wtm.sort_order asc';
$members = $wpdb -> get_results($query, OBJECT);
$html='';
$bg='#eeeeee';
if(count($members)>0)
{
	$i=1;
	foreach($members as $member)
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
					<a title="Edit “Sample Page”" href="?page=tm_admin_add_member&id='.$member->id.'" class="row-title">
						'.$member->member_name.'
					</a>
				</strong>
			</td>
			<td class="author column-author">'.$member->designation_name.'</td>
			<td class="date column-date">
				'.$member->member_email.'
			</td>
			<td class="date">
				<div>
					<input type="text" id="sort_'.$member->id.'" name="sort[]" value="'.$member->sort_order.'" style="width:50px;" />
					<input type="hidden" name="sort_hidd[]" value="'.$member->id.'" />
				</div>
			</td>
			<td class="date">
				<div><a href="?page=tm_admin_add_member&id='.$member->id.'&action=delete">Delete</a></div>
			</td>
		</tr>';
		$i++;
	}
}
?>

<form name="member_list" action="?page=tm_admin_add_member&action=sort" method="post">
	<table cellspacing="0" class="wp-list-table widefat fixed pages">
		<thead>
			<tr>
				<th class="manage-column column-cb check-column" id="cb" scope="col" style="padding-left:5px;">
					#
				</th>
				<th style="" class="manage-column column-title sortable desc" id="title" scope="col">
					<a href="javascript:void(0);">
						<span>Name	</span>
					</a>
				</th>
				<th style="" class="manage-column" id="author" scope="col">Designation</th>
				<th style="" class="manage-column" id="date" scope="col">
					E-mail
				</th>
				<th style="" class="manage-column" id="date" scope="col">
					Sort <input type="submit" value="" style="background-image: url(images/sorting-icon1.png); width: 20px; height: 21px; border: 0; cursor: pointer;" />
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
</form>