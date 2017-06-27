$(document).ready(function() {
	var $elementList = $('#element_list');
	// Checkbox synchronization
	$('#element_list input.element[type=checkbox]').change(function() {
		var $this = $(this);
		if($this.is(':checked')){
			$('[data-element_id="'+$this.data('element_id')+'"]').show();
			$('#element_list input.detail[type=checkbox]').attr('checked', false);
		}
		else{
			$('[data-element_id="'+$this.data('element_id')+'"]').hide();
		}
		
		$.post(
			uriBase + 'admin/model/change_element_status', {
				'element_id': $this.data('element_id'),
				'model_id': $elementList.data('model_id'),
				'status': $this.is(':checked') ? 1 : 0
			}
		);
	});
});
