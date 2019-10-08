<?php
    namespace engine\dao;
   		
    class Users implements \JsonSerializable {

		private $idusers;
		private $name;
		private $age;
		private $email;
		private $password;

		public function getKeys() {
			return [
				'idusers' =>$this->getIdusers()
			];
		}

		public function jsonSerialize() {
			return [
				'idusers' =>$this->getIdusers(),
				'name' =>$this->getName(),
				'age' =>$this->getAge(),
				'email' =>$this->getEmail(),
				'password' =>$this->getPassword()
			];
		}
			
		//IDUSERS
		function getIdusers() {
			return $this->idusers;
		}
		function setIdusers($idusers) {
			return $this->idusers = $idusers;
		}
		
		//NAME
		function getName() {
			return $this->name;
		}
		function setName($name) {
			return $this->name = $name;
		}
		
		//AGE
		function getAge() {
			return $this->age;
		}
		function setAge($age) {
			return $this->age = $age;
		}
		
		//EMAIL
		function getEmail() {
			return $this->email;
		}
		function setEmail($email) {
			return $this->email = $email;
		}
		
		//PASSWORD
		function getPassword() {
			return $this->password;
		}
		function setPassword($password) {
			return $this->password = $password;
		}
		
	}
?>