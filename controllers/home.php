<?php
class Home extends Controller{
	// Home page controller
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}