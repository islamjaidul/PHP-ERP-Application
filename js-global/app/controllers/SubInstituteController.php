<?php
class SubInstituteController extends BaseController{
	public function getSubInstitute(){
		$data['rows'] = SubInstitute::join('institution', 'sub_institution.institutionid', '=', 'institution.id')
		->select('sub_institution.id as id', 'sub_institution.name as subinstitute',  'institution.id as instituteid', 'institution.name as institute')
		->orderBy('subinstitute')
		->get();
		return View::make('module.students.include.subinstitute', $data);
	}
	
	public function getNewSubInstitute(){
		$data['rows'] = Institute::get();
		return View::make('module.students.include.newsubinstitute', $data);
	}
	
	public function postNewSubInstitute(){
		$validator = Validator::make(Input::all(), array(
					'name' => 'Required|max:30|unique:sub_institution',
					'institute' => 'integer'
		));
		if($validator -> fails())
		{
			return Redirect::route('get_new_subinstitute')
					->withErrors($validator);
		}
		else
		{
			$subinstitute = SubInstitute::create(array(
					'name' => Input::get('name'),
					'institutionid' => Input::get('institute')
			));
			if($subinstitute)
			{
				return Redirect::route('get_new_subinstitute')
					->with('global', 'New Sub Institute Name Saved Successfully');
			}
		}
	}
	
	//Export CSV
	public function getExportCsvSubinstitute(){
		$table = SubInstitute::join('institution', 'sub_institution.institutionid', '=', 'institution.id')
		->select('sub_institution.id as id', 'sub_institution.name as subinstitute',  'sub_institution.created_at as created_at','institution.name as institute')
		->orderBy('subinstitute')
		->get();
		
    	$filename = "category.csv";
    	$handle = fopen($filename, 'w+');
    	fputcsv($handle, array('Sub Institute Name', 'Category', 'Created at'));

    	foreach($table as $row) {
        fputcsv($handle, array($row['subinstitute'], $row['institute'], $row['created_at']));
    	}

    	fclose($handle);

    	$headers = array(
        'Content-Type' => 'text/csv',
    	);

   		 return Response::download($filename, 'category.csv', $headers);
	}
	
	//Export PDF
	
	public function getExportPdfSubinstitute(){
		$data = SubInstitute::join('institution', 'sub_institution.institutionid', '=', 'institution.id')
		->select('sub_institution.id as id', 'sub_institution.name as subinstitute',  'sub_institution.created_at as created_at','institution.name as institute')
		->orderBy('subinstitute')
		->get();
		
		$name = '';
		$category = '';
		$date = '';
		foreach ($data as $row) {
			$name .= ("<p>".$row->subinstitute."</p>");
			$category .= ("<p>".$row->institute."</p>");
			$date .= ("<p>".$row->created_at."</p>");
		}
		$html = "<h1>JS-Global ERP</h1>";
		$html .= "<h3>Institute Data</h3>";
		$html .= "<table style='width:600px;margin-top:15px'>
					<tr style='background-color:gray;text-align:left'><th>Institute</th><th>Category</th><th>Created at</th></tr>
					<tr>
						<td style='background-color:skyblue'>".$name."</td>
						<td style='background-color:silver'>".$category."</td>
						<td style='background-color:orange'>".$date."</td>
					</tr>
				</table>";
		return PDF::load($html, 'A4', 'portrait')->download('institute');
				
	}
	
	//Delete
	public function getDeleteSelectedSubInstitute(){
		$id = Input::get('id');
		$delete = SubInstitute::destroy($id);
		if($delete)
		{
			return Redirect::route('get_sub_institute')
					->with('global', 'Successfully Deleted');
		}
	}
	
	public function getDeleteSubInstitute($id){
		$id = Crypt::decrypt($id);
		$delete = SubInstitute::find($id)->delete();
		if($delete)
		{
			return Redirect::route('get_sub_institute')
					->with('global', 'Successfully Deleted');
		}
	}
	
	//Edit
	public function postEditSubInstitute(){
		$validator = Validator::make(Input::all(), array(
					'name' => 'Required|max:30'
		));
		if($validator -> fails())
		{
			return Redirect::route('get_sub_institute')
					->withErrors($validator);
		}
		else
		{
			$id = Input::get('id');
			$update = SubInstitute::where('id', $id)->update(array(
				'name' => Input::get('name'),
				'institutionid' => Input::get('institute')
			));
			if($update)
			{
				return Redirect::route('get_sub_institute')
					->with('success', 'Updated Successfully');
			}
		}	
	}
}