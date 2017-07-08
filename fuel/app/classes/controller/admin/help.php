<?php
class Controller_Admin_Help extends Controller_Admin{

	public function action_index(){
		
		list($driver, $userid) = Auth::get_user_id();
		$user=Model_User::find($userid);

		$view = View::forge('admin/help/'.Arr::get(unserialize(html_entity_decode($user->profile_fields)),"lang").'/index');
		
		$this->template->title = "Help";
		$this->template->content = $view;

	}
}
?>
