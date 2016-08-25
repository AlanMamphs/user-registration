<?php
class ProfileModel extends Model{
	public function Index(){
		$reclimit = 5; // limit of profile items per page
		$page = $_GET['page']; // from url
		
		$this->query('SELECT * FROM profiles'); 
		$count = $this->rowCount(); // count all rows from select stmt
		$total = intval(($count-1)/$reclimit)+1; // total pages required
		$page = intval($page); // str to int

		if(empty($page) or $page < 0) $page = 1; // pages floor (1)
		  if($page > $total) $page = $total;     // pages ceiling (total)
		

		$start = $page*$reclimit-$reclimit; // display next part of posts 
 
		$this->query('SELECT * FROM profiles ORDER BY Created DESC LIMIT :start, :reclimit'); 

		$this->bind(':start', $start);
		$this->bind(':reclimit', $reclimit);

		$rows = $this->resultSet();
		$_SESSION['total'] = $total; // sending variable to sessions glb 
		
		return $rows;
	}

	public function view(){
		// action for viewing the profile information
		if($_SERVER['REQUEST_METHOD']==='GET' && $_SESSION['is_logged_in']){
			$username = $_GET['username'];
			$this->query('SELECT * FROM profiles WHERE username = :username');
			$this->bind(':username', $username);
			$row = $this->single();
			return $row;
		}
		else {
			header('Location: '.ROOT_URL.'users/login/username');
		}
		
	}

	public function edit(){
		// action for editing profile information 
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// post request handler
			// Sanity check
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			// Simple cryptography. More secure encryption is recommended
			$password = md5($post['password']);
			
			if($post['submit']){
				// if submit is clicked
				$username = $_GET['username'];
				$this->query('SELECT * FROM profiles WHERE username = :username');
				$this->bind(':username', $username);			
				$row = $this->single(); // fetching user's own profile

				// form input validation
				if($post['password'] == '' || $post['verify'] == ''|| $post['name'] == '' || $post['surname'] == '' || $post['country'] == ''){
					Messages::setMsg('Please Fill In All Fields', 'error');
					return;
				} 
				else if($post['password'] != $post['verify']){
					Messages::setMsg("Passwords doesn't match", 'error');
					return;
				} 
				else{
					$password = md5($post['password']); // make sure to use used encr
					$verify = $post['verify'];
					$name = $post['name'];
					$surname = $post['surname'];
					$country = $post['country'];
					// database querying end execution
					$this->query('UPDATE profiles SET password=:password, name=:name, surname=:surname, Country=:country WHERE username = :username'); 
					$this->bind(':username', $username);
					$this->bind(':password', $password);
					$this->bind(':name', $name);
					$this->bind(':surname', $surname);
					// $database->bind(':dateOfBirth	', $dateOfBirth	);
					$this->bind(':country', $country);

					$this->execute();
					header('Location: '.ROOT_URL.'profiles/view/'.$username);
				}
			}
		}

		$username = $_GET['username'];
		if($_SERVER['REQUEST_METHOD']==='GET' && $_SESSION['user_data']['username']=== $username){
			$this->query('SELECT * FROM profiles WHERE username = :username');
			$this->bind(':username', $username);
			$row = $this->single();
			if ($row){
				return $row;
			}
			else {
				header('Location: '.ROOT_URL.'profiles/1'); //redirect to 1 page
			}
		}	
		else{
			header('Location: '.ROOT_URL.'profiles/1'); //redirect to 1 page
		}
	}

	public function delete(){
		// Action for deleting profile
		// The request is using the POST method
		if ($_SESSION['is_logged_in'])
		{
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$username = $_GET['username'];
			if($_SERVER['REQUEST_METHOD']==='GET' && $_SESSION['user_data']['username']=== $username){
				$this->query('SELECT * from profiles WHERE username = :username');
				$this->bind(':username', $username);
				$row = $this->single();
			  return $row;
			}
			else{
				header('Location: '.ROOT_URL.'profiles/1');

			}
			if($post['submit']){
				$username = $_GET['username'];
				$this->query('DELETE from profiles WHERE username = :username');
				$this->bind(':username', $username);
				$row = $this->single();
				if ($row){
				  header('Location: '.ROOT_URL.'profiles/1'); // redirect 
				  unset($_SESSION['user_data']); // unsetting sessions
				  unset($_SESSION['is_logged_in']); // unsetting sessions
				}
			}
		}
	}
				
}

