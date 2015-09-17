<div class="modal fade" id="confirm-edit"> 
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                </div>
            	<form id="form" method="post" action="{{ URL::route('post_edit_studentinfo') }}">
                <div id="studentinfo" class="modal-body">
				
					
                   
                </div>
				<div style="margin-top:-31px;" class="modal-body">
					<span id="country">
					
					</span>
				
					<span id="institute">
					
					</span>
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
