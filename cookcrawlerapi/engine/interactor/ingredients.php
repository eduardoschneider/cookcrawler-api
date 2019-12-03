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
		 $where->setCollum('ingredients.idingredients');         
		 $where->setValue($_REQUEST['idingredients']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['ingredient_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('ingredients.ingredient_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ingredient_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['ingredient_description'])) {

		$where = new FilterWhere();       
		$where->setCollum('ingredients.ingredient_description');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['ingredient_description'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['calorific_value_kcal'])) {

		$where = new FilterWhere();       
		$where->setCollum('ingredients.calorific_value_kcal');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['calorific_value_kcal'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredientsAdapter = new adapter\IngredientsAdapter($connection);
    $result = $ingredientsAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		 $where->setCollum('ingredients.idingredients');         
		 $where->setValue($_GET['idingredients']);
		 $list[]=$where;
    }

    if (isset($_GET['ingredient_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('ingredients.ingredient_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ingredient_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['ingredient_description'])) {
       $where = new FilterWhere();       
		$where->setCollum('ingredients.ingredient_description');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['ingredient_description'].'%');
		$list[]=$where;
    }
    if (isset($_GET['calorific_value_kcal'])) {
       $where = new FilterWhere();       
		$where->setCollum('ingredients.calorific_value_kcal');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['calorific_value_kcal'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $ingredientsAdapter = new adapter\IngredientsAdapter($connection);
    $result = $ingredientsAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $ingredients = new dao\Ingredients();

    if (isset($_GET['idingredients'])) {
        $ingredients->setIdingredients($_GET['idingredients']);
    }

    if (isset($_GET['ingredient_name'])) {
        $ingredients->setIngredient_name($_GET['ingredient_name']);
    }
    if (isset($_GET['ingredient_description'])) {
        $ingredients->setIngredient_description($_GET['ingredient_description']);
    }
    if (isset($_GET['calorific_value_kcal'])) {
        $ingredients->setCalorific_value_kcal($_GET['calorific_value_kcal']);
    }
    $connection = new connection\Connection();
    $ingredientsAdapter = new adapter\IngredientsAdapter($connection);
    $result = $ingredientsAdapter->delete($ingredients);

    
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
 $ingredients = new dao\Ingredients();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['idingredients'])) {
        $ingredients->setIdingredients($post_vars['idingredients']);
    }

    if (isset($post_vars['ingredient_name'])) {
        $ingredients->setIngredient_name($post_vars['ingredient_name']);
    }
    if (isset($post_vars['ingredient_description'])) {
        $ingredients->setIngredient_description($post_vars['ingredient_description']);
    }
    if (isset($post_vars['calorific_value_kcal'])) {
        $ingredients->setCalorific_value_kcal($post_vars['calorific_value_kcal']);
    }
    $connection = new connection\Connection();
    $ingredientsAdapter = new adapter\IngredientsAdapter($connection);
    $result = $ingredientsAdapter->create($ingredients);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $ingredients = new dao\Ingredients();

    if (isset($_REQUEST['idingredients'])) {
        $ingredients->setIdingredients($_REQUEST['idingredients']);
    }

    if (isset($_REQUEST['ingredient_name'])) {
        $ingredients->setIngredient_name($_REQUEST['ingredient_name']);
    }
    if (isset($_REQUEST['ingredient_description'])) {
        $ingredients->setIngredient_description($_REQUEST['ingredient_description']);
    }
    if (isset($_REQUEST['calorific_value_kcal'])) {
        $ingredients->setCalorific_value_kcal($_REQUEST['calorific_value_kcal']);
    }
    $connection = new connection\Connection();
    $ingredientsAdapter = new adapter\IngredientsAdapter($connection);
    $result = $ingredientsAdapter->create($ingredients);
        
    return json_encode($result);
       
}

?>