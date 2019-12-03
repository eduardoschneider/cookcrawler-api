<?php
namespace engine\adapter;
use engine\dao\Users;
use engine\utils\FilterWhere;

class UsersAdapter {
			
    private $connection;
    	
    public function __construct($connection) {
    	$this->connection = $connection;
    }
    
    /**
     * GetAll
     */
    public function getAll($where, $orderColun, $order, $page, $sizePage){
    	$listUsers = $this->connection->getAll("users", $where, $orderColun, $order, $page, $sizePage);        
        $listUsersResult = Array(); 
    	
    	foreach ($listUsers as $result){
            $users = new Users();            
         

            //ID
            $users->setId($result['id']);

            //NAME
            $users->setName($result['name']);

            //AGE
            $users->setAge($result['age']);

            //EMAIL
            $users->setEmail($result['email']);

            //PASSWORD
            $users->setPassword($result['password']);

            //POINTS
            $users->setPoints($result['points']);

            //MONEY_SAVED
            $users->setMoney_saved($result['money_saved']);
            $listUsersResult[] = $users;
        }

        return $listUsersResult;
    }

    /**
     * Create
     */
    public function create($users) {
        return $this->connection->merge($users);        
    }

    /**
     * Delete
     */
    public function delete($users){
         return $this->connection->delete($users);
    }
}
?>