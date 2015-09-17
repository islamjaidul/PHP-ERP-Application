<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$sql = "select * from sub_institution where id = $id";
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		print '<input class="form-control" type="text" name="name" id="name" value="'.$s[1].'"><br>';
		print '<input type="hidden" name="id" value="'.$s[0].'">';
	}
	
}
?>