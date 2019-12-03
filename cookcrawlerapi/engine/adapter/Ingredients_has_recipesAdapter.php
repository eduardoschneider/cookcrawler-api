<?php
namespace engine\adapter;
use engine\dao\Ingredients_has_recipes;
use engine\utils\FilterWhere;

class Ingredients_has_recipesAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listIngredients_has_recipes = $this->connection->getAll("ingredients_has_recipes", $where, $orderColun, $order, $page, $sizePage);        
        $listIngredients_has_recipesResult = Array(); 
    	
    	foreach ($listIngredients_has_recipes as $result){
            $ingredients_has_recipes = new Ingredients_has_recipes();            
         
           if($result['idingredients'] != null){
                //IDINGREDIENTS
                $ingredientsAdapter = new IngredientsAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idingredients');
                $filter->setValue($result['idingredients']);
                $list = Array($filter);                


                $resultIngredients = $ingredientsAdapter->getAll($list, "", "", 0, 0);
            	$ingredients_has_recipes->setIdingredients($resultIngredients[0]);
                
           }

           if($result['idrecipes'] != null){
                //IDRECIPES
                $recipesAdapter = new RecipesAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idrecipes');
                $filter->setValue($result['idrecipes']);
                $list = Array($filter);                


                $resultRecipes = $recipesAdapter->getAll($list, "", "", 0, 0);
            	$ingredients_has_recipes->setIdrecipes($resultRecipes[0]);
                
           }


            //QTD
            $ingredients_has_recipes->setQtd($result['qtd']);
            $listIngredients_has_recipesResult[] = $ingredients_has_recipes;
        }

        return $listIngredients_has_recipesResult;
    }

    /**
     * Create
     */
    public function create($ingredients_has_recipes) {
        return $this->connection->merge($ingredients_has_recipes);        
    }

    /**
     * Delete
     */
    public function delete($ingredients_has_recipes){
         return $this->connection->delete($ingredients_has_recipes);
    }
}
?>