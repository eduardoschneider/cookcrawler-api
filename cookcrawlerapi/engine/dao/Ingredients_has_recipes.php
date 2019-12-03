<?php
    namespace engine\dao;
   		
    class Ingredients_has_recipes implements \JsonSerializable {

		private $idingredients;
		private $idrecipes;
		private $qtd;

		public function getKeys() {
			return [
				'idingredients' =>$this->getIdingredients(),
				'idrecipes' =>$this->getIdrecipes()
			];
		}

		public function jsonSerialize() {
			return [
				'idingredients' =>$this->getIdingredients(),
				'idrecipes' =>$this->getIdrecipes(),
				'qtd' =>$this->getQtd()
			];
		}
			
		//IDINGREDIENTS
		function getIdingredients() {
			return $this->idingredients;
		}
		function setIdingredients($idingredients) {
			return $this->idingredients = $idingredients;
		}
		
		//IDRECIPES
		function getIdrecipes() {
			return $this->idrecipes;
		}
		function setIdrecipes($idrecipes) {
			return $this->idrecipes = $idrecipes;
		}
		
		//QTD
		function getQtd() {
			return $this->qtd;
		}
		function setQtd($qtd) {
			return $this->qtd = $qtd;
		}
		
	}
?>