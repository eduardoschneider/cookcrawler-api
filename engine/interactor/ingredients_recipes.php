<?php    
use engine\adapter;
use engine\connection;
use engine\dao;
use engine\utils\FilterWhere;
use engine\utils\ResponseDelete;

/**
 * FindAll
 */
function findAll()
{
    $where = new FilterWhere();
	$page = 0;
	$pageSize = 0;
	$list = Array(); 

 
    if(isset($_REQUEST['ingredient_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ingredients_recipes.ingredient_id');         
		 $where->setValue($_REQUEST['ingredient_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['recipe_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ingredients_recipes.recipe_id');         
		 $where->setValue($_REQUEST['recipe_id']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredients_recipesAdapter = new adapter\Ingredients_recipesAdapter($connection);
    $result = $ingredients_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Get
 */
function get()
{
    $where = new FilterWhere();
	$page = 0;
	$pageSize = 0;
	$list = Array();


    if (isset($_GET['ingredient_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ingredients_recipes.ingredient_id');         
		 $where->setValue($_GET['ingredient_id']);
		 $list[]=$where;
    }

    if (isset($_GET['recipe_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ingredients_recipes.recipe_id');         
		 $where->setValue($_GET['recipe_id']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredients_recipesAdapter = new adapter\Ingredients_recipesAdapter($connection);
    $result = $ingredients_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $ingredients_recipes = new dao\Ingredients_recipes();

    if (isset($_GET['ingredient_id'])) {
        $ingredients_recipes->setIngredient_id($_GET['ingredient_id']);
    }

    if (isset($_GET['recipe_id'])) {
        $ingredients_recipes->setRecipe_id($_GET['recipe_id']);
    }

    $connection = new connection\Connection();
    $ingredients_recipesAdapter = new adapter\Ingredients_recipesAdapter($connection);
    $result = $ingredients_recipesAdapter->delete($ingredients_recipes);

    
	$response = new ResponseDelete();
	$response->setSize($result);
	if($result > 0){
		$response->setStatus(true);
	}else{
		$response->setStatus(false);
	}	

    return json_encode($response);

}

/**
 * Put
 */
function put()
{
 $ingredients_recipes = new dao\Ingredients_recipes();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['ingredient_id'])) {
        $ingredients_recipes->setIngredient_id($post_vars['ingredient_id']);
    }

    if (isset($post_vars['recipe_id'])) {
        $ingredients_recipes->setRecipe_id($post_vars['recipe_id']);
    }

    $connection = new connection\Connection();
    $ingredients_recipesAdapter = new adapter\Ingredients_recipesAdapter($connection);
    $result = $ingredients_recipesAdapter->create($ingredients_recipes);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $ingredients_recipes = new dao\Ingredients_recipes();

    if (isset($_REQUEST['ingredient_id'])) {
        $ingredients_recipes->setIngredient_id($_REQUEST['ingredient_id']);
    }

    if (isset($_REQUEST['recipe_id'])) {
        $ingredients_recipes->setRecipe_id($_REQUEST['recipe_id']);
    }

    $connection = new connection\Connection();
    $ingredients_recipesAdapter = new adapter\Ingredients_recipesAdapter($connection);
    $result = $ingredients_recipesAdapter->create($ingredients_recipes);
        
    return json_encode($result);
       
}

?>