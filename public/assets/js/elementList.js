$(document).ready(function() {
	$('#element_list input.element[type=checkbox]').change(function() {
		var $this = $(this);
		var $elementDetailList=$('[data-element_id="'+$this.data('element_id')+'"]').next().next();
		if($this.is(':checked')){
			$elementDetailList.show('slow');
		}
		else{
			$elementDetailList
				.children().children('input')
				.each(function(){
					console.log(this.tagName)
					$(this).attr('checked',false)
				});
			$elementDetailList.hide('slow');		
		}

		$.post(
			uriBase + 'admin/model/change_element_status', {
				'element_id': $this.data('element_id'),
				'model_id': $this.data('model_id'),
				'status': $this.is(':checked') ? 1 : 0
			}
		);

	});
});
