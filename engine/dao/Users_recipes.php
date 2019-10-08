<?php
    namespace engine\dao;
   		
    class Users_recipes implements \JsonSerializable {

		private $user_id;
		private $recipe_id;

		public function getKeys() {
			return [
				'user_id' =>$this->getUser_id(),
				'recipe_id' =>$this->getRecipe_id()
			];
		}

		public function jsonSerialize() {
			return [
				'user_id' =>$this->getUser_id(),
				'recipe_id' =>$this->getRecipe_id()
			];
		}
			
		//USER_ID
		function getUser_id() {
			return $this->user_id;
		}
		function setUser_id($user_id) {
			return $this->user_id = $user_id;
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