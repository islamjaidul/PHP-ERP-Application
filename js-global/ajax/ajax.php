<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$sql = "select * from sub_institution where institutionid = $id";
	$r = mysql_query($sql);
	print '<option value="0" selected="selected">Select Institute</option>';
	while($s = mysql_fetch_row($r))
	{
		print '<option value="'.$s[0].'">'.$s[1].'</option>';
	}
	
}
?>