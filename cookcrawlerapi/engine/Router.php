<?php
	use engine\Hosts;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';
	
	if($_GET["param"] == 'api'){
		
		$Hosts = new Hosts();
		
		if(!$Hosts->getShowDebug()){
			header("Content-type: application/json; charset=UTF-8");
		}
		
		if(file_exists("interactor/".$_GET["class"].'.php')){
			include_once "interactor/".$_GET["class"].'.php';
		}
	}


//     else if($_GET["param"] == 'web'){
// 		if(file_exists("web/".$_GET["class"].'.php')){
// 			include_once "web/".$_GET["class"].'.php';
// 		}
// 	}
	
	//--------------------------------------------------------------------------
	
	
	$permission = Array();
	
		
		//INGREDIENTS
		$permission = setRouter("ingredients","POST"  ,"findAll",$permission);
		$permission = setRouter("ingredients","GET"   ,"get"    ,$permission);
		$permission = setRouter("ingredients","DELETE","delete" ,$permission);
		$permission = setRouter("ingredients","PUT"   ,"put"    ,$permission);
		$permission = setRouter("ingredients","POST"  ,"insert" ,$permission);
		
		
		//INGREDIENTS_HAS_RECIPES
		$permission = setRouter("ingredients_has_recipes","POST"  ,"findAll",$permission);
		$permission = setRouter("ingredients_has_recipes","GET"   ,"get"    ,$permission);
		$permission = setRouter("ingredients_has_recipes","DELETE","delete" ,$permission);
		$permission = setRouter("ingredients_has_recipes","PUT"   ,"put"    ,$permission);
		$permission = setRouter("ingredients_has_recipes","POST"  ,"insert" ,$permission);
		
		
		//RECIPES
		$permission = setRouter("recipes","POST"  ,"findAll",$permission);
		$permission = setRouter("recipes","GET"   ,"get"    ,$permission);
		$permission = setRouter("recipes","GET"   ,"getTeste"    ,$permission);
		$permission = setRouter("recipes","DELETE","delete" ,$permission);
		$permission = setRouter("recipes","PUT"   ,"put"    ,$permission);
		$permission = setRouter("recipes","POST"  ,"insert" ,$permission);
		
		
		//USERS
		$permission = setRouter("users","POST"  ,"findAll",$permission);
		$permission = setRouter("users","GET"   ,"get"    ,$permission);
		$permission = setRouter("users","DELETE","delete" ,$permission);
		$permission = setRouter("users","PUT"   ,"put"    ,$permission);
		$permission = setRouter("users","POST"  ,"insert" ,$permission);
		
		
		//USERS_HAS_RECIPES
		$permission = setRouter("users_has_recipes","POST"  ,"findAll",$permission);
		$permission = setRouter("users_has_recipes","GET"   ,"get"    ,$permission);
		$permission = setRouter("users_has_recipes","DELETE","delete" ,$permission);
		$permission = setRouter("users_has_recipes","PUT"   ,"put"    ,$permission);
		$permission = setRouter("users_has_recipes","POST"  ,"insert" ,$permission);
		
	
	run($permission);
	
	
	//--------------------------------------------------------------------------
	
	function setRouter($url,$type,$method,$permission) {	

		$len = count($permission);
		
		$permission[$len][0] = $type;
		$permission[$len][1] = $method;
		$permission[$len][2] = $url;		

		return $permission;
	}
	
	function run($permission){
			
		ob_start();
		
		$acess  = false;
		
		for ($i = 0; $i < count($permission); $i++) {
			
			if(METHOD == ($permission[$i][0])){ 
		      if($_GET["method"] == $permission[$i][1]){
				if($_GET["class"] == $permission[$i][2]){				
				
					echo call_user_func($permission[$i][1]);
					$acess = true;

				}
			  }
			}
		}
		if($acess){
			return $this_string = ob_get_contents();
		}else{
			echo "ACESSO NEGADO!";
			return $this_string = ob_get_contents();
		}
		ob_end_clean();
	}
?>

	
