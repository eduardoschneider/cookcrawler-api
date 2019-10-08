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

 
    if(isset($_REQUEST['user_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('users_recipes.user_id');         
		 $where->setValue($_REQUEST['user_id']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['recipe_id'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('users_recipes.recipe_id');         
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
    $users_recipesAdapter = new adapter\Users_recipesAdapter($connection);
    $result = $users_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['user_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('users_recipes.user_id');         
		 $where->setValue($_GET['user_id']);
		 $list[]=$where;
    }

    if (isset($_GET['recipe_id'])) {
         $where = new FilterWhere();       
		 $where->setCollum('users_recipes.recipe_id');         
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
    $users_recipesAdapter = new adapter\Users_recipesAdapter($connection);
    $result = $users_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $users_recipes = new dao\Users_recipes();

    if (isset($_GET['user_id'])) {
        $users_recipes->setUser_id($_GET['user_id']);
    }

    if (isset($_GET['recipe_id'])) {
        $users_recipes->setRecipe_id($_GET['recipe_id']);
    }

    $connection = new connection\Connection();
    $users_recipesAdapter = new adapter\Users_recipesAdapter($connection);
    $result = $users_recipesAdapter->delete($users_recipes);

    
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
 $users_recipes = new dao\Users_recipes();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['user_id'])) {
        $users_recipes->setUser_id($post_vars['user_id']);
    }

    if (isset($post_vars['recipe_id'])) {
        $users_recipes->setRecipe_id($post_vars['recipe_id']);
    }

    $connection = new connection\Connection();
    $users_recipesAdapter = new adapter\Users_recipesAdapter($connection);
    $result = $users_recipesAdapter->create($users_recipes);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $users_recipes = new dao\Users_recipes();

    if (isset($_REQUEST['user_id'])) {
        $users_recipes->setUser_id($_REQUEST['user_id']);
    }

    if (isset($_REQUEST['recipe_id'])) {
        $users_recipes->setRecipe_id($_REQUEST['recipe_id']);
    }

    $connection = new connection\Connection();
    $users_recipesAdapter = new adapter\Users_recipesAdapter($connection);
    $result = $users_recipesAdapter->create($users_recipes);
        
    return json_encode($result);
       
}

?>