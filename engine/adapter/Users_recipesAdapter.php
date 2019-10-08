<?php
namespace engine\adapter;
use engine\dao\Users_recipes;
use engine\utils\FilterWhere;

class Users_recipesAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsers_recipes = $this->connection->getAll("users_recipes", $where, $orderColun, $order, $page, $sizePage);        
        $listUsers_recipesResult = Array(); 
    	
    	foreach ($listUsers_recipes as $result){
            $users_recipes = new Users_recipes();            
         
           if($result['user_id'] != null){
                //USER_ID
                $usersAdapter = new UsersAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idusers');
                $filter->setValue($result['user_id']);
                $list = Array($filter);                


                $resultUsers = $usersAdapter->getAll($list, "", "", 0, 0);
            	$users_recipes->setUser_id($resultUsers[0]);
                
           }

           if($result['recipe_id'] != null){
                //RECIPE_ID
                $recipesAdapter = new RecipesAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idrecipes');
                $filter->setValue($result['recipe_id']);
                $list = Array($filter);                


                $resultRecipes = $recipesAdapter->getAll($list, "", "", 0, 0);
            	$users_recipes->setRecipe_id($resultRecipes[0]);
                
           }

            $listUsers_recipesResult[] = $users_recipes;
        }

        return $listUsers_recipesResult;
    }

    /**
     * Create
     */
    public function create($users_recipes) {
        return $this->connection->merge($users_recipes);        
    }

    /**
     * Delete
     */
    public function delete($users_recipes){
         return $this->connection->delete($users_recipes);
    }
}
?>