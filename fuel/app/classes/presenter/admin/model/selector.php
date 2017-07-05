<?php
class Presenter_Admin_Model_Selector extends \Presenter{
	public function view(){
		$this->models = Model_Model::find('all');
	}
}
