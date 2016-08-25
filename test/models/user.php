<?php
class UserModel extends Model{
	public function register(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET'){
			// handling get request
			$username = $_GET['username'];
			if ($username !== 'new'){
				// redirect all request to new
				header('Location: '.ROOT_URL.'users/register/new');
			}
		}
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']); // encrypting. More advanced is recommended

		if($post['submit']){
			// handling post requests
			$username = $post['username'];
			$this->query('SELECT * FROM profiles WHERE username = :username');
			$this->bind(':username', $username);			
			$row = $this->single();

			// form validation management
			if($row){
				Messages::setMsg('This user already exists', 'error');
				return;
			} 
			else if($post['username'] == '' || $post['password'] == '' || $post['verify'] == ''|| $post['name'] == '' || $post['surname'] == '' || $post['country'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			} 
			else if($post['password'] != $post['verify']){
				Messages::setMsg("Passwords doesn't match", 'error');
				return;
			} 
			else{
				$username = $post['username'];
				$password = md5($post['password']);
				$verify = $post['verify'];
				$name = $post['name'];
				$surname = $post['surname'];
				// $dateOfBirth	 = $post['birthDate'];
				$country = $post['country'];

				$this->query('INSERT INTO profiles (username, password, name, surname, country) VALUES (:username, :password, :name, :surname, :country)');
				$this->bind(':username', $username);
				$this->bind(':password', $password);
				$this->bind(':name', $name);
				$this->bind(':surname', $surname);
				$this->bind(':country', $country);
				$this->execute();
			
				header('Location: '.ROOT_URL.'users/login/'.$username);
			}
		}
		return;
	}
	public function login(){
		// login action handler method
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$password = md5($post['password']); // more advanced encr. is recommended

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM profiles WHERE username = :username AND password = :password');
			$this->bind(':username', $post['username']);
			$this->bind(':password', $password);			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true; // setting Session is_logged_in 
				$_SESSION['user_data'] = array(   // setting Session user_data
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"username" => $row['username']	
				);
				header('Location: '.ROOT_URL.'profiles/1');
			} else {
				Messages::setMsg('Incorrect Login', 'error'); // Validation
			}
		}
		return;
	}
}