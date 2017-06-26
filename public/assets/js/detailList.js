$(document).ready(function() {
	var $elementList = $('#element_list');
	// Checkbox synchronization
	$('#element_list input.detail[type=checkbox]').change(function() {
		var $this = $(this);
		
		if($this.is(':checked')){
			$('#'+$this.parents('li.element_list_item').attr('id')+'  input.element[type=checkbox]').attr('checked', true);
			//$this.parents('li.element_list_item').attr('checked', true);
		}
		else{
		}

		$.post(
			uriBase + 'admin/model/change_detail_status', {
				'detail_id': $this.data('detail_id'),
				'model_id': $elementList.data('model_id'),
				'status': $this.is(':checked') ? 1 : 0
			}
		);
	});
});
