<?php
mysql_connect('localhost', 'cl31-js-global', 'Ind38maK');
mysql_select_db('cl31-js-global');

	$id = $_POST['id'];
	$sql = "select * from student_info where id  = $id";
	$r = mysql_query($sql);
	while($s = mysql_fetch_array($r))
	{
		print '		<style>
						.form-control{width:270px}
					</style>		
			   <div class="row">
					<div class="col-md-6">
						<div style="margin-top:8px;"><label style="width:80px">Name: </label> <input type="text" class="form-control" name="name" value="'.$s[1].'">
						<input type="hidden" name="id" value="'.$s[0].'">
						</div><br/>
						<span><label style="width:80px">Address: </label><textarea style="width:270px;max-width:270px"  name="address" class="form-control">'.$s[2].'</textarea></span> <br/>	
						<span><label style="width:80px">Mobile: </label><input type="text" class="form-control" name="mobile" value="'.$s[5].'"></span> <br/>
						<span><label style="width:80px">E-mail: </label><input type="text" class="form-control" name="email" value="'.$s[6].'"></span><br/>';
							
							
					print '</div>
					<div class="col-md-6">
						<div style="margin-top:10px">
						<label style="width:180px">Student Info: </label><textarea name="student_info" style="width:270px;max-width:270px" class="form-control">'.$s[3].'</textarea><br/>';
						
						print '<span><label style="width:80px">Status: </label>
							<select name="status" class="form-control">';
									if($s[8] == 1)
									{
										print '<option value="1" selected="selected">Pending</option>';
										print '<option value="2">Successfull</option>';
										print '<option value="0">Rejected</option>';
									}
									else if($s[8] == 2)
									{
										print '<option value="2" selected="selected">Successfull</option>';
										print '<option value="1">Pending</option>';
										print '<option value="0">Rejected</option>';
									}
									else
									{
										print '<option value="0" selected="selected">Rejected</option>';
										print '<option value="1">Pending</option>';
										print '<option value="2">Successfull</option>';
									}	
							print '</select>
						</span><br/>';
					
						
						
						print '<span><label style="width:80px">Visa Type: </label>
							<select name="visa_type" class="form-control">';
									
									print'<option value="'.$s[7].'">
										'.visa($s[7]).'
										</option>';		
								
					print '</span>
						</div>
					</div>
			   </div>';
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