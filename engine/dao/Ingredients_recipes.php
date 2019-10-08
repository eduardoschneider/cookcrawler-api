<?php
    namespace engine\dao;
   		
    class Ingredients_recipes implements \JsonSerializable {

		private $ingredient_id;
		private $recipe_id;

		public function getKeys() {
			return [
				'ingredient_id' =>$this->getIngredient_id(),
				'recipe_id' =>$this->getRecipe_id()
			];
		}

		public function jsonSerialize() {
			return [
				'ingredient_id' =>$this->getIngredient_id(),
				'recipe_id' =>$this->getRecipe_id()
			];
		}
			
		//INGREDIENT_ID
		function getIngredient_id() {
			return $this->ingredient_id;
		}
		function setIngredient_id($ingredient_id) {
			return $this->ingredient_id = $ingredient_id;
		}
		
		//RECIPE_ID
		function getRecipe_id() {
			return $this->recipe_id;
		}
		function setRecipe_id($recipe_id) {
			return $this->recipe_id = $recipe_id;
		}
		
	}
?>