@extends('module.students.layout.index')
@section('heading')
	Report
@Stop

@section('content')
	<div class="row">
		<div class="col-md-6">
		<div class="panel panel-default">
                        <div class="panel-heading">
                            Total Report
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
		</div>
	
		
		<div class="col-md-6">
			<table class="table table-striped">
				<tr><th>Name</th><th>Status</th></tr>
					@foreach($rows as $row)
					<tr>
					<td>{{{ $row -> name }}}</td>
					<td>{{{ status($row -> status) }}}</td>
					</tr>
					@endforeach
			</table>
		</div>
	<div>	
@stop	

@section('footer')
	<script>
	$(document).ready(function(){
		/*$.get("{{ URL::route("get_report_piechart") }}", function(data){
			$(".panel-body").html(data);
		});*/
		$(".panel-body").hide();
		$(".panel-body").load("{{ URL::route("get_report_piechart") }}").fadeIn(2000);
	});
	</script>
@stop