<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');
	$countryid = $_POST['countryid'];
	$sql = "select * from country";
	$r = mysql_query($sql);
	
		print '<label style="width:80px">Country: </label>
		<select style="width:270px" class="form-control" name="country">';
	while($s = mysql_fetch_row($r))
	{
		
			if($s[0] == $countryid)
			{
				print '<option id="option" value = "'.$s[0].'" selected="selected">'.$s[1].'</option>';
			}
			else
			{
				print '<option id="option" value = "'.$s[0].'">'.$s[1].'</option>';
			}
			
	}
	
	print '</select><br/>';
?>