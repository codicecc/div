$(document).ready(function() {
	var $elementList = $('#element_list');
	// Checkbox synchronization
	$('#element_list .element_list_item input[type=checkbox]').change(function() {
		var $this = $(this);
		$.post(
			uriBase + 'admin/model/change_element_status', {
				'element_id': $this.data('element_id'),
				'model_id': $elementList.data('model_id'),
				'status': $this.is(':checked') ? 1 : 0
			}
		);
	});
});
