<?php
class Users extends Controller{
	// User registration and login controller
	protected function register(){
		// method for registering users
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function login(){
		// method for logging in
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}

	protected function logout(){
		// method for loggin out
		unset($_SESSION['is_logged_in']); // set after successful login
		unset($_SESSION['user_data']); // set after successful login
		session_destroy(); // make sure to destroy other sessions
		// Redirect
		header('Location: '.ROOT_URL);
	}
}