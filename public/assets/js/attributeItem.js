$(document).ready(function() {
	/*
	 * Attribute
	 */
	$('[data-name="attribute_list_item"]').on( "click", function() {
		var $this = $(this);
		// Detail checkbox
		$this.prev('label').prev('input[data-name="detail_list_item"]').attr('checked',true);
		
		$.post(
			uriBase + 'admin/model/change_detail_status', {
				'detail_id': $this.data('detail_id'),
				'model_id': $this.data('model_id'),
				'status': 1
			}
		);
		var $elementCheckbox=$this
							.parents('ul[data-name="element_list"] > li[data-name="element_list_li"]')
							.children('input[data-name="element_list_item"]');
		$elementCheckbox.attr('checked',true);
	});
	$('[data-name="attribute_list_item"]').on( "blur", function() {
		var $this = $(this);
		console.log($this.val());
		// Save Attribute value
		$.post(
			uriBase + 'admin/attribute/save', {
				'name': $this.val(),
				'model_id': $this.data('model_id'),
				'detail_id': $this.data('detail_id'),
			}
		);
	});
});
