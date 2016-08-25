<?php
abstract class Model{
	// Parent Model Class
	// Setting Database connection, handler, and stmt preparations
	protected $dbh;
	protected $stmt;

	public function __construct(){
		// Inheriting from PDO class
		// Setting Connection
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
	}

	public function query($query){
		// Method for query preparation
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
		// Method for query parameters binding
		if (is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT; // For integer type
					break;
				case is_bool($value):
					$type - PDO::PARAM_BOOL; // For boolean type
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL; // For null type
					break;									 // Add more types if needed
				default:
					$type = PDO::PARAM_STR;	// default is set to string type				
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	
	public function execute(){
		// method for executing stmt
		return $this->stmt->execute();
	}
	public function lastInsertId(){
		// method to catch the database expansion
		$this->dbh->lastInsertId();
	}

	public function resultset(){
		// method for fetching multiple rows in assoc. array
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
		// method for fetching single row in assoc array
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount(){
		// method for detecting the modified actions
		// it can have some restrictions executing on MySQL older versions
		$this->execute();
		return $this->stmt->rowCount();
	}
}