$(document).ready(function() {
	$('[data-name="detail_list"] input.detail[type=checkbox]').change(function() {
		var $this = $(this);
		var $detailCheckbox=$('[data-detail_id="'+$this.data('detail_id')+'"]');
		var $elementCheckbox=$detailCheckbox
							.parents('ul[data-name="element_list"] > li[data-name="element_list_li"]')
							.children('input[data-name="element_list_item"]');
		if($this.is(':checked')){
			$elementCheckbox.attr('checked', true);
			$this.next('label').next('[data-name="attribute_list_item"]').show('fast');
		}
		else{
			$this.next('label').next('[data-name="attribute_list_item"]').hide('slow');
		}
		
		$.post(
			uriBase + 'admin/model/change_detail_status', {
				'detail_id': $this.data('detail_id'),
				'model_id': $this.data('model_id'),
				'status': $this.is(':checked') ? 1 : 0
			}
		);
	});
});
