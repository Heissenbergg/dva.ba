<?php

class User{
	private $_pdo, $_query,$_username, $_password;
	public function __construct($mail = null){
		$this->_pdo = DB::getInstance();
		$this->_query = $this->_pdo -> query("users");
		if($mail){
        	while($user = $this->_query -> fetch()){
        		if($user['mail'] == $mail){
        			$this->_mail = $user['mail'];
        			$examp = explode("@", $this->_mail);
        			$this->_username = $examp[0];
        			$this->_category = $user['category'];
        		}
        	}
		}else{

		}
	}
	public function username(){return $this->_username;}
	public function category(){return $this->_category;}
	public function isadmin(){if($this->_category == 5) return true; return false;}
	public function register($mail, $password, $safeword, $category){
		//category : 0 - no access ; 1 - paypal access ; 2 - company access ; 3 - premium access ; 5 - admin
		$register = "INSERT into `users` (`mail`, `password`, `safeword`, `category`) 
		             VALUES ('{$mail}', '{$password}', '{$safeword}', '{$category}') " ;
		$this->_pdo -> insert($register);
	}
	public function delete($id){
		$delete = "DELETE FROM `users` WHERE id = $id";
		$this->_pdo -> action($delete);
	}

	public function update($id, $value){
		 "UPDATE `events` SET `active` = 0 WHERE name = 'snow'";
		$update = "UPDATE `users` SET `category` = '{$value}' WHERE id = $id";
		$this->_pdo -> action($update);
	}

	public function login($mail, $password){
		$this->_query = $this->_pdo -> query("users");
		while($user = $this->_query-> fetch()){
			if($user['username'] == $mail and $user['password'] == $password){
				$this->_username = $mail;
				Session::setUsername($mail);
				Redirect::to('admin/');
			}
		} return false;
	}
}

