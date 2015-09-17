<script>
$(document).ready(function(){
	
	$("a[data-toggle=modal]").click(function(){
		var id = $(this).attr('id');
		$.post("{{asset('ajax/edit_subinstitute.php')}}", {id: id}, function(data){
			$("#form").html(data);
		});
	});
	
	$("a[data-toggle=modal]").click(function(){
		var id = $(this).attr('id');
		var instituteid = $(this).prop('name');
		$.post("{{asset('ajax/edit_subinstitution2.php')}}", {id: id, instituteid: instituteid}, function(msg){
			$("#institute").html(msg);
		});
		
	});
	
})
</script>
 
<div class="modal fade" id="confirm-edit"> 
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                </div>
            
                <div class="modal-body">
				
					<form method="post" action="{{ URL::route('post_edit_subinstitute') }}">							 					<div id="form"></div>
                   <select name="institute" id="institute" class="form-control">
				   
				   </select>
                </div>
                
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value="Update">
					{{ Form::token() }}
					</form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
