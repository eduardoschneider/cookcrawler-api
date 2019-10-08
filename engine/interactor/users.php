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
		 $where->setCollum('users.idusers');         
		 $where->setValue($_REQUEST['idusers']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['name'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.name');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['name'].'%');
		$list[]=$where;
        
    } 
    if(isset($_REQUEST['age'])) {
 
		 $where = new FilterWhere();       
		 $where->setCollum('users.age');         
		 $where->setValue($_REQUEST['age']);
		 $list[]=$where;

    }

    if (isset($_REQUEST['email'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.email');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['email'].'%');
		$list[]=$where;
        
    }
    if (isset($_REQUEST['password'])) {

		$where = new FilterWhere();       
		$where->setCollum('users.password');
        $where->setCondition('like');
		$where->setValue('%'.$_REQUEST['password'].'%');
		$list[]=$where;
        
    }

 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->getAll($list, "", "", $page, $pageSize);
        
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
		 $where->setCollum('users.idusers');         
		 $where->setValue($_GET['idusers']);
		 $list[]=$where;
    }

    if (isset($_GET['name'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.name');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['name'].'%');
		$list[]=$where;
    }
    if (isset($_GET['age'])) {
         $where = new FilterWhere();       
		 $where->setCollum('users.age');         
		 $where->setValue($_GET['age']);
		 $list[]=$where;
    }

    if (isset($_GET['email'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.email');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['email'].'%');
		$list[]=$where;
    }
    if (isset($_GET['password'])) {
       $where = new FilterWhere();       
		$where->setCollum('users.password');
        $where->setCondition('like');
		$where->setValue('%'.$_GET['password'].'%');
		$list[]=$where;
    }
        		
 	if (isset($_REQUEST['page'])) {
    	$page = $_REQUEST['page'];
    }
    if (isset($_REQUEST['pageSize'])) {
    	$pageSize = $_REQUEST['pageSize'];
    }

    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->getAll($list, "", "", $page, $pageSize);
        
    return json_encode($result);

}

/**
 * Delete
 */
function delete()
{
    $users = new dao\Users();

    if (isset($_GET['idusers'])) {
        $users->setIdusers($_GET['idusers']);
    }

    if (isset($_GET['name'])) {
        $users->setName($_GET['name']);
    }
    if (isset($_GET['age'])) {
        $users->setAge($_GET['age']);
    }

    if (isset($_GET['email'])) {
        $users->setEmail($_GET['email']);
    }
    if (isset($_GET['password'])) {
        $users->setPassword($_GET['password']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->delete($users);

    
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
 $users = new dao\Users();

	$post_vars = getParametersPUT();
	$listKey = array("id");	
	
	if(!validPut($listKey,$post_vars)){
		http_response_code(400);
		return; 
	}
    if (isset($post_vars['idusers'])) {
        $users->setIdusers($post_vars['idusers']);
    }

    if (isset($post_vars['name'])) {
        $users->setName($post_vars['name']);
    }
    if (isset($post_vars['age'])) {
        $users->setAge($post_vars['age']);
    }

    if (isset($post_vars['email'])) {
        $users->setEmail($post_vars['email']);
    }
    if (isset($post_vars['password'])) {
        $users->setPassword($post_vars['password']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->create($users);
        
    return json_encode($result);

}

/**
 * Insert
 */
function insert()
{
    $users = new dao\Users();

    if (isset($_REQUEST['idusers'])) {
        $users->setIdusers($_REQUEST['idusers']);
    }

    if (isset($_REQUEST['name'])) {
        $users->setName($_REQUEST['name']);
    }
    if (isset($_REQUEST['age'])) {
        $users->setAge($_REQUEST['age']);
    }

    if (isset($_REQUEST['email'])) {
        $users->setEmail($_REQUEST['email']);
    }
    if (isset($_REQUEST['password'])) {
        $users->setPassword($_REQUEST['password']);
    }
    $connection = new connection\Connection();
    $usersAdapter = new adapter\UsersAdapter($connection);
    $result = $usersAdapter->create($users);
        
    return json_encode($result);
       
}

?>