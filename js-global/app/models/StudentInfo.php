<?php
class StudentInfo extends Eloquent{
	protected $table = 'student_info';
	protected $fillable = array('name', 'address', 'student_info', 'student_img', 'mobile', 'email', 'visa_type', 'status', 'countryid', 'sub_institutionid');
};