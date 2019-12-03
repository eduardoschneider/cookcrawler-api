<?php
    namespace engine\dao;
   		
    class Recipes implements \JsonSerializable {

		private $idrecipes;
		private $recipe_name;
		private $recipe_description;
		private $calorific_value_kcal;
		private $money_saved;
		private $points;

		public function getKeys() {
			return [
				'idrecipes' =>$this->getIdrecipes()
			];
		}

		public function jsonSerialize() {
			return [
				'idrecipes' =>$this->getIdrecipes(),
				'recipe_name' =>$this->getRecipe_name(),
				'recipe_description' =>$this->getRecipe_description(),
				'calorific_value_kcal' =>$this->getCalorific_value_kcal(),
				'money_saved' =>$this->getMoney_saved(),
				'points' =>$this->getPoints()
			];
		}
			
		//IDRECIPES
		function getIdrecipes() {
			return $this->idrecipes;
		}
		function setIdrecipes($idrecipes) {
			return $this->idrecipes = $idrecipes;
		}
		
		//RECIPE_NAME
		function getRecipe_name() {
			return $this->recipe_name;
		}
		function setRecipe_name($recipe_name) {
			return $this->recipe_name = $recipe_name;
		}
		
		//RECIPE_DESCRIPTION
		function getRecipe_description() {
			return $this->recipe_description;
		}
		function setRecipe_description($recipe_description) {
			return $this->recipe_description = $recipe_description;
		}
		
		//CALORIFIC_VALUE_KCAL
		function getCalorific_value_kcal() {
			return $this->calorific_value_kcal;
		}
		function setCalorific_value_kcal($calorific_value_kcal) {
			return $this->calorific_value_kcal = $calorific_value_kcal;
		}
		
		//MONEY_SAVED
		function getMoney_saved() {
			return $this->money_saved;
		}
		function setMoney_saved($money_saved) {
			return $this->money_saved = $money_saved;
		}
		
		//POINTS
		function getPoints() {
			return $this->points;
		}
		function setPoints($points) {
			return $this->points = $points;
		}
		
	}
?>