$(document).ready(function() {
	$('[data-id="order-model-toggle"],[data-id="order-model-toggle-container"]').on("click",function() {
		var $obj=$('[data-id="order-model"]');
		var $icon=$('[data-id="order-model-toggle"]');
		if($obj.is(":visible")){
			$icon.removeClass('fa-chevron-down');
			$icon.addClass('fa fa-chevron-right');
			$obj.hide('fast');
		}
		else{
			$icon.removeClass('fa-chevron-right');
			$icon.addClass('fa fa-chevron-down');
			$obj.show('fast');
		};
	});
	function status($id){
		return $id.is(":visible");
	}
});
