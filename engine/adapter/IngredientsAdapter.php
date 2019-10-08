<?php
namespace engine\adapter;
use engine\dao\Ingredients;
use engine\utils\FilterWhere;

class IngredientsAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listIngredients = $this->connection->getAll("ingredients", $where, $orderColun, $order, $page, $sizePage);        
        $listIngredientsResult = Array(); 
    	
    	foreach ($listIngredients as $result){
            $ingredients = new Ingredients();            
         

            //IDINGREDIENTS
            $ingredients->setIdingredients($result['idingredients']);

            //INGREDIENT_NAME
            $ingredients->setIngredient_name($result['ingredient_name']);

            //INGREDIENT_DESCRIPTION
            $ingredients->setIngredient_description($result['ingredient_description']);

            //CALORIFIC_VALUE_KCAL
            $ingredients->setCalorific_value_kcal($result['calorific_value_kcal']);
            $listIngredientsResult[] = $ingredients;
        }

        return $listIngredientsResult;
    }

    /**
     * Create
     */
    public function create($ingredients) {
        return $this->connection->merge($ingredients);        
    }

    /**
     * Delete
     */
    public function delete($ingredients){
         return $this->connection->delete($ingredients);
    }
}
?>