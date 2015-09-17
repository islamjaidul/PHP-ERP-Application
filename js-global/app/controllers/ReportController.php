<?php
class ReportController extends BaseController{
	public function getReportStudent(){
		$data['rows'] = StudentInfo::select('student_info.name', 'student_info.status')
						->orderBy('name')->get();
		function status($str){
			if($str == 1)
			{
				print '<span style="padding-left:25px; padding-right:23px;background-color:orange" class="label label-warning">Pending</span>';
			}
			else if($str == 2)
			{
				print '<span style="padding-left:15px; padding-right:14px;background-color:green" class="label label-success">Successfull</span>';
			}
			else
			{
				print '<span style="padding-left:22px; padding-right:22px;background-color:red" class="label label-danger">Rejected</span>';
			}
		}								
		return View::make('module.students.include.reportstudent', $data);
	}
	
	public function getReportPiechart(){
		$total = StudentInfo::get();
		$data = StudentInfo::get();
		$sum = 0;
		$successfull = 0;
		$pending = 0;
		$rejected = 0;
		
		foreach($total as $total)
		{
			$sum++;
		}
		foreach($data as $data)
		{
			if($data -> status == 1)
			{
				$pending++;
				$total_pending = ($pending * 100) / $sum;
				
			}
			if($data -> status == 2)
			{
				$successfull++;
				$total_successfull = ($successfull * 100) / $sum;
				
			}
			
			if($data -> status == 0)
			{
				$rejected++;
				$total_rejected = ($rejected * 100) / $sum;
				
			}
		}
		
                
		print 'Total Students: '.$sum;
		print '<br/>Pending: '.$pending;
		print '<br/>Successfull: '.$successfull;
		print '<br/>Rejected: '.$rejected;
                
		
		print '<br/><br/><span style="margin-right:19px">Pending in Percentage: </span><span style="color:white;background-color:orange; padding:3px">'.(int)$total_pending.' %</span>';
		print '<br/><span style="margin-right:0px">Successfull in Percentage: </span><span style="color:white;background-color:green; padding:3px">'.(int)$total_successfull.' %</span>';
		print '<br/><span style="margin-right:15px">Rejected in Percentage: </span><span style="color:white;background-color:red; padding:3px">'.(int)$total_rejected.' %</span>';
		
		
	}
}