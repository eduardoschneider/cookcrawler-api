<?php
namespace engine\adapter;
use engine\dao\Recipes;
use engine\utils\FilterWhere;

class RecipesAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listRecipes = $this->connection->getAll("recipes", $where, $orderColun, $order, $page, $sizePage);        
        $listRecipesResult = Array(); 
    	
    	foreach ($listRecipes as $result){
            $recipes = new Recipes();            
         

            //IDRECIPES
            $recipes->setIdrecipes($result['idrecipes']);

            //RECIPE_NAME
            $recipes->setRecipe_name($result['recipe_name']);

            //RECIPE_DESCRIPTION
            $recipes->setRecipe_description($result['recipe_description']);

            //CALORIFIC_VALUE_KCAL
            $recipes->setCalorific_value_kcal($result['calorific_value_kcal']);

            //MONEY_SAVED
            $recipes->setMoney_saved($result['money_saved']);

            //POINTS
            $recipes->setPoints($result['points']);
            $listRecipesResult[] = $recipes;
        }

        return $listRecipesResult;
    }

    /**
     * Create
     */
    public function create($recipes) {
        return $this->connection->merge($recipes);        
    }

    /**
     * Delete
     */
    public function delete($recipes){
         return $this->connection->delete($recipes);
    }
}
?>