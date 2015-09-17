<?php
class AccountController extends BaseController{
	public function getLogin(){
		return View::make('login');
	}
	
	public function postLogin(){
		$validator = Validator::make(Input::all(), array(
					'username' => 'Required',
					'password' => 'Required'
		));
		
		if($validator->fails())
		{
			//redirect to Login page
			return Redirect::route('get_login')
					->withErrors($validator);
					
		}
		else
		{
			$remember = Input::has('remember') ? true : false;
			$auth = Auth::attempt(array(
					'username' => Input::get('username'),
					'password' => Input::get('password'),
					'active' => 1
			), $remember);
			
			if($auth)
			{
				//Redirect to intendent page
				return Redirect::intended('/module');
			}
			else
			{
				return Redirect::route('get_login')
					->with('global', 'E-mail / Password wrong or Account not activated');
			}
		}
	}
	
	//Logout
	public function getLogout(){
		Auth::logout();
		return Redirect::route('get_login');
	}
	
	//Module
	public function getModule(){
		return View::make('module.module');
	}
	
	//Setting
	public function getSetting(){
		return View::make('module.students.include.setting');
	}
	
	public function postChangePassword(){
		if(Input::get('oldpass') == '')
		{
			print '<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Oldpassword is Required</span>';
		}
		else if(Input::get('newpass') == '')
		{
			print '<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Newpassword is Required</span>';
		}
		else if(Input::get('confirmpass') == '')
		{
			print '<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Confirm password is Required</span>';
		}
		else if(Input::get('newpass') != Input::get('confirmpass'))
		{
			print '<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Password is not matching</span>';
		}
		else
		{
			$user = User::find(Auth::user()->id);
			$old_pass = Input::get('oldpass');
			$new_pass = Input::get('newpass');
			
			if(Hash::check($old_pass, $user->getAuthPassword()))
			{
				$user->password = Hash::make($new_pass);
				if($user->save())
				{
					print '<span style="color:green"><i class="fa fa-check-square-o"></i> Password Change Successfully</span>';
				}
			}
			else
			{
				return 	'<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Your Old Password is Inconrrect</span>';
			}
		}
	}
}
?>