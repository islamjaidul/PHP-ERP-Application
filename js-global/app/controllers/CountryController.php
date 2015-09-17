<?php
class CountryController extends BaseController{
	public function getCountry(){
		$data['rows'] = Country::get();
		return View::make('module.students.include.country',$data);
	}
	
	public function getNewCountry(){
		return View::make('module.students.include.newcountry');
	}
	
	public function postNewCountry(){
		$validator = Validator::make(Input::all(), array(
						'name' => 'Required|max:30|unique:country'
		));
		
		if($validator->fails())
		{
			return Redirect::route('get_new_country')
						->withErrors($validator);
		}
		else
		{
			$country = Country::create(array(
					'name' => Input::get('name')
			));
			
			if($country)
			{
				return Redirect::route('get_new_country')
					->with('global', 'New Country Saved Successfully');
			}
		}
	}
	//Export CSV
	public function getExportCsvCountry(){
		$table = Country::all();
    	$filename = "country.csv";
    	$handle = fopen($filename, 'w+');
    	fputcsv($handle, array('Country Name', 'Created at'));

    	foreach($table as $row) {
        fputcsv($handle, array($row['name'], $row['created_at']));
    	}

    	fclose($handle);

    	$headers = array(
        'Content-Type' => 'text/csv',
    	);

   		 return Response::download($filename, 'country.csv', $headers);
	}
	
	//Export PDF
	
	public function getExportPdfCountry(){
		$data = Country::all();
		$name = '';
		$date = '';
		foreach ($data as $row) {
			$name .= ("<p>".$row->name."</p>");
			$date .= ("<p>".$row->created_at."</p>");
		}
		$html = "<h1>JS-Global ERP</h1>";
		$html .= "<h3>Country Data</h3>";
		$html .= "<table style='width:600px;margin-top:15px'>
					<tr style='background-color:gray;text-align:left'><th>Name</th><th>Created at</th></tr>
					<tr>
						<td style='background-color:skyblue'>".$name."</td>
						<td style='background-color:orange'>".$date."</td>
					</tr>
				</table>";
		return PDF::load($html, 'A4', 'portrait')->download('country');
				
	}
	
	//Delete Selected
	public function getDeleteAllCountry(){
		$id = Input::get('id');
		$delete = Country::destroy($id);
		if($delete)
		{
			return Redirect::route('get_country')
				->with('global', 'Successfully Deleted');
		}
	}
	//Delete
	public function getDeleteCountry($id){
		$id = Crypt::decrypt($id);
		$delete = Country::find($id)->delete();
		if($delete)
		{
			return Redirect::route('get_country')
				->with('global', 'Successfully Deleted');
		}
	}
	//Edit
	public function getEditCountry($id){
		return View::make('module.students.include.edit_country');
	}
	
	public function postEditCountry(){
		$validator = Validator::make(Input::all(), array(
					'name' => 'Required|max:30|unique:country'
		));
		if($validator -> fails())
		{
			return Redirect::route('get_country')
					->withErrors($validator);
		}
		else
		{
			$id = Input::get('id');
			$update = Country::where('id', $id)->update(array(
				'name' => Input::get('name')
			));
			if($update)
			{
				return Redirect::route('get_country')
					->with('success', 'Updated Successfully');
			}
		}	
	}
}
?>