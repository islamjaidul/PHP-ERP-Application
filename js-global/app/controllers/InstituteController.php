<?php
class InstituteController extends BaseController{
	public function getInstitute(){
		$data['rows'] = Institute::get();
		return View::make('module.students.include.institute', $data);
	}
	
	public function getNewInstitute(){
		return View::make('module.students.include.newinstitute');
	}
	
	public function postNewInstitute(){
		$validator = Validator::make(Input::all(), array(
					'name' => 'Required|max:30|unique:institution'
		));
		
		if($validator -> fails())
		{
			return Redirect::route('get_new_institute')
					->withErrors($validator);
		}
		else
		{
			$institute = Institute::create(array(
					'name' => Input::get('name')
			));
			if($institute)
			{
				return Redirect::route('get_new_institute')
					->with('global', 'New Institute Saved Successfully');	
			}
		}
	}
	
	//Export CSV
	public function getExportCsvInstitute(){
		$table = Institute::all();
    	$filename = "institute.csv";
    	$handle = fopen($filename, 'w+');
    	fputcsv($handle, array('Institute Name', 'Created at'));

    	foreach($table as $row) {
        fputcsv($handle, array($row['name'], $row['created_at']));
    	}

    	fclose($handle);

    	$headers = array(
        'Content-Type' => 'text/csv',
    	);

   		 return Response::download($filename, 'institute.csv', $headers);
	}
	
	//Export PDF
	
	public function getExportPdfInstitute(){
		$data = Institute::all();
		$name = '';
		$date = '';
		foreach ($data as $row) {
			$name .= ("<p>".$row->name."</p>");
			$date .= ("<p>".$row->created_at."</p>");
		}
		$html = "<h1>JS-Global ERP</h1>";
		$html .= "<h3>Category Data</h3>";
		$html .= "<table style='width:600px;margin-top:15px'>
					<tr style='background-color:gray;text-align:left'><th>Name</th><th>Created at</th></tr>
					<tr>
						<td style='background-color:skyblue'>".$name."</td>
						<td style='background-color:orange'>".$date."</td>
					</tr>
				</table>";
		return PDF::load($html, 'A4', 'portrait')->download('category');
				
	}

	
	//Delete Selected
	public function getDeleteSelectedInstitute(){
		$id = Input::get('id');
		$delete = Institute::destroy($id);
		if($delete)
		{
			return Redirect::route('get_institute')
				->with('global', 'Successfully Deleted');
		}
	}
	
	public function getDeleteInstitute($id){
		$id = Crypt::decrypt($id);
		$delete = Institute::find($id)->delete();
		if($delete)
		{
			return Redirect::route('get_institute')
				->with('global', 'Successfully Deleted');
		}
	}
	
	//Edit
	public function postEditInstitute(){
		$validator = Validator::make(Input::all(), array(
					'name' => 'Required|max:30|unique:institution'
		));
		if($validator -> fails())
		{
			return Redirect::route('get_institute')
					->withErrors($validator);
		}
		else
		{
			$id = Input::get('id');
			$update = Institute::where('id', $id)->update(array(
				'name' => Input::get('name')
			));
			if($update)
			{
				return Redirect::route('get_institute')
					->with('success', 'Updated Successfully');
			}
		}	
	}
}