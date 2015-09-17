<?php
class CoverLetter extends Eloquent{
	protected $table = 'cover_letter';
	protected $fillable = array('attachment1', 'attachment2', 'attachment3', 'attachment4', 'student_infoid');
}