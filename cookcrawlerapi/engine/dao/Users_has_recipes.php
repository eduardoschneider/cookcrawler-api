<?php
    namespace engine\dao;
   		
    class Users_has_recipes implements \JsonSerializable {

		private $idusers;
		private $idrecipes;

		public function getKeys() {
			return [
				'idusers' =>$this->getIdusers(),
				'idrecipes' =>$this->getIdrecipes()
			];
		}

		public function jsonSerialize() {
			return [
				'idusers' =>$this->getIdusers(),
				'idrecipes' =>$this->getIdrecipes()
			];
		}
			
		//IDUSERS
		function getIdusers() {
			return $this->idusers;
		}
		function setIdusers($idusers) {
			return $this->idusers = $idusers;
		}
		
		//IDRECIPES
		function getIdrecipes() {
			return $this->idrecipes;
		}
		function setIdrecipes($idrecipes) {
			return $this->idrecipes = $idrecipes;
		}
		
	}
?>