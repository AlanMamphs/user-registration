<?php
abstract class Controller{
	/// Abstract Controller Class
	protected $request;
	protected $action;

	public function __construct($action, $request){
		/// Stores the variables 
		$this->action = $action;
		$this->request= $request;
	}

	public function executeAction(){
		/// Executes Controllers' Action
		return $this->{$this->action}();
	}

	public function returnView($viewmodel, $fullView){
		/// Returns Views for related Controllers and Actions
		$view = 'views/'.get_class($this).'/'.$this->action.'.php';

		if($fullView){
			require('views/main.php'); // Navbar
		}
		else{
			require($view); // Actions Methods Views
		}
	}
}