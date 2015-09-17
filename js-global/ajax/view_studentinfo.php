<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');

if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$subinstitute = $_POST['subinstitute'];
	if($subinstitute != NULL)
	{
		$sql = "select si.id, si.name, si.address, si.student_info, si.student_img, si.mobile, si.email, si.visa_type, c.name, sb.name, si.sub_institutionid from student_info as si, country as c, sub_institution as sb where si.countryid = c.id and si.sub_institutionid = sb.id and si.id = $id";
	}
	else
	{
		$sql = "select si.id, si.name, si.address, si.student_info, si.student_img, si.mobile, si.email, si.visa_type, c.name from student_info as si, country as c where si.countryid = c.id and si.id = $id";
	}
	$r = mysql_query($sql);
	while($s = mysql_fetch_row($r))
	{
		print '				
			   <div class="row">
					<div class="col-md-6">
						<h2 style="border-bottom:1px solid silver;width:232px;margin-top:0">Basic Information</h2>
						<img style="margin-top:10px;"  src="http://dopestylebd.com/js-global/upload/'.$s[4].'" height="150" width="150">
						<div style="margin-top:8px;"><label style="width:80px">Name: </label> '.htmlentities($s[1]).'</div>
						<span><label style="width:80px">Address: </label> '.htmlentities($s[2]).'</span> <br/>	
						<span><label style="width:80px">Mobile: </label> '.htmlentities($s[5]).'</span> <br/>
						<span><label style="width:80px">E-mail: </label> '.htmlentities($s[6]).'</span> <br/>
						<span><label style="width:80px">Visa Type: </label> '.htmlentities(visa($s[7])).'</span> <br/>	
						<span><label style="width:80px">Country: </label> '.$s[8].'</span> <br/>';
							if($subinstitute != NULL)
							{
						print '<span><label style="width:80px">Institute: </label> '.htmlentities($s[9]).'</span> <br/>';	
							}
							
					print '</div>
					<div class="col-md-6"><h2 style="border-bottom:1px solid silver;width:236px;margin-top:0">Study Information</h2>
						<div style="margin-top:10px;"><pre style="background-color:white; border:none;"><b>'.htmlentities($s[3]).'</b></pre></div>
					</div>
			   </div>
			    ';
		
	}
}

function visa($type){
	if($type == 1)
	{
		return 'Tourist';
	}
	else
	{
		return 'Student';
	}
}
?>
