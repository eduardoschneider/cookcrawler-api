<?php
    namespace engine\dao;
   		
    class Ingredients implements \JsonSerializable {

		private $idingredients;
		private $ingredient_name;
		private $ingredient_description;
		private $calorific_value_kcal;

		public function getKeys() {
			return [
				'idingredients' =>$this->getIdingredients()
			];
		}

		public function jsonSerialize() {
			return [
				'idingredients' =>$this->getIdingredients(),
				'ingredient_name' =>$this->getIngredient_name(),
				'ingredient_description' =>$this->getIngredient_description(),
				'calorific_value_kcal' =>$this->getCalorific_value_kcal()
			];
		}
			
		//IDINGREDIENTS
		function getIdingredients() {
			return $this->idingredients;
		}
		function setIdingredients($idingredients) {
			return $this->idingredients = $idingredients;
		}
		
		//INGREDIENT_NAME
		function getIngredient_name() {
			return $this->ingredient_name;
		}
		function setIngredient_name($ingredient_name) {
			return $this->ingredient_name = $ingredient_name;
		}
		
		//INGREDIENT_DESCRIPTION
		function getIngredient_description() {
			return $this->ingredient_description;
		}
		function setIngredient_description($ingredient_description) {
			return $this->ingredient_description = $ingredient_description;
		}
		
		//CALORIFIC_VALUE_KCAL
		function getCalorific_value_kcal() {
			return $this->calorific_value_kcal;
		}
		function setCalorific_value_kcal($calorific_value_kcal) {
			return $this->calorific_value_kcal = $calorific_value_kcal;
		}
		
	}
?>