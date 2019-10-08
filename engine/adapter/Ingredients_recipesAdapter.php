<?php
namespace engine\adapter;
use engine\dao\Ingredients_recipes;
use engine\utils\FilterWhere;

class Ingredients_recipesAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listIngredients_recipes = $this->connection->getAll("ingredients_recipes", $where, $orderColun, $order, $page, $sizePage);        
        $listIngredients_recipesResult = Array(); 
    	
    	foreach ($listIngredients_recipes as $result){
            $ingredients_recipes = new Ingredients_recipes();            
         
           if($result['ingredient_id'] != null){
                //INGREDIENT_ID
                $ingredientsAdapter = new IngredientsAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idingredients');
                $filter->setValue($result['ingredient_id']);
                $list = Array($filter);                


                $resultIngredients = $ingredientsAdapter->getAll($list, "", "", 0, 0);
            	$ingredients_recipes->setIngredient_id($resultIngredients[0]);
                
           }

           if($result['recipe_id'] != null){
                //RECIPE_ID
                $recipesAdapter = new RecipesAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idrecipes');
                $filter->setValue($result['recipe_id']);
                $list = Array($filter);                


                $resultRecipes = $recipesAdapter->getAll($list, "", "", 0, 0);
            	$ingredients_recipes->setRecipe_id($resultRecipes[0]);
                
           }

            $listIngredients_recipesResult[] = $ingredients_recipes;
        }

        return $listIngredients_recipesResult;
    }

    /**
     * Create
     */
    public function create($ingredients_recipes) {
        return $this->connection->merge($ingredients_recipes);        
    }

    /**
     * Delete
     */
    public function delete($ingredients_recipes){
         return $this->connection->delete($ingredients_recipes);
    }
}
?>