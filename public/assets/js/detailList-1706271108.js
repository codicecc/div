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
		console.log($detailCheckbox.parents('ul[data-name="element_list"]'));
		
		console.log($detailCheckbox.parents('ul[data-name="element_list"] > li[data-name="element_list_li"]').children('input[data-name="element_list_item"]').data('element_id'));
		console.log($detailCheckbox.parents('ul[data-name="element_list"] > li[data-name="element_list_li"]').children('input').data('element_id')
		);
						/*
						.map(function() {
							//return this.data('name');
							return this.tagName;
						})
						.get()
						.join( ", " ));
						*/
		
	});
});
