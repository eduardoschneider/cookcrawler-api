<?php
namespace engine\adapter;
use engine\dao\Users_has_recipes;
use engine\utils\FilterWhere;

class Users_has_recipesAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsers_has_recipes = $this->connection->getAll("users_has_recipes", $where, $orderColun, $order, $page, $sizePage);        
        $listUsers_has_recipesResult = Array(); 
    	
    	foreach ($listUsers_has_recipes as $result){
            $users_has_recipes = new Users_has_recipes();            
         
           if($result['idusers'] != null){
                //IDUSERS
                $usersAdapter = new UsersAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('id');
                $filter->setValue($result['idusers']);
                $list = Array($filter);                


                $resultUsers = $usersAdapter->getAll($list, "", "", 0, 0);
            	$users_has_recipes->setIdusers($resultUsers[0]);
                
           }

           if($result['idrecipes'] != null){
                //IDRECIPES
                $recipesAdapter = new RecipesAdapter($this->connection);
				$filter = new FilterWhere();
                $filter->setCollum('idrecipes');
                $filter->setValue($result['idrecipes']);
                $list = Array($filter);                


                $resultRecipes = $recipesAdapter->getAll($list, "", "", 0, 0);
            	$users_has_recipes->setIdrecipes($resultRecipes[0]);
                
           }

            $listUsers_has_recipesResult[] = $users_has_recipes;
        }

        return $listUsers_has_recipesResult;
    }

    /**
     * Create
     */
    public function create($users_has_recipes) {
        return $this->connection->merge($users_has_recipes);        
    }

    /**
     * Delete
     */
    public function delete($users_has_recipes){
         return $this->connection->delete($users_has_recipes);
    }
}
?>