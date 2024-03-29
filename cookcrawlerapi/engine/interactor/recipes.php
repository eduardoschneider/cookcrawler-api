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

 
    if(isset($_REQUEST['idrecipes'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('recipes.idrecipes');         
		 $where->setValue($_REQUEST['idrecipes']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['recipe_name'])) {

		$where = new FilterWhere();       
		$where->setCollum('recipes.recipe_name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['recipe_name'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['recipe_description'])) {

		$where = new FilterWhere();       
		$where->setCollum('recipes.recipe_description');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['recipe_description'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['calorific_value_kcal'])) {

		$where = new FilterWhere();       
		$where->setCollum('recipes.calorific_value_kcal');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['calorific_value_kcal'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['money_saved'])) {

		$where = new FilterWhere();       
		$where->setCollum('recipes.money_saved');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['money_saved'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['points'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('recipes.points');         
		 $where->setValue($_REQUEST['points']);
		 $list[]=$where;

    }


 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $recipesAdapter = new adapter\RecipesAdapter($connection);
    $result = $recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
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


    if (isset($_GET['idrecipes'])) {
         $where = new FilterWhere();       
		 $where->setCollum('recipes.idrecipes');         
		 $where->setValue($_GET['idrecipes']);
		 $list[]=$where;
    }

    if (isset($_GET['recipe_name'])) {
       $where = new FilterWhere();       
		$where->setCollum('recipes.recipe_name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['recipe_name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['recipe_description'])) {
       $where = new FilterWhere();       
		$where->setCollum('recipes.recipe_description');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['recipe_description'].'%');
		$list[]=$where;
    }
    if (isset($_GET['calorific_value_kcal'])) {
       $where = new FilterWhere();       
		$where->setCollum('recipes.calorific_value_kcal');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['calorific_value_kcal'].'%');
		$list[]=$where;
    }
    if (isset($_GET['money_saved'])) {
       $where = new FilterWhere();       
		$where->setCollum('recipes.money_saved');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['money_saved'].'%');
		$list[]=$where;
    }
    if (isset($_GET['points'])) {
         $where = new FilterWhere();       
		 $where->setCollum('recipes.points');         
		 $where->setValue($_GET['points']);
		 $list[]=$where;
    }

        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $recipesAdapter = new adapter\RecipesAdapter($connection);
    $result = $recipesAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $recipes = new dao\Recipes();

    if (isset($_GET['idrecipes'])) {
        $recipes->setIdrecipes($_GET['idrecipes']);
    }

    if (isset($_GET['recipe_name'])) {
        $recipes->setRecipe_name($_GET['recipe_name']);
    }
    if (isset($_GET['recipe_description'])) {
        $recipes->setRecipe_description($_GET['recipe_description']);
    }
    if (isset($_GET['calorific_value_kcal'])) {
        $recipes->setCalorific_value_kcal($_GET['calorific_value_kcal']);
    }
    if (isset($_GET['money_saved'])) {
        $recipes->setMoney_saved($_GET['money_saved']);
    }
    if (isset($_GET['points'])) {
        $recipes->setPoints($_GET['points']);
    }

    $connection = new connection\Connection();
    $recipesAdapter = new adapter\RecipesAdapter($connection);
    $result = $recipesAdapter->delete($recipes);

    
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
 $recipes = new dao\Recipes();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['idrecipes'])) {
        $recipes->setIdrecipes($post_vars['idrecipes']);
    }

    if (isset($post_vars['recipe_name'])) {
        $recipes->setRecipe_name($post_vars['recipe_name']);
    }
    if (isset($post_vars['recipe_description'])) {
        $recipes->setRecipe_description($post_vars['recipe_description']);
    }
    if (isset($post_vars['calorific_value_kcal'])) {
        $recipes->setCalorific_value_kcal($post_vars['calorific_value_kcal']);
    }
    if (isset($post_vars['money_saved'])) {
        $recipes->setMoney_saved($post_vars['money_saved']);
    }
    if (isset($post_vars['points'])) {
        $recipes->setPoints($post_vars['points']);
    }

    $connection = new connection\Connection();
    $recipesAdapter = new adapter\RecipesAdapter($connection);
    $result = $recipesAdapter->create($recipes);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $recipes = new dao\Recipes();

    if (isset($_REQUEST['idrecipes'])) {
        $recipes->setIdrecipes($_REQUEST['idrecipes']);
    }

    if (isset($_REQUEST['recipe_name'])) {
        $recipes->setRecipe_name($_REQUEST['recipe_name']);
    }
    if (isset($_REQUEST['recipe_description'])) {
        $recipes->setRecipe_description($_REQUEST['recipe_description']);
    }
    if (isset($_REQUEST['calorific_value_kcal'])) {
        $recipes->setCalorific_value_kcal($_REQUEST['calorific_value_kcal']);
    }
    if (isset($_REQUEST['money_saved'])) {
        $recipes->setMoney_saved($_REQUEST['money_saved']);
    }
    if (isset($_REQUEST['points'])) {
        $recipes->setPoints($_REQUEST['points']);
    }

    $connection = new connection\Connection();
    $recipesAdapter = new adapter\RecipesAdapter($connection);
    $result = $recipesAdapter->create($recipes);
        
    return json_encode($result);
       
}

/**
 * getTeste
 */
 
function getTeste()
{
		$sql = "select * from recipes where idrecipes in (select idrecipes from ingredients_has_recipes WHERE idingredients IN (" . $_GET['ing1'] . "," . $_GET['ing2'] . "," . $_GET['ing3'] . "," . $_GET['ing4'] . "," . $_GET['ing5'] . "));";
		$connection = new connection\Connection();
		return json_encode($connection->execSelect($sql));
	
	//return var_dump("parametros nao setados");
}


?>