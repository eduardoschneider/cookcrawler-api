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

 
    if(isset($_REQUEST['idusers'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('users_has_recipes.idusers');         
		 $where->setValue($_REQUEST['idusers']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['idrecipes'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('users_has_recipes.idrecipes');         
		 $where->setValue($_REQUEST['idrecipes']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $users_has_recipesAdapter = new adapter\Users_has_recipesAdapter($connection);
    $result = $users_has_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['idusers'])) {
         $where = new FilterWhere();       
		 $where->setCollum('users_has_recipes.idusers');         
		 $where->setValue($_GET['idusers']);
		 $list[]=$where;
    }

    if (isset($_GET['idrecipes'])) {
         $where = new FilterWhere();       
		 $where->setCollum('users_has_recipes.idrecipes');         
		 $where->setValue($_GET['idrecipes']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $users_has_recipesAdapter = new adapter\Users_has_recipesAdapter($connection);
    $result = $users_has_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $users_has_recipes = new dao\Users_has_recipes();

    if (isset($_GET['idusers'])) {
        $users_has_recipes->setIdusers($_GET['idusers']);
    }

    if (isset($_GET['idrecipes'])) {
        $users_has_recipes->setIdrecipes($_GET['idrecipes']);
    }

    $connection = new connection\Connection();
    $users_has_recipesAdapter = new adapter\Users_has_recipesAdapter($connection);
    $result = $users_has_recipesAdapter->delete($users_has_recipes);

    
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
 $users_has_recipes = new dao\Users_has_recipes();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['idusers'])) {
        $users_has_recipes->setIdusers($post_vars['idusers']);
    }

    if (isset($post_vars['idrecipes'])) {
        $users_has_recipes->setIdrecipes($post_vars['idrecipes']);
    }

    $connection = new connection\Connection();
    $users_has_recipesAdapter = new adapter\Users_has_recipesAdapter($connection);
    $result = $users_has_recipesAdapter->create($users_has_recipes);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $users_has_recipes = new dao\Users_has_recipes();

    if (isset($_REQUEST['idusers'])) {
        $users_has_recipes->setIdusers($_REQUEST['idusers']);
    }

    if (isset($_REQUEST['idrecipes'])) {
        $users_has_recipes->setIdrecipes($_REQUEST['idrecipes']);
    }

    $connection = new connection\Connection();
    $users_has_recipesAdapter = new adapter\Users_has_recipesAdapter($connection);
    $result = $users_has_recipesAdapter->create($users_has_recipes);
        
    return json_encode($result);
       
}

?>