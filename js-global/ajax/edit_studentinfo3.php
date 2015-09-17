<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');

	$instituteid = $_POST['instituteid'];
	$visa = $_POST['visa'];
	$sql = "select * from sub_institution";
	$r = mysql_query($sql);
	if($visa != 1)
	{
		print '<label style="width:80px">Institute: </label>
		<select style="width:270px" class="form-control" name="institute">';
	}
	while($s = mysql_fetch_row($r))
	{
		if($visa != 1)
		{
			if($s[0] == $instituteid)
			{
				print '<option id="option" value = "'.$s[0].'" selected="selected">'.$s[1].'</option>';
			}
			else
			{
				print '<option id="option" value = "'.$s[0].'">'.$s[1].'</option>';
			}
		}
	}
	
	if($visa != 1)
	{
	print '</select><br/>';
	}
?>