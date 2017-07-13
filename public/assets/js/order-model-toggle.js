$(document).ready(function() {
	$('[data-id="order-model-toggle"],[data-id="order-model-toggle-container"]').on("click",function() {
		var $obj=$('[data-id="order-model"]');
		var $icon=$('[data-id="order-model-toggle"]');
		if($obj.is(":visible")){
			$icon.removeClass('fa fa-ellipsis-v');
			$icon.addClass('fa fa-ellipsis-h');
			$obj.hide('fast');
		}
		else{
			$icon.removeClass('fa fa-ellipsis-h');
			$icon.addClass('fa fa-ellipsis-v');
			$obj.show('fast');
		};
	});
	function status($id){
		return $id.is(":visible");
	}
});
