<?php
class Profiles extends Controller{
	// Profiles page controller
	protected function Index(){
		// method for index page
		$viewmodel = new ProfileModel();
		$this->returnView($viewmodel->Index(), true); 
	}

	protected function view(){
		// method for view profile page
		$viewmodel = new ProfileModel();
		$this->returnView($viewmodel->view(), true);
	}
	protected function edit(){
		// method for updating profile page
		$viewmodel = new ProfileModel();
		$this->returnView($viewmodel->edit(), true); 
	}

	protected function delete(){
		// method for deleting user's own profile
		$viewmodel = new ProfileModel();
		$this->returnView($viewmodel->delete(), true);
	}
	
}