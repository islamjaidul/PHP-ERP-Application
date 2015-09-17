<?php
class StudentController extends BaseController{
	public function getStudent(){
		return View::make('module.students.include.dashboard');
	}
}
?>