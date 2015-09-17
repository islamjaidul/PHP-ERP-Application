<?php
class CoverLetterController extends BaseController{
	public function getCoverLetter(){
		$data['rows'] = CoverLetter::join('student_info', 'cover_letter.student_infoid', '=', 'student_info.id')
						->select('student_info.name', 'cover_letter.id', 'cover_letter.attachment1', 'cover_letter.attachment2', 'cover_letter.attachment3', 'cover_letter.attachment4')
						->orderBy('name')
						->get();
					
		return View::make('module.students.include.coverletter', $data);
	}
	
	public function getNewCoverLetter(){
		$data['rows'] = StudentInfo::get();
		return View::make('module.students.include.newcoverletter', $data);
	}
	
	public function postNewCoverLetter(){
		$validator = Validator::make(Input::all(), array(
			'name' 			=> 'Required|not_in:0',
			'attachment1'	=> 'Required'
		));
		if($validator -> fails())
		{
			return Redirect::route('get_new_coverletter')
					->withErrors($validator);
		}
		else
		{
			$file1 = Input::file('attachment1');
			$filename1 = Str::random(20).'.'.$file1 -> getClientOriginalExtension();
			$destinationPath = 'attachment/';
			$file1 -> move($destinationPath, $filename1);
			
			if(Input::file('attachment2') != '')
			{
				$file2 = Input::file('attachment2');
				$filename2 = Str::random(20).'.'.$file2 -> getClientOriginalExtension();
				$destinationPath = 'attachment/';
				$file2 -> move($destinationPath, $filename2);
			}
			else
			{
				$filename2 = 'empty';
			}
			
			if(Input::file('attachment3') != '')
			{
				$file3 = Input::file('attachment3');
				$filename3 = Str::random(20).'.'.$file3 -> getClientOriginalExtension();
				$destinationPath = 'attachment/';
				$file3 -> move($destinationPath, $filename3);
			}
			else
			{
				$filename3 = 'empty';
			}	
			
			if(Input::file('attachment4') != '')
			{
				$file4 = Input::file('attachment4');
				$filename4 = Str::random(20).'.'.$file4 -> getClientOriginalExtension();
				$destinationPath = 'attachment/';
				$file4 -> move($destinationPath, $filename4);
			}
			else
			{
				$filename4 = 'empty';
			}	
			

			$coverletter = CoverLetter::create(array(
				'student_infoid' => Input::get('name'),
				'attachment1' => $filename1,
				'attachment2' => $filename2,
				'attachment3' => $filename3,
				'attachment4' => $filename4
			));
			
			if($coverletter)
			{
				return Redirect::route('get_new_coverletter')
						->with('global', 'Successfully Uploaded');
			}
		}
	}
	
	//Delete
	public function getDeleteAllCoverletter(){
		$id = Input::get('id');
		$filename = Input::get('delete_attachment');
		$filename1 = Input::get('delete_attachment1');
		$filename2 = Input::get('delete_attachment2');
		$filename3 = Input::get('delete_attachment3');
		$delete = CoverLetter::destroy($id);
			if($filename != '')
			{
				foreach($filename as $filename)
				{
						File::delete('attachment/'.$filename);
					
				}
			}
			
			if($filename1 != '')
			{
				foreach($filename1 as $filename1)
				{
				
		 			File::delete('attachment/'.$filename1);
				
				}
			}
			
			if($filename2 != '')
			{
				foreach($filename2 as $filename2)
				{
				
		 			File::delete('attachment/'.$filename2);
				
				}
			}
			
			if($filename3 != '')
			{
				foreach($filename3 as $filename3)
				{
				
		 			File::delete('attachment/'.$filename3);
				
				}
			}
			
		 return Redirect::route('get_coverletter')
		 			->with('global', 'Successfully Deleted');	
				
	}
	
	public function getDeleteCoverletter($id, $attachment1, $attachment2, $attachment3, $attachment4){
		$id = $id;
		$filename = $attachment1;
		$filename1 = $attachment2;
		$filename2 = $attachment3;
		$filename3 = $attachment4;
		$delete = CoverLetter::find($id)->delete();
		if($filename != 'empty')
		{
			File::delete('attachment/'.$filename);
		}
		
		if($filename1 != 'empty')
		{
			File::delete('attachment/'.$filename1);
		}
		
		if($filename2 != 'empty')
		{
			File::delete('attachment/'.$filename2);
		}
		
		if($filename3 != 'empty')
		{
			File::delete('attachment/'.$filename3);
		}
		
		return Redirect::route('get_coverletter')
		 			->with('global', 'Successfully Deleted');	
	}
	
	//View
	public function postViewCoverletter(){
		$id = Input::get('id');
		$data = DB::select(DB::raw('select c.*, si.id, si.name, si.student_img from cover_letter as c, student_info as si where c.student_infoid = si.id and c.id ='.$id));
	
			
			foreach($data as $row)
			{
				print '<img  style="border-radius:5px" src="'.asset('upload').'/'.$row->student_img.'" width="150" height="150"><br/>';
				
				print '<h3>Name: '.$row->name.'</h3>';
				
				print '<a href="'.asset('attachment').'/'.$row->attachment1.'">Attachment-1</a><br/>';
				if($row->attachment2 != 'empty')
				{
				print '<a href="'.asset('attachment').'/'.$row->attachment2.'">Attachment-2</a><br/>';
				}
				if($row->attachment3 != 'empty')
				{
				print '<a href="'.asset('attachment').'/'.$row->attachment3.'">Attachment-3</a></br>';
				}
				if($row->attachment4!= 'empty')
				{
				print '<a href="'.asset('attachment').'/'.$row->attachment4.'">Attachment-4</a>';
				}
				
			}
		
	}
	
}