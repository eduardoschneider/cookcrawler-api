<?php
    namespace engine\dao;
   		
    class Users implements \JsonSerializable {

		private $id;
		private $name;
		private $age;
		private $email;
		private $password;
		private $points;
		private $money_saved;

		public function getKeys() {
			return [
				'id' =>$this->getId()
			];
		}

		public function jsonSerialize() {
			return [
				'id' =>$this->getId(),
				'name' =>$this->getName(),
				'age' =>$this->getAge(),
				'email' =>$this->getEmail(),
				'password' =>$this->getPassword(),
				'points' =>$this->getPoints(),
				'money_saved' =>$this->getMoney_saved()
			];
		}
			
		//ID
		function getId() {
			return $this->id;
		}
		function setId($id) {
			return $this->id = $id;
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
		
		//POINTS
		function getPoints() {
			return $this->points;
		}
		function setPoints($points) {
			return $this->points = $points;
		}
		
		//MONEY_SAVED
		function getMoney_saved() {
			return $this->money_saved;
		}
		function setMoney_saved($money_saved) {
			return $this->money_saved = $money_saved;
		}
		
	}
?>