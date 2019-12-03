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

 
    if(isset($_REQUEST['idingredients'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ingredients_has_recipes.idingredients');         
		 $where->setValue($_REQUEST['idingredients']);
		 $list[]=$where;

    }
 
    if(isset($_REQUEST['idrecipes'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('ingredients_has_recipes.idrecipes');         
		 $where->setValue($_REQUEST['idrecipes']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['qtd'])) {

		$where = new FilterWhere();       
		$where->setCollum('ingredients_has_recipes.qtd');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['qtd'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredients_has_recipesAdapter = new adapter\Ingredients_has_recipesAdapter($connection);
    $result = $ingredients_has_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['idingredients'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ingredients_has_recipes.idingredients');         
		 $where->setValue($_GET['idingredients']);
		 $list[]=$where;
    }

    if (isset($_GET['idrecipes'])) {
         $where = new FilterWhere();       
		 $where->setCollum('ingredients_has_recipes.idrecipes');         
		 $where->setValue($_GET['idrecipes']);
		 $list[]=$where;
    }

    if (isset($_GET['qtd'])) {
       $where = new FilterWhere();       
		$where->setCollum('ingredients_has_recipes.qtd');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['qtd'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredients_has_recipesAdapter = new adapter\Ingredients_has_recipesAdapter($connection);
    $result = $ingredients_has_recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $ingredients_has_recipes = new dao\Ingredients_has_recipes();

    if (isset($_GET['idingredients'])) {
        $ingredients_has_recipes->setIdingredients($_GET['idingredients']);
    }

    if (isset($_GET['idrecipes'])) {
        $ingredients_has_recipes->setIdrecipes($_GET['idrecipes']);
    }

    if (isset($_GET['qtd'])) {
        $ingredients_has_recipes->setQtd($_GET['qtd']);
    }
    $connection = new connection\Connection();
    $ingredients_has_recipesAdapter = new adapter\Ingredients_has_recipesAdapter($connection);
    $result = $ingredients_has_recipesAdapter->delete($ingredients_has_recipes);

    
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
 $ingredients_has_recipes = new dao\Ingredients_has_recipes();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['idingredients'])) {
        $ingredients_has_recipes->setIdingredients($post_vars['idingredients']);
    }

    if (isset($post_vars['idrecipes'])) {
        $ingredients_has_recipes->setIdrecipes($post_vars['idrecipes']);
    }

    if (isset($post_vars['qtd'])) {
        $ingredients_has_recipes->setQtd($post_vars['qtd']);
    }
    $connection = new connection\Connection();
    $ingredients_has_recipesAdapter = new adapter\Ingredients_has_recipesAdapter($connection);
    $result = $ingredients_has_recipesAdapter->create($ingredients_has_recipes);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $ingredients_has_recipes = new dao\Ingredients_has_recipes();

    if (isset($_REQUEST['idingredients'])) {
        $ingredients_has_recipes->setIdingredients($_REQUEST['idingredients']);
    }

    if (isset($_REQUEST['idrecipes'])) {
        $ingredients_has_recipes->setIdrecipes($_REQUEST['idrecipes']);
    }

    if (isset($_REQUEST['qtd'])) {
        $ingredients_has_recipes->setQtd($_REQUEST['qtd']);
    }
    $connection = new connection\Connection();
    $ingredients_has_recipesAdapter = new adapter\Ingredients_has_recipesAdapter($connection);
    $result = $ingredients_has_recipesAdapter->create($ingredients_has_recipes);
        
    return json_encode($result);
       
}

?>