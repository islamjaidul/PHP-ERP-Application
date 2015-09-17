<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');

	$instituteid = $_POST['instituteid'];
	$sql = "select * from institution";
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		if($s[0] == $instituteid)
		{
			print '<option id="option" value = "'.$s[0].'" selected="Selected">'.$s[1].'</option>';
		}
		else
		{
			print '<option id="option" value = "'.$s[0].'">'.$s[1].'</option>';
		}
		
	}


?>