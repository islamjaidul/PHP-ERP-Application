<?php
//Login
Route::get('/', array(
	'as' => 'get_login',
	'uses' => 'AccountController@getLogin'
));

Route::post('/login', array(
		'as' => 'post_login',
		'before' => 'csrf',
		'uses' => 'AccountController@postLogin'
));

Route::get('/logout', array(
	'as' => 'get_logout',
	'uses' => 'AccountController@getLogout'
));

//Setting
Route::get('/setting', array(
	'as' => 'get_setting',
	'uses' => 'AccountController@getSetting'
));

Route::post('/setting', array(
	'as' => 'post_change_password',
	'uses' => 'AccountController@postChangePassword'
));



//Module Start
Route::group(array('before' => 'auth'), function(){
      

	Route::get('/module', array(
	'as' => 'get_module',
	'uses' => 'AccountController@getModule'
	));
	
	Route::get('/students', array(
	'as' => 'get_student',
	'uses' => 'StudentController@getStudent'
	));

	//Country
	Route::get('/students/country', array(
	'as' => 'get_country',
	'uses' => 'CountryController@getCountry'
	));
	
	Route::get('/students/country/new', array(
	'as' => 'get_new_country',
	'uses' => 'CountryController@getNewCountry'
	));
	
	Route::post('/students/country/new', array(
	'as' => 'post_new_country',
	'before' => 'csrf',
	'uses' => 'CountryController@postNewCountry'
	));
		//Export
	Route::get('/students/country/export/csv', array(
	'as' => 'get_export_csv_country',
	'uses' => 'CountryController@getExportCsvCountry'
	));
	
	Route::get('/students/country/export/pdf', array(
	'as' => 'get_export_pdf_country',
	'uses' => 'CountryController@getExportPdfCountry'
	));
		//Delete
	Route::get('/students/country/delete-selcted', array(
	'as' => 'get_delete_all_country',
	'uses' => 'CountryController@getDeleteAllCountry'
	));
		
	Route::get('/students/country/delete/{id}', array(
	'as' => 'get_delete_country',
	'uses' => 'CountryController@getDeleteCountry'
	));
		//Edit
	/*Route::get('/students/country/edit/{id}', array(
	'as' => 'get_edit_country',
	'uses' => 'CountryController@getEditCountry'
	));*/
	
	Route::post('/students/country/edit/', array(
	'as' => 'post_edit_country',
	'before' => 'csrf',
	'uses' => 'CountryController@postEditCountry'
	));
	
	//Institute
	Route::get('/students/institute', array(
	'as' => 'get_institute',
	'uses' => 'InstituteController@getInstitute'
	));
	
	Route::get('/students/institute/new', array(
	'as' => 'get_new_institute',
	'uses' => 'InstituteController@getNewInstitute'
	));
	
	Route::post('/students/institute/new', array(
	'as' => 'post_new_institute',
	'before' => 'csrf',
	'uses' => 'InstituteController@postNewInstitute'
	));
	
	//Export
	Route::get('/students/institute/export/csv', array(
	'as' => 'get_export_csv_institute',
	'uses' => 'InstituteController@getExportCsvInstitute'
	));
	
	Route::get('/students/institute/export/pdf', array(
	'as' => 'get_export_pdf_institute',
	'uses' => 'InstituteController@getExportPdfInstitute'
	));
		//Delete
	Route::get('/students/institute/delete-selected', array(
	'as' => 'get_delete_selected_institute',
	'uses' => 'InstituteController@getDeleteSelectedInstitute'
	));
	
	Route::get('/students/institute/delete/{id}', array(
	'as' => 'get_delete_institute',
	'uses' => 'InstituteController@getDeleteInstitute'
	));
	
		//Edit	
	Route::post('/students/institute/edit', array(
	'as' => 'post_edit_institute',
	'uses' => 'InstituteController@postEditInstitute'
	));
	
	//Sub Institute
	Route::get('/students/sub-institute', array(
	'as' => 'get_sub_institute',
	'uses' => 'SubInstituteController@getSubInstitute'
	));
	
	Route::get('/students/sub-institute/new', array(
	'as' => 'get_new_subinstitute',
	'uses' => 'SubInstituteController@getNewSubInstitute'
	));
	
	Route::post('/students/sub-institute/new', array(
	'as' => 'post_new_subinstitute',
	'before' => 'csrf',
	'uses' => 'SubInstituteController@postNewSubInstitute'
	));
	
	//Export
	Route::get('/students/sub-institute/export/csv', array(
	'as' => 'get_export_csv_subinstitute',
	'uses' => 'SubInstituteController@getExportCsvSubinstitute'
	));
	
	Route::get('/students/sub-institute/export/pdf', array(
	'as' => 'get_export_pdf_subinstitute',
	'uses' => 'SubInstituteController@getExportPdfSubinstitute'
	));
		//Delete
	Route::get('/students/sub-institute/delete-selected', array(
	'as' => 'get_delete_selected_subinstitute',
	'uses' => 'SubInstituteController@getDeleteSelectedSubInstitute'
	));	
	
	Route::get('/students/sub-institute/delete/{id}', array(
	'as' => 'get_delete_subinstitute',
	'uses' => 'SubInstituteController@getDeleteSubInstitute'
	));	
	
		//Edit
	Route::post('/students/sub-institute/edit', array(
	'as' => 'post_edit_subinstitute',
	'uses' => 'SubInstituteController@postEditSubInstitute'
	));	
	
	//Student Info
	Route::get('/students/student-info', array(
	'as' => 'get_studentinfo',
	'uses' => 'StudentInfoController@getStudentInfo'
	));
	
	Route::get('/students/student-info/new', array(
	'as' => 'get_new_studentinfo',
	'uses' => 'StudentInfoController@getNewStudentInfo'
	));
	
	Route::post('/students/student-info/new', array(
	'as' => 'post_new_studentinfo',
	'before' => 'csrf',
	'uses' => 'StudentInfoController@postNewStudentInfo'
	));
	
	//Export
	Route::get('/students/student-info/export/csv', array(
	'as' => 'get_export_csv_studentinfo',
	'uses' => 'StudentInfoController@getExportCsvStudentinfo'
	));
	
	Route::get('/students/student-info/export/pdf', array(
	'as' => 'get_export_pdf_studentinfo',
	'uses' => 'StudentInfoController@getExportPdfStudentinfo'
	));
	
		//Delete
	Route::get('/students/student-info/delete-selected', array(
	'as' => 'get_delete_selected_studentinfo',
	'uses' => 'StudentInfoController@getDeleteSelectedStudentInfo'
	));	
	
	Route::get('/students/student-info/delete/{id}/{img}', array(
	'as' => 'get_delete_studentinfo',
	'uses' => 'StudentInfoController@getDeleteStudentInfo'
	));	
		//View
	Route::get('/students/student-info/view', array(
	'as' => 'get_studentinfo_view',
	'uses' => 'StudentInfoController@getStudentInfoView'
	));	
		//Edit
	Route::post('/students/student-info/edit', array(
	'as' => 'post_edit_studentinfo',
	'before' => 'csrf',
	'uses' => 'StudentInfoController@postEditStudentInfo'
	));	
	
	//Report
	Route::get('/students/report/student', array(
	'as' => 'get_report_student',
	'uses' => 'ReportController@getReportStudent'
	));
	
	Route::get('/students/report/student/piechart', array(
	'as' => 'get_report_piechart',
	'uses' => 'ReportController@getReportPiechart'
	));	
	
	//Cover letter
	Route::get('/students/cover-letter', array(
	'as' => 'get_coverletter',
	'uses' => 'CoverLetterController@getCoverLetter'
	));	
	
	Route::get('/students/cover-letter/new', array(
	'as' => 'get_new_coverletter',
	'uses' => 'CoverLetterController@getNewCoverLetter'
	));	
	
	Route::post('/students/cover-letter/new', array(
	'as' => 'post_new_coverletter',
	'before' => 'csrf',
	'uses' => 'CoverLetterController@postNewCoverLetter'
	));	
	
		//Delete
	Route::get('/students/cover-letter/delete-selcted', array(
	'as' => 'get_delete_all_coverletter',
	'uses' => 'CoverLetterController@getDeleteAllCoverletter'
	));
	
	Route::get('/students/cover-letter/delete/{id}/{attachment1}/{attachment2}/{attachment3}/{attachment4}', array(
	'as' => 'get_delete_coverletter',
	'uses' => 'CoverLetterController@getDeleteCoverletter'
	));	
	
	Route::post('/students/cover-letter/view', array(
	'as' => 'post_view_coverletter',
	'uses' => 'CoverLetterController@postViewCoverletter'
	));	
	
});


