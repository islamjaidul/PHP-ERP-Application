<?php
class StudentInfoController extends BaseController{
	public function getStudentInfo(){
		$data['rows'] = StudentInfo::orderBy('name')->get();
		return View::make('module.students.include.studentinfo', $data);
	}
	
	public function getNewStudentInfo(){
		$data['category'] = Institute::select('institution.id as iid', 'institution.name as institute')->get();
		$data['country'] = Country::select('country.id as cid', 'country.name as cname')->get();
		return View::make('module.students.include.newstudentinfo', $data);
	}
	
	public function postNewStudentInfo(){
		$validator = Validator::make(Input::all(), array(
					'name' 			=> 'Required|max:30|unique:student_info',
					'address' 		=> 'Required',
					'student_info'  => 'Required',
					'img'			=> 'Required',
					'mobile' 		=> 'Required|Numeric',
					'email' 		=> 'Required|email|max:30',
					'visa_type' 	=> 'Required|not_in:0',
					'country' 		=> 'Required|not_in:0'
		));
		
		if($validator -> fails())
		{
			return Redirect::route('get_new_studentinfo')
					->withErrors($validator);
		}
		else
		{
			$file = Input::file('img');		
			$filename = Str::random(20).'.'.$file -> getClientOriginalExtension();
			$destinationPath = 'upload/';
			$file -> move($destinationPath, $filename);
			if(Input::get('subinstitute') != 0)
			{
				$subinstitute = Input::get('subinstitute');
			}
			else
			{
				$subinstitute = Input::get(0);
			}
			
			$student_info = StudentInfo::create(array(
					'name' 				=> Input::get('name'),
					'address' 			=> Input::get('address'),
					'student_info'  	=> Input::get('student_info'),
					'student_img' 		=> $filename,
					'mobile' 			=> Input::get('mobile'),
					'email' 			=> Input::get('email'),
					'visa_type' 		=> Input::get('visa_type'),
					'status'			=> '1',
					'countryid' 		=> Input::get('country'),
					'sub_institutionid' => $subinstitute
			));
			
			if($student_info)
			{
				return Redirect::route('get_new_studentinfo')
					->with('global', 'New Student Information Saved Successfully');
			}
		}
	}
	
	
	//Export CSV
	
	public function getExportCsvStudentinfo(){
		$table = StudentInfo::join('country', 'student_info.countryid', '=', 'country.id')
				->select('student_info.name', 'student_info.mobile', 'student_info.email', 'student_info.visa_type', 'student_info.created_at', 'country.name as country')
				->orderBy('name')
				->get();
    	$filename = "student_info.csv";
    	$handle = fopen($filename, 'w+');
    	fputcsv($handle, array('Name', 'mobile', 'E-mail', 'visa_type', 'Country', 'Created at'));
		
		function VisaType($type){
			if($type == 1)
			{
				return 'Tourist';
			}
			else
			{
				return 'Student';
			}
		}
	
    	foreach($table as $row) {
        fputcsv($handle, array($row['name'], $row['mobile'], $row['email'], VisaType($row['visa_type']), $row['country'], $row['created_at']));
    	}

    	fclose($handle);

    	$headers = array(
        'Content-Type' => 'text/csv',
    	);

   		 return Response::download($filename, 'student_info.csv', $headers);
	}
	
	//Export PDF
	
	public function getExportPdfStudentinfo(){
		$data = StudentInfo::join('country', 'student_info.countryid', '=', 'country.id')
				->select('student_info.name', 'student_info.mobile', 'student_info.email', 'student_info.visa_type', 'student_info.created_at', 'country.name as country')
				->orderBy('name')
				->get();
				
		$name = '';
		$mobile = '';
		$email = '';
		$visa_type = '';
		$country = '';
		$date = '';
		
		foreach ($data as $row) {
			$name .= ("<p>".$row->name."</p>");
			$mobile .= ("<p>".$row->mobile."</p>");
			$email .= ("<p>".$row->email."</p>");
			if($row->visa_type == 2)
			{
				$visa_type .= ("<p>Student</p>");
			}
			else
			{
				$visa_type .= ("<p>Tourist</p>");
			}
			$country .= ("<p>".$row->country."</p>");
			$date .= ("<p>".$row->created_at."</p>");
		}
		$html = "<h1>JS-Global ERP</h1>";
		$html .= "<h3>Student Information Data</h3>";
		$html .= "<table style='margin-top:15px'>
					<tr style='background-color:silver;text-align:left'><th>Name</th><th>Mobile</th><th>E-mail</th><th>Visa Type</th><th>Country</th><th>Created at</th></tr>
					<tr>
						<td style='background-color:skyblue'>".$name."</td>
						<td style='background-color:skyblue'>".$mobile."</td>
						<td style='background-color:skyblue'>".$email."</td>";
						
							$html .= "<td style='background-color:skyblue'>".$visa_type."</td>";
						
						
						
						$html .= "<td style='background-color:skyblue'>".$country."</td>";
						
						$html .= "<td style='background-color:skyblue'>".$date."</td>
					</tr>
				</table>";
		return PDF::load($html, 'A4', 'portrait')->download('student_info');
				
	}
	
	//Delete
	public function getDeleteSelectedStudentInfo(){
		$id = Input::get('id');
		$filename = Input::get('delete_img');
		$delete = StudentInfo::destroy($id);
			foreach($filename as $filename)
			{
				
		 			File::delete('upload/'.$filename);
				
			}
		 return Redirect::route('get_studentinfo')
		 			->with('global', 'Successfully Deleted');	
				
	}
	
	public function getDeleteStudentInfo($id, $img){
		$id = Crypt::decrypt($id);
		$filename = $img;
		if($filename != '')
		{
			$delete = StudentInfo::find($id)->delete();
			File::delete('upload/'.$filename);
		}
		 return Redirect::route('get_studentinfo')
		 			->with('global', 'Successfully Deleted');	
				
	}
	
	//Edit
	public function postEditStudentInfo(){
		$id = Input::get('id');
		$visa_type = Input::get('visa_type');
		$validator = Validator::make(Input::all(), array(
					'name' 			=> 'Required|max:30|unique:student_info,name,"'.$id.'"',
					'email'		    => 'Required|email',
					'address' 		=> 'Required',
					'student_info'  => 'Required',
					'mobile' 		=> 'Required'
		));
		
		if($validator -> fails())
		{
			return Redirect::route('get_studentinfo')
					->withErrors($validator);
		}
		else
		{
			$update = StudentInfo::where('id', $id)->update(array(
					'name' 				=> Input::get('name'),
					'address' 			=> Input::get('address'),
					'student_info' 		=> Input::get('student_info'),
					'email' 			=> Input::get('email'),
					'mobile' 			=> Input::get('mobile'),
					'visa_type' 		=> $visa_type,
					'status'    		=> Input::get('status'),
					'countryid' 		=> Input::get('country'),
					'sub_institutionid' => Input::get('institute')
			));
			if($update)
			{
				return Redirect::route('get_studentinfo')
					->with('success', 'Updated Successfully');	
			}
		}
	}
}