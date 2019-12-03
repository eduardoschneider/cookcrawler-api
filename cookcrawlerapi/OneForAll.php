<?php
//--------------------------------DEFINES--------------------------------------
// NOME DA PASTA DO PROJETO
define ( "PROJECT",    "cookcrawlerapi" );

// DADOS DE BANCO (OFFICIAL)
define ( "BANCO"  , "cookcrawler" );
define ( "IP"     , "localhost"   );
define ( "USUARIO", "root"        );
define ( "SENHA"  , ""            );

// DADOS DE BANCO (TESTE)
define ( "BANCO_T"  , "cookcrawler" );
define ( "IP_T"     , "localhost"   );
define ( "USUARIO_T", "root"        );
define ( "SENHA_T"  , ""            );

define ( "MAPPING_DATABASE"  , "TESTE");

//-----------------------------------------------------------------------------------


// PASTAS DO PROJETO
define ( "FOLDER", 	   "engine" 			    );
define ( "ADAPTER",    FOLDER . "/adapter/" 	);
define ( "CONNECTION", FOLDER . "/connection/" 	);
define ( "INTERACTOR", FOLDER . "/interactor/" 	);
define ( "DAO", 	   FOLDER . "/dao/" 		);
define ( "LIBS", 	   FOLDER . "/lib/" 		);
define ( "UTILS", 	   FOLDER . "/utils/" 		);
date_default_timezone_set ( "America/Sao_Paulo" );
//-----------------------DEFINES--------------------------------------
//-----------------------CREATE_FOLDER--------------------------------------
// Criando Folders
if (! file_exists ( FOLDER )) {
    mkdir ( FOLDER, 0777 );
}
if (! file_exists ( ADAPTER )) {
    mkdir ( ADAPTER, 0777 );
}
if (! file_exists ( CONNECTION)) {
    mkdir ( CONNECTION, 0777 );
}
if (! file_exists ( INTERACTOR)) {
    mkdir ( INTERACTOR, 0777 );
}
if (! file_exists ( DAO)) {
    mkdir ( DAO, 0777 );
}
if (! file_exists ( LIBS)) {
    mkdir ( LIBS, 0777 );
}
if (! file_exists ( UTILS)) {
    mkdir ( UTILS, 0777 );
}
//-----------------------CREATE_FOLDER-------------------------------------
// -----------------------CALLS--------------------------------------

if(!file_exists("index.php") && !file_exists("script.js")){
	
	callJs();
	callIndex();
	header("Location: index.php");
	
}else if (!isset ( $_GET ["method"] )) {
	echo "OK,Criando Barramento de Informações,barramento";
	
} else {
	
	if ($_GET ["method"] == "barramento") {		
		try {
			getBarramento();
			echo "OK,Criando Autoload,Autoload";
		} catch (Exception $e) {
			echo $e.",Criando Autoload,Autoload";
		}
		
	}
	
	if ($_GET ["method"] == "Autoload") {
		try {
			getAutoload ();
			echo "OK,Criando Configurações de Host,host";
		} catch (Exception $e) {
			echo $e.",Criando Configurações de Host,host";
		}
		
	}
	
	if ($_GET ["method"] == "host") {
		try {
			getHost ();
			echo "OK,Criando estrutra de resposta,response";
		} catch (Exception $e) {
			echo $e.",Criando estrutra de resposta,response";
		}
	}
	
	if ($_GET ["method"] == "response") {
		try {		
			getResponse ();
			echo "OK,Criando biblioteca ChromePHP,chromePhp";
		} catch (Exception $e) {
			echo $e.",Criando biblioteca ChromePHP,chromePhp";
		}
	}
	
	if ($_GET ["method"] == "chromePhp") {
		try {
			getChromePhp();
			echo "OK,Criando Filtros para Where,filterWhere";
		} catch (Exception $e) {
			echo $e.",Criando Filtros para Where,filterWhere";
		}
	}
	
	if ($_GET ["method"] == "filterWhere") {
		try {
			getFilterWhere();
			echo "OK,Criando arquivos de conexão,connection";
		} catch (Exception $e) {
			echo $e.",Criando arquivos de conexão,connection";
		}
	}
	
	if ($_GET ["method"] == "connection") {
		try {		
			getConnection();
			echo "OK,Criando arquivo de composição,composer";
		} catch (Exception $e) {
			echo $e.",Criando arquivo de composição,composer";
		}
	}
	
	if ($_GET ["method"] == "composer") {
		try {
			getComposer ();
			echo "OK,Criando arquivos de Formatação de SQL,libFormat";
		} catch (Exception $e) {
			echo $e."Criando arquivos de Formatação de SQL,libFormat";
		}
		
	}
	
	if ($_GET ["method"] == "libFormat") {
		try {
			getlibSqlFormatter ();
			echo "OK,Criando Arquivo de Diretivas de Acesso,htacess";
		
		} catch (Exception $e) {
			echo $e.",Criando Arquivo de Diretivas de Acesso,htacess";
		}
		
	}
	
	if ($_GET ["method"] == "htacess") {
		try {			
			getHtAccess ();
			echo "OK,Criando Rotas,router";		
		} catch (Exception $e) {
			echo $e.",Criando Rotas,router";
		}
	}
	
	if ($_GET ["method"] == "router") {
		try {		
			getRouter ();
			echo "OK,Criando arquivos de Base,base";		
		} catch (Exception $e) {
			echo $e."Criando arquivos de Base,base";
		}
	}
	
	if ($_GET ["method"] == "base") {
		try {
			getBase ();
			echo "OK,Criando DAO's,createDao";
		} catch (Exception $e) {
			echo $e.",Criando DAO's,createDao";
		}
	}
	
	if ($_GET ["method"] == "createDao") {
		try {
			createDao ();
			echo "OK,Criando Adapters,createAdapter";
		} catch (Exception $e) {
			echo $e.",Criando Adapters,createAdapter";
		}
	}
	
	if ($_GET ["method"] == "createAdapter") {
		try {
			createAdapters ();
			echo "OK,Criando Interactors,createInteractor";
		} catch (Exception $e) {
			echo $e.",Criando Interactors,createInteractor";
		}
	}
	
	if ($_GET ["method"] == "createInteractor") {
		try {
			createInteractor ();
			echo "OK,Finalizando Processamento,Fim";
		} catch (Exception $e) {
			echo $e.",Finalizando Processamento,Fim";
		}	
		unlink("script.js");
		unlink("index.php");
	}
	
	if ($_GET ["method"] == "Fim") {		
			echo "OK,Finalizado,stop";			
	}
}
// getBarramento();
// getAutoload();
// getHost();
// getResponse();
// getConnection();
// getComposer();
// getlibSqlFormatter();
// getHtAccess();
// getRouter();
// getBase();
// createDao();
// createAdapters();
// createInteractor();

// -----------------------CALLS------------------------------------- 

function callJs() {
	$str = "
window.onload = loading;

var cont = 0;

var urlHost;

function loading(){
	var temp = document.getElementById('urlLocal').innerHTML;
	urlHost = temp+\"OneForAll.php\";	
	service(urlHost,\"\");
}

function initRequest() {
	if (window.XMLHttpRequest) {
		if (navigator.userAgent.indexOf(\"MSIE\") != -1)
			isIE = true;

		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		isIE = true;

		try {   	
			return new ActiveXObject(\"Microsoft.XMLHTTP\");	
		} catch(e) {
			try {
				return new ActiveXObject(\"Msxml2.XMLHTTP\");
			} catch(e) { }
		}
	}
}

/**
 * Request for a service.
 *
 * @param {String} url

 */
function service(url,param) {
	var request = initRequest();
	request.open(\"GET\", url+param, true);
	request.setRequestHeader(\"Content-Type\", 
	\"application/x-www-form-urlencoded; charset=UTF-8\");
	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {

			var respText = request.responseText;			
			var res = respText.split(\",\");
			
			var status = res[0];
			var txt    = res[1];
			var method = res[2];

			if(cont>0){
				var anterior = document.getElementById(cont-1);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
			}
			var table = document.getElementById(\"tableMain\");
			table.innerHTML = table.innerHTML+'<tr><td>'+txt+'</td><td id=\"'+cont+'\"><div class=\"loader\" ></div></td></tr>';

			if (method == 'Fim') {
				
				var anterior = document.getElementById(cont);
				anterior.innerHTML = '<p class=\"accept\">&#10003</p>';
				
				var response = document.getElementById(\"tableMain\");
				response.innerHTML = table.innerHTML+'<tr><td>Finalizado</td><td><p class=\"accept\">&#10003</p></td></tr>';
				
			} else {
				if(status == 'OK'){
					service(urlHost+\"?method=\",method);
				}else{
					var error = document.getElementById('error');
					error.innerHTML = ''+status;
				}
			} 

			cont++;
		}
	};
	request.send();
}";
	
	gravar("script.js", $str);
	
}

function callIndex() {
	$str = "
<?php
echo '<html lang=\"pt-br\">';

echo '<head>';
echo '<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">';
echo '<meta http-equiv=\"content-language\" content=\"pt-br\">';
echo '<meta name=\"title\" content=\"OneForAll\">';

echo '<style>
		 td{
			padding-left:32px;
		 }
		.loader {
		  border: 4px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 4px solid #3498db;
		  width: 20px;
		  height: 20px;
		  -webkit-animation: spin 2s linear infinite; /* Safari */
		  animation: spin 2s linear infinite;
		}
		
		/* Safari */
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}
		
		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
		.accept{
			color: green;    
	    	font-size: 24px;
	    	font-weight: bold;
		}
	
		.nameOne{
			text-align:center; 
			font-weight: bold; 
			font-size: 30px;
    		vertical-align: middle;
		}
		
		p{
			margin:0;
		}
		.copiart{
			text-align:center; 
			font-weight: bold;
		}
		</style>';

echo '<script charset=\"UTF-8\" src=\"script.js\"></script>';

echo '</head>';

echo '<body>';

\$project = \$_SERVER ['HTTP_HOST'] .\"/\". explode('/', \$_SERVER['REQUEST_URI'])[1].\"/\";

echo '<div id=\"urlLocal\" style=\"display:none;\">http://' . \$project . '</div>';
echo '<p class=\"nameOne\"><img src=\"https://adamis.com.br/oru_maito.png\" height=64 >OneForAll Framework</p>';
echo '<table id=\"tableMain\"></table>';
echo '<p class=\"copiart\">Adamis © 2018 OneForAll</p>';
echo '<div id=\"error\"></div>';

echo '</body>';

echo '</html>';
?>";
	
	gravar("index.php", $str);
}
//-----------------------CREATE_ADAPTER--------------------------------------

function createAdapters() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        
        $strHeader = "<?php
namespace engine\adapter;
";
        $strHeader = setUseAdapter($strHeader,"engine\dao\\".ucfirst($table[0]));
        $strHeader = setUseAdapter($strHeader,"engine\utils\FilterWhere");
        
        $str = "
class ".ucfirst($table[0])."Adapter {
			
    private \$connection;
    	
    public function __construct(\$connection) {
    	\$this->connection = \$connection;
    }
    
    /**
     * GetAll
     */
    public function getAll(\$where, \$orderColun, \$order, \$page, \$sizePage){
    	\$list".ucfirst($table[0])." = \$this->connection->getAll(\"".$table[0]."\", \$where, \$orderColun, \$order, \$page, \$sizePage);        
        \$list".ucfirst($table[0])."Result = Array(); 
    	
    	foreach (\$list".ucfirst($table[0])." as \$result){
            \$".$table[0]." = new ".ucfirst($table[0])."();            
         ";
           
            $coluns = getColum($table[0]);
                
            while ( $row = $coluns->fetch() ) {
                $control = true;
                
                $field = $row ['Field'];                
                
                $fks    = getFk($table[0]);
                
                while ( $fk = $fks->fetch() ) {
                    
                    if($field == $fk['coluna']){
                        $control = false;                        
                    }
                    
                }
                
                if($control){//CAMPO NORMAL
                    $str .= "

            //".strtoupper($row ['Field'])."
            \$".$table[0]."->set".ucfirst($row ['Field'])."(\$result['".$row ['Field']."']);"; //CAMPO NORMAL
                
                }else{//FK
                
                    $fkTable = getFkTable($table[0],$row ['Field']);
                    $tab = $fkTable->fetch();
                    
                    $str .= "
           if(\$result['".$row ['Field']."'] != null){
                //".strtoupper($row ['Field'])."
                \$".$tab['tabela_referencia']."Adapter = new ".ucfirst($tab['tabela_referencia'])."Adapter(\$this->connection);
				\$filter = new FilterWhere();
                \$filter->setCollum('".$tab["coluna_referencia"]."');
                \$filter->setValue(\$result['".$row ['Field']."']);
                \$list = Array(\$filter);                


                \$result".ucfirst($tab['tabela_referencia'])." = \$".$tab['tabela_referencia']."Adapter->getAll(\$list, \"\", \"\", 0, 0);
            	\$".$table[0]."->set".ucfirst($row ['Field'])."(\$result".ucfirst($tab['tabela_referencia'])."[0]);
                
           }
";
                    
                }
            }
            
            $str .= "
            \$list".ucfirst($table[0])."Result[] = \$".$table[0].";";
            
            $str .= "
        }
";
            $str .= "
        return \$list".ucfirst($table[0])."Result;";
            
            $str .= "
    }";
            $str .= "

    /**
     * Create
     */
    public function create(\$".$table[0].") {
        return \$this->connection->merge(\$".$table[0].");        
    }";
            
            $str .="

    /**
     * Delete
     */
    public function delete(\$".$table[0]."){
         return \$this->connection->delete(\$".$table[0].");
    }";
            
         $str .= "
}
?>";
        
        gravar("engine/adapter/".ucfirst($table[0])."Adapter.php", $strHeader.$str);
    }
}

function setUseAdapter($strHeader,$table) {
	
	if (strpos($strHeader, ucfirst($table)) !== false) {
		$strHeader = $strHeader;
	}else{
		$strHeader .= 'use '.$table.';
';
	}
	
	return $strHeader;
}




//-----------------------CREATE_ADAPTER-------------------------------------
//-----------------------CREATE_DAOS--------------------------------------
function createDao()
{
    $tables = getAllTables();

    while ($table = $tables->fetch()) {

        $str = "<?php
    namespace engine\dao;
   		
    class " . ucfirst($table[0]) . " implements \JsonSerializable {
";

        $str .= montaColunasDao($table[0]);
        $str .= montaPrimarys($table[0]);
        $str .= getSerializer($table[0]);
        $str .= montaGetSetDao($table[0]);
        $str .= '
	}
?>';
        gravar("engine/dao/".ucfirst($table[0]).".php", $str);
    }
}

function montaColunasDao($table) {
    $sth = getColum($table);
    
    $arrayColl = '';    
    while ( $row = $sth->fetch() ) {
        $arrayColl .= '
		private $' . $row ['Field'] . ';';
    }
    
    return $arrayColl;
}

function montaPrimarys($table) {
    
    $sth = getPrimaryKeys( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function getKeys() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount();
    
    while ( $row = $sth->fetch() ) {        
        $construct .= "
				'" . $row ['Column_name'] . '\' =>$this->get' . ucfirst ( $row ['Column_name'] ) . "()";
        
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }
    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function getSerializer($table) {
    $sth = getColum( $table );
    $cont = 1;
    
    $construct = '
';
    $construct .= '
		public function jsonSerialize() {';
    $construct .= '
			return [';
    
    $size = $sth->rowCount ();
    
    while ( $row = $sth->fetch () ) {
        
        $construct .= "
				'" . $row ['Field'] . '\' =>$this->get' . ucfirst ( $row ['Field'] ) . "()";
        // echo '<br>'.$cont.'->'.$size;
        if ($cont < $size) {
            $construct .= ",";
        }
        
        $cont ++;
    }
    // echo "<br><br>";
    
    $construct .= '
			];';
    $construct .= "
		}";
    return $construct;
}

function montaGetSetDao($table) {
    $colunas = getColum($table);
    
    $StringGetSet = '
			';
    
    while ( $row = $colunas->fetch () ) {
        
        $StringGetSet .= '
		//' . strtoupper ( $row ['Field'] );
        
        $StringGetSet .= '
		function get' . ucfirst ( $row ['Field'] ) . '() {
			' . 'return $this->' . $row ['Field'] . ';
		}';
        $StringGetSet .= '
		function set' . ucfirst ( $row ['Field'] ) . '($' . $row ['Field'] . ') {
			' . 'return $this->' . $row ['Field'] . ' = $' . $row ['Field'] . ';
		}';
        
        $StringGetSet .= '
		';
    }
    
    return $StringGetSet;
}
//-----------------------CREATE_DAOS-------------------------------------

//-----------------------CREATE_INTERACTOR--------------------------------------

function createInteractor() {
    $tables = getAllTables();
    
    while ($table = $tables->fetch()) {
        
        $strHeader = "<?php    
";
        $strHeader = setUseInteractor($strHeader, 'engine\adapter');
        $strHeader = setUseInteractor($strHeader, 'engine\connection');
        $strHeader = setUseInteractor($strHeader, 'engine\dao');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\FilterWhere');
        $strHeader = setUseInteractor($strHeader, 'engine\utils\ResponseDelete');
        
        $str ="";
        
        $str .= "
/**
 * FindAll
 */
function findAll()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array(); 

";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');		
		\$where->setValue(\$_REQUEST['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= " 
    if(isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
 
		 \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_REQUEST['".strtolower($row['Field'])."']);
		 \$list[]=\$where;

    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {

		\$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_REQUEST['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
        
    }";
            
        }
    }
    		$str .= "

 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
    
            $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result);
";
    
                $str .= "
}
";
        $str .= "
/**
 * Get
 */
function get()
{
    \$where = new FilterWhere();
	\$page = 0;
	\$pageSize = 0;
	\$list = Array();

";
        $coluns = getColum($table[0]);
        
        while ( $row = $coluns->fetch() ) {
            if(strtolower($row['Field']) == 'id'){
                $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
		\$where = new FilterWhere();
		\$where->setCollum('".$table[0].".id');
		\$where->setValue(\$_GET['".strtolower("id")."']);
        \$list[]=\$where;
    }
";
            }else if(strpos($row['Type'], 'int') !== false){
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
         \$where = new FilterWhere();       
		 \$where->setCollum('".strtolower($table[0].".".$row['Field'])."');         
		 \$where->setValue(\$_GET['".strtolower($row['Field'])."']);
		 \$list[]=\$where;
    }
";
            }else{
                $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
       \$where = new FilterWhere();       
		\$where->setCollum('".strtolower($table[0].".".$row['Field'])."');
        \$where->setCondition('like');
		\$where->setValue('%'.\$_GET['".strtolower($row['Field'])."'].'%');
		\$list[]=\$where;
    }";
                
            }
        }
        
        $str .= "
        		
 	if (isset(\$_REQUEST['page'])) {
    	\$page = \$_REQUEST['page'];
    }
    if (isset(\$_REQUEST['pageSize'])) {
    	\$pageSize = \$_REQUEST['pageSize'];
    }
"; 
        
        $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->getAll(\$list, \"\", \"\", \$page, \$pageSize);
        
    return json_encode(\$result);
";
        $str .= "
}
"; 
        $str .= "
/**
 * Delete
 */
function delete()
{
    \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_GET['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_GET['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_GET['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_GET['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    
   
    
    
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->delete(\$".strtolower($table[0]).");

    ";    
	$str .= "
	\$response = new ResponseDelete();
	\$response->setSize(\$result);
	if(\$result > 0){
		\$response->setStatus(true);
	}else{
		\$response->setStatus(false);
	}	
";
	$str .= "
    return json_encode(\$response);
";
    
    $str .= "
}
";
        $str .="
/**
 * Put
 */
function put()
{
 \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $str .="
	\$post_vars = getParametersPUT();
	\$listKey = array(\"id\");	
	
	if(!validPut(\$listKey,\$post_vars)){
		http_response_code(400);
		return; 
	}";
    
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$post_vars['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$post_vars['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$post_vars['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$post_vars['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result);
";
    
    $str .="
}
";
        
        $str .="
/**
 * Insert
 */
function insert()
{
    \$".strtolower($table[0])." = new dao\\".ucfirst($table[0])."();
";
    $coluns = getColum($table[0]);
                
    while ( $row = $coluns->fetch() ) {
        if(strtolower($row['Field']) == 'id'){
            $str .= "
    if (isset(\$_REQUEST['".strtolower("id")."'])) {        
        \$".strtolower($table[0])."->setId(\$_REQUEST['".strtolower("id")."']);
    }
";
        }else if(strpos($row['Type'], 'int') !== false){
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }
";
        }else{
            $str .= "
    if (isset(\$_REQUEST['".strtolower($row['Field'])."'])) {
        \$".strtolower($table[0])."->set".ucfirst($row['Field'])."(\$_REQUEST['".strtolower($row['Field'])."']);
    }";
            
        }
    }
    $str .= "
    \$connection = new connection\Connection();
    \$".strtolower($table[0])."Adapter = new adapter\\".ucfirst($table[0])."Adapter(\$connection);
    \$result = \$".strtolower($table[0])."Adapter->create(\$".strtolower($table[0]).");
        
    return json_encode(\$result);
";
    
    $str .="       
}
";
        
        $str .= "
?>";
        gravar("engine/interactor/".strtolower($table[0]).".php", $strHeader.$str);
    }
}


function setUseInteractor($strHeader,$table) {
    
    if (strpos($strHeader, ucfirst($table)) !== false) {        
        $strHeader = $strHeader;
    }else{        
        $strHeader .= 'use '.$table.';
';
    }
    
    return $strHeader;
}

//-----------------------CREATE_INTERACTOR--------------------------------------
//-----------------------RESOURCES--------------------------------------

function getAutoload()
{
    $str = "<?php
        spl_autoload_register(function (\$class) {
            require __DIR__ . \"/\" . str_replace(\"\\\\\", \"/\", \$class) . \".php\";
        });
?>";

    gravar("Autoload.php", $str);
}

function getBarramento()
{
    $str = "<?php
	echo \"<b>Barramentos:</b><br><br>\";
    if (\$handle = opendir('./engine/interactor')) {
            
		while (false !== (\$entry = readdir(\$handle))) {
			if (\$entry != \".\" && \$entry != \"..\") {
				if(\$entry != \"base.php\"){
					
					\$url = \$_SERVER ['HTTP_HOST'] .\"/\". explode('/', \$_SERVER['REQUEST_URI'])[1].\"/api/\";				
					echo \$url 					    
						.str_replace(\".php\",\"\",\$entry)
						.\"<br>\";

				}
			}
		}
            
		closedir(\$handle);
	}
?>";

    gravar("barramento.php", $str);
}

function getHost() {
    $str = "<?php
namespace engine;

class Hosts{
    
    private \$oficial   = false;   
    private \$showDebug = false; 
    private \$banco   = \"\";
    private \$ip      = \"\";
    private \$usuario = \"\";
    private \$senha   = \"\";
    private \$folder  = \"\";
    
    
    function __construct() {
        if(\$this->oficial){
            \$this->banco   = \"".BANCO."\";
            \$this->ip      = \"".IP."\";
            \$this->usuario = \"".USUARIO."\";
            \$this->senha   = \"".SENHA."\";
        }else{
            \$this->banco   = \"".BANCO_T."\";
            \$this->ip      = \"".IP_T."\";
            \$this->usuario = \"".USUARIO_T."\";
            \$this->senha   = \"".SENHA_T."\";
        }
    }
    
    
    function getBanco()
    {
        return \$this->banco;
        
    }

    function getIp()
    { 
        return \$this->ip;
        
    }
    
    function getUsuario()
    {
        return \$this->usuario;
        
    }

    function getSenha()
    {
        return \$this->senha;
    }

    function getShowDebug()
    {
        return \$this->showDebug;
    }
}
?>";
    
    gravar(FOLDER."/Hosts.php", $str);
}

function getConnection() {
    $str = 
"<?php
namespace engine\connection;
        
use engine;
use engine\utils\FilterWhere;

require_once(__DIR__.'/../lib/SqlFormatter.php');
include_once(__DIR__.'/../lib/ChromePhp.php');
        
class Connection{
        
    private \$pdo_ = null;
    private \$bancoName;
    private \$showcaseSQL;
        
        
    function __construct()
    {
        \$this->pdo_ = \$this->getConnect();
    }
        
    /**
     * Metodo SQL de INSERT
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    private function insert(\$object)
    {
        \$id = null;
        
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$campos = '';
        \$valores = '';
        \$sql = '';
        
        
        \$json = json_decode(json_encode(\$object), true);
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$virgula = '';
        \$aspas = '';
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (\$i > 0) {
                \$virgula = ',';
            } else {
                \$virgula = '';
            }
        
            \$campos .= (\$virgula . \$jsonKeys[\$i]);
        
            if (strcasecmp('string', gettype(\$jsonData[\$i])) == 0) {
                \$aspas = '\\'';
            } else {
                \$aspas = '';
            }
        
            if (\$jsonData[\$i] == null) {
                \$valores .= (\$virgula . 'null');
            } else {
                \$valores .= (\$virgula . \$aspas . \$jsonData[\$i] . \$aspas);
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= 'INSERT INTO ' . \$this->bancoName . '.' . \$nameTable . ' (' . \$campos . ')VALUES(' . \$valores . ')';
        
        \$this->showCase(\$sql);
        
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        \$id = \$this->pdo_->lastInsertId();
        \$this->commitConection();
        
        
        return \$id;
    }
        
    /**
     * Mï¿½todo SQL de UPDATE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return OBJECT
     */
    private function update(\$object)
    {
        \$pieces = explode('\\\', get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        
        
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$set = '';
        \$sql = '';
        
        
        \$json = json_decode(json_encode(\$object), true);
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$virgula = '';
        \$aspas = '';
        \$where = '';
        \$id = null;
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (\$i > 0) {
                \$virgula = ',';
            } else {
                \$virgula = '';
            }
        
            \$dados = '';
            if (\$jsonData[\$i] == null) {
                \$dados = 'null';
            } else {
                \$dados = \$jsonData[\$i];
            }
        
            if (strcasecmp('string', gettype(\$jsonData[\$i])) == 0) {
                \$aspas = '\\'';
            } else {
                \$aspas = '';
            }
        
            if (strcasecmp('id', \$jsonKeys[\$i]) == 0) {
                \$where = 'id=' . \$jsonData[\$i];
                \$id = \$jsonData[\$i];
            }
        
            \$set .= (\$virgula . \$jsonKeys[\$i] . '=' . \$aspas . \$dados . \$aspas);
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= ' UPDATE ' . \$this->bancoName . '.' . \$nameTable;
        \$sql .= ' SET ' . \$set;
        \$sql .= ' WHERE ' . \$where;
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        \$resultAfected = \$sth->rowCount();
        \$this->commitConection();
        
        return \$id;
    }
        
    /**
     * Metodo SQL de DELETE
     *
     * @param \$object =
     *            Objeto de dados contendo colunas e valores
     * @return \$object
     */
    function delete(\$object)
    {
        \$pieces = explode(DIRECTORY_SEPARATOR, get_class(\$object));
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        
        \$sql = '';
        \$where = '';
        
        \$tempjson = json_encode(\$object);
        \$json = json_decode(\$tempjson, true);
        
        \$jsonKeys = array_keys(\$json);
        \$jsonData = array_values(\$json);
        
        \$resultSize = 0;
        
        for (\$i = 0; \$i < sizeof(\$jsonKeys); \$i ++) {
            if (strcasecmp('id', \$jsonKeys[\$i]) == 0) {
                \$where = 'id=' . \$jsonData[\$i];
                \$resultSize = \$jsonData[\$i];
            }
        }
        
        // Concatena todas as variaveis e finaliza a instrucao
        \$sql .= ' DELETE FROM ' . \$this->bancoName . '.' . \$nameTable;
        \$sql .= ' WHERE ' . \$where;
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();  
        \$resultSize= \$sth->rowCount();
        \$this->commitConection();
        
        return \$resultSize;
    }
        
    /**
     * Persist Object Informations
     *
     * @param
     *            \$object
     */
    function persist(\$object)
    {
        return \$this->insert(\$object);
    }
        
    function merge(\$object)
    {
    	\$listWhere = Array();
    	\$pieces = \"\";
    	\$nameTable = \"\";
    	\$tempjson = \"\";
    	\$json = \"\";
    	\$jsonData = \"\";
    	\$list = null;
    	\$id = 0;
    	
        \$pieces = explode('\\\', get_class(\$object));
        
        \$nameTable = \$pieces[sizeof(\$pieces) - 1];
        //TO LOWER
        \$nameTable = strtolower(\$nameTable);
        
        \$tempjson = json_encode(\$object);
        
        \$json = json_decode(\$tempjson, true);
        
        \$jsonData = array_values(\$json);
        
        \$list = \$object->getKeys();
        
        
        if (\$list != null) {
        
            // //PRIMARY KEYS
            \$listKeys = array_keys(\$list);
        
            // //WHERE            
            
            \$anding = '';
        
            for (\$i = 0; \$i < sizeof(\$listKeys); \$i ++) {
        
                if(\$jsonData[\$i] != null){
                	\$where = new FilterWhere();
                	\$where->setCollum(\$listKeys[\$i]);
                	\$where->setValue(\$jsonData[\$i]);
                	\$listWhere[] = \$where;
                }
        
            }        
            
            if(sizeof(\$listWhere)>0){
        
                \$orderColun = '';
        
                \$result = \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
                if (sizeof(\$result) > 0) {
        
                	\$id = \$this->update(\$object);
                } else {
        
                	\$id = \$this->insert(\$object);
                }
            }else{
            	\$id = \$this->insert(\$object);
            }
        } else {
        	\$id = \$this->insert(\$object);
        }        
        
        return \$this->getAll(\$nameTable, \$listWhere, \$orderColun, true, 0, 0);
                
    }
        
    /**
     * /**
     * Método SQL de SELECT
     *
     * @param String \$table
     * @param FilterWhere \$where
     * @param String \$orderColun
     * @param boolean \$order
     *            == (true -> 'ASC' or false-> 'DESC')
     * @return array object
     */
    function getAll(\$table, \$where, \$orderColun, \$order = true, \$page, \$sizePage)
    {   
        \$table = strtolower(\$table);
        \$lista = \$this->showColum(\$table);
        
        
        \$coluns = '';
        \$virgula = '';
        \$cont = 0;
        
        while (\$row = \$lista->fetch()) {
        
            if (\$cont == 0) {
                \$virgula = '';
            } else {
                \$virgula = ',';
            }
        
            \$coluns .= \$virgula . \$row['Field'];
            \$cont ++;
        }
        
        \$sql = ' SELECT ' . \$coluns;
        \$sql .= ' FROM ' . \$this->bancoName . '.' . \$table;
        
        //var_dump(\$where);
        
        \$params = Array();
        
		if (sizeof(\$where)>0) {
			
			\$sql .= ' WHERE ';
			
			for (\$i = 0; \$i < sizeof(\$where); \$i++) {
			
				if(\$i > 0){
					\$sql .= ' AND ';
				}
				
				\$sql .= \$where[\$i]->getCollum().\" \".\$where[\$i]->getCondition().\" :param\".\$i;
				
				\$params[] = \$where[\$i]->getValue();
				
				\$cont++;			
			}            
        }
        
        if (strlen(\$orderColun)>0) {
            \$sql .= ' ORDER BY ' . \$orderColun;
        }

        
        if ((strlen(\$orderColun)>0)) {
            if (\$order) {
                \$sql .= ' ASC ';
            } else if (! \$order) {
                \$sql .= ' DESC ';
            }
        }
        
        if (!(strcasecmp(null, \$page) == 0) && \$sizePage > 0) {
        	if(\$page > 0){
            	\$sql .= ' LIMIT ' . (\$page - 1) * \$sizePage . ',' . \$sizePage;
        	}else{
        		\$sql .= ' LIMIT ' . 0 * \$sizePage . ',' . \$sizePage;
        	}
        }
        
        \$this->showCase(\$sql);
        
        \$this->beginConnection();
       
        \$sth = \$this->pdo_->prepare(\$sql);
        
        for (\$i = 0; \$i < sizeof(\$params); \$i++) {
        	if(gettype(\$params[\$i]) == \"string\"){
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_STR);
        	}else{
        		\$sth->bindValue(\":param\".\$i, \$params[\$i],\PDO::PARAM_INT);
        	}        	
        }
       
        \$sth->execute();
        
        
        \$this->commitConection();
        
        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        return \$array;
    }
        
    function execSelect(\$sql){
        \$this->beginConnection();       
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();                
        \$this->commitConection();

        \$array = Array();
        
        while (\$foren = \$sth->fetch(\PDO::FETCH_ASSOC)) {
            \$array[] = \$foren;
        }
        
        return \$array;
    }

    // -------------------------------------------UTILS-----------------------------------------------
        
    /**
     * Return PDO Connection
     *
     * @return /PDO
     */
    private function getConnect()
    {
        \$host = new engine\Hosts();
        \$this->bancoName   = \$host->getBanco();
        \$this->showcaseSQL = \$host->getShowDebug();
        
        \$dsn = 'mysql:dbname=' . \$host->getBanco() . ';host=' . \$host->getIp().';charset=utf8';
        
        \$options = [
            \PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for 'real' prepared statements
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            \PDO::ATTR_PERSISTENT => true
        ];
        
        try{
        \$this->pdo_ = new \PDO(\$dsn
            ,  \$host->getUsuario()
            ,  \$host->getSenha()
            ,  \$options
            );
        
        }catch (\Exception \$e){
            error_log(\$e->getMessage());
            exit('Algo estranho aconteceu ao conectar com o Banco de Dados!'); //something a user can understand
        }
        return \$this->pdo_;
    }
        
    /**
     * Begin Connection
     */
    private function beginConnection()
    {
        \$this->pdo_->beginTransaction();
    }
        
    /**
     * Commit Conection
     */
    private function commitConection()
    {
        \$this->pdo_->commit();
    }
        
    /**
     * Show Coluns
     *
     * @param
     *            \$table
     * @return /PDOStatement
     */
    private function showColum(\$table)
    {
        
        \$sql = 'SHOW COLUMNS FROM ' . \$this->bancoName . '.' . strtolower(\$table);
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showPrimaryKey(\$table)
    {
        \$sql = 'SHOW KEYS FROM ' . \$this->bancoName . '.' . \$table . '  WHERE Key_name = \'PRIMARY\'';
        
        \$this->beginConnection();
        
        \$sth = \$this->pdo_->prepare(\$sql);
        \$sth->execute();
        
        \$this->commitConection();
        
        return \$sth;
    }
        
    private function showCase(\$values){
        if(\$this->showcaseSQL){

			if(\$this->chromePHP){

				echo \SqlFormatter::format(\$values,false).\"\";
				\ChromePhp::warn(\SqlFormatter::format(\$values,false));

			}else{

				echo \SqlFormatter::format(\$values,false).\"\";

			}   
        	        	
        }		
    }
    // -------------------------------------------UTILS FIM-----------------------------------------------
}
?>
";
    
    gravar(CONNECTION."Connection.php", $str);
}

function getComposer() {
    $str= "{}";
    gravar("composer.json", $str);
}

function getlibSqlFormatter() {
    $str = "<?php
/**
 * SQL Formatter is a collection of utilities for debugging SQL queries.
 * It includes methods for formatting, syntax highlighting, removing comments, etc.
 *
 * @package    SqlFormatter
 * @author     Jeremy Dorn <jeremy@jeremydorn.com>
 * @author     Florin Patan <florinpatan@gmail.com>
 * @copyright  2013 Jeremy Dorn
 * @license    http://opensource.org/licenses/MIT
 * @link       http://github.com/jdorn/sql-formatter
 * @version    1.2.18
 */
class SqlFormatter
{
    // Constants for token types
    const TOKEN_TYPE_WHITESPACE = 0;
    const TOKEN_TYPE_WORD = 1;
    const TOKEN_TYPE_QUOTE = 2;
    const TOKEN_TYPE_BACKTICK_QUOTE = 3;
    const TOKEN_TYPE_RESERVED = 4;
    const TOKEN_TYPE_RESERVED_TOPLEVEL = 5;
    const TOKEN_TYPE_RESERVED_NEWLINE = 6;
    const TOKEN_TYPE_BOUNDARY = 7;
    const TOKEN_TYPE_COMMENT = 8;
    const TOKEN_TYPE_BLOCK_COMMENT = 9;
    const TOKEN_TYPE_NUMBER = 10;
    const TOKEN_TYPE_ERROR = 11;
    const TOKEN_TYPE_VARIABLE = 12;
        
    // Constants for different components of a token
    const TOKEN_TYPE = 0;
    const TOKEN_VALUE = 1;
        
    // Reserved words (for syntax highlighting)
    protected static \$reserved = array(
        'ACCESSIBLE', 'ACTION', 'AGAINST', 'AGGREGATE', 'ALGORITHM', 'ALL', 'ALTER', 'ANALYSE', 'ANALYZE', 'AS', 'ASC',
        'AUTOCOMMIT', 'AUTO_INCREMENT', 'BACKUP', 'BEGIN', 'BETWEEN', 'BINLOG', 'BOTH', 'CASCADE', 'CASE', 'CHANGE', 'CHANGED', 'CHARACTER SET',
        'CHARSET', 'CHECK', 'CHECKSUM', 'COLLATE', 'COLLATION', 'COLUMN', 'COLUMNS', 'COMMENT', 'COMMIT', 'COMMITTED', 'COMPRESSED', 'CONCURRENT',
        'CONSTRAINT', 'CONTAINS', 'CONVERT', 'CREATE', 'CROSS', 'CURRENT_TIMESTAMP', 'DATABASE', 'DATABASES', 'DAY', 'DAY_HOUR', 'DAY_MINUTE',
        'DAY_SECOND', 'DEFAULT', 'DEFINER', 'DELAYED', 'DELETE', 'DESC', 'DESCRIBE', 'DETERMINISTIC', 'DISTINCT', 'DISTINCTROW', 'DIV',
        'DO', 'DUMPFILE', 'DUPLICATE', 'DYNAMIC', 'ELSE', 'ENCLOSED', 'END', 'ENGINE', 'ENGINE_TYPE', 'ENGINES', 'ESCAPE', 'ESCAPED', 'EVENTS', 'EXEC',
        'EXECUTE', 'EXISTS', 'EXPLAIN', 'EXTENDED', 'FAST', 'FIELDS', 'FILE', 'FIRST', 'FIXED', 'FLUSH', 'FOR', 'FORCE', 'FOREIGN', 'FULL', 'FULLTEXT',
        'FUNCTION', 'GLOBAL', 'GRANT', 'GRANTS', 'GROUP_CONCAT', 'HEAP', 'HIGH_PRIORITY', 'HOSTS', 'HOUR', 'HOUR_MINUTE',
        'HOUR_SECOND', 'IDENTIFIED', 'IF', 'IFNULL', 'IGNORE', 'IN', 'INDEX', 'INDEXES', 'INFILE', 'INSERT', 'INSERT_ID', 'INSERT_METHOD', 'INTERVAL',
        'INTO', 'INVOKER', 'IS', 'ISOLATION', 'KEY', 'KEYS', 'KILL', 'LAST_INSERT_ID', 'LEADING', 'LEVEL', 'LIKE', 'LINEAR',
        'LINES', 'LOAD', 'LOCAL', 'LOCK', 'LOCKS', 'LOGS', 'LOW_PRIORITY', 'MARIA', 'MASTER', 'MASTER_CONNECT_RETRY', 'MASTER_HOST', 'MASTER_LOG_FILE',
        'MATCH','MAX_CONNECTIONS_PER_HOUR', 'MAX_QUERIES_PER_HOUR', 'MAX_ROWS', 'MAX_UPDATES_PER_HOUR', 'MAX_USER_CONNECTIONS',
        'MEDIUM', 'MERGE', 'MINUTE', 'MINUTE_SECOND', 'MIN_ROWS', 'MODE', 'MODIFY',
        'MONTH', 'MRG_MYISAM', 'MYISAM', 'NAMES', 'NATURAL', 'NOT', 'NOW()','NULL', 'OFFSET', 'ON', 'OPEN', 'OPTIMIZE', 'OPTION', 'OPTIONALLY',
        'ON UPDATE', 'ON DELETE', 'OUTFILE', 'PACK_KEYS', 'PAGE', 'PARTIAL', 'PARTITION', 'PARTITIONS', 'PASSWORD', 'PRIMARY', 'PRIVILEGES', 'PROCEDURE',
        'PROCESS', 'PROCESSLIST', 'PURGE', 'QUICK', 'RANGE', 'RAID0', 'RAID_CHUNKS', 'RAID_CHUNKSIZE','RAID_TYPE', 'READ', 'READ_ONLY',
        'READ_WRITE', 'REFERENCES', 'REGEXP', 'RELOAD', 'RENAME', 'REPAIR', 'REPEATABLE', 'REPLACE', 'REPLICATION', 'RESET', 'RESTORE', 'RESTRICT',
        'RETURN', 'RETURNS', 'REVOKE', 'RLIKE', 'ROLLBACK', 'ROW', 'ROWS', 'ROW_FORMAT', 'SECOND', 'SECURITY', 'SEPARATOR',
        'SERIALIZABLE', 'SESSION', 'SHARE', 'SHOW', 'SHUTDOWN', 'SLAVE', 'SONAME', 'SOUNDS', 'SQL',  'SQL_AUTO_IS_NULL', 'SQL_BIG_RESULT',
        'SQL_BIG_SELECTS', 'SQL_BIG_TABLES', 'SQL_BUFFER_RESULT', 'SQL_CALC_FOUND_ROWS', 'SQL_LOG_BIN', 'SQL_LOG_OFF', 'SQL_LOG_UPDATE',
        'SQL_LOW_PRIORITY_UPDATES', 'SQL_MAX_JOIN_SIZE', 'SQL_QUOTE_SHOW_CREATE', 'SQL_SAFE_UPDATES', 'SQL_SELECT_LIMIT', 'SQL_SLAVE_SKIP_COUNTER',
        'SQL_SMALL_RESULT', 'SQL_WARNINGS', 'SQL_CACHE', 'SQL_NO_CACHE', 'START', 'STARTING', 'STATUS', 'STOP', 'STORAGE',
        'STRAIGHT_JOIN', 'STRING', 'STRIPED', 'SUPER', 'TABLE', 'TABLES', 'TEMPORARY', 'TERMINATED', 'THEN', 'TO', 'TRAILING', 'TRANSACTIONAL', 'TRUE',
        'TRUNCATE', 'TYPE', 'TYPES', 'UNCOMMITTED', 'UNIQUE', 'UNLOCK', 'UNSIGNED', 'USAGE', 'USE', 'USING', 'VARIABLES',
        'VIEW', 'WHEN', 'WITH', 'WORK', 'WRITE', 'YEAR_MONTH'
    );
        
    // For SQL formatting
    // These keywords will all be on their own line
    protected static \$reserved_toplevel = array(
        'SELECT', 'FROM', 'WHERE', 'SET', 'ORDER BY', 'GROUP BY', 'LIMIT', 'DROP',
        'VALUES', 'UPDATE', 'HAVING', 'ADD', 'AFTER', 'ALTER TABLE', 'DELETE FROM', 'UNION ALL', 'UNION', 'EXCEPT', 'INTERSECT'
    );
        
    protected static \$reserved_newline = array(
        'LEFT OUTER JOIN', 'RIGHT OUTER JOIN', 'LEFT JOIN', 'RIGHT JOIN', 'OUTER JOIN', 'INNER JOIN', 'JOIN', 'XOR', 'OR', 'AND'
    );
        
    protected static \$functions = array (
        'ABS', 'ACOS', 'ADDDATE', 'ADDTIME', 'AES_DECRYPT', 'AES_ENCRYPT', 'AREA', 'ASBINARY', 'ASCII', 'ASIN', 'ASTEXT', 'ATAN', 'ATAN2',
        'AVG', 'BDMPOLYFROMTEXT',  'BDMPOLYFROMWKB', 'BDPOLYFROMTEXT', 'BDPOLYFROMWKB', 'BENCHMARK', 'BIN', 'BIT_AND', 'BIT_COUNT', 'BIT_LENGTH',
        'BIT_OR', 'BIT_XOR', 'BOUNDARY',  'BUFFER',  'CAST', 'CEIL', 'CEILING', 'CENTROID',  'CHAR', 'CHARACTER_LENGTH', 'CHARSET', 'CHAR_LENGTH',
        'COALESCE', 'COERCIBILITY', 'COLLATION',  'COMPRESS', 'CONCAT', 'CONCAT_WS', 'CONNECTION_ID', 'CONTAINS', 'CONV', 'CONVERT', 'CONVERT_TZ',
        'CONVEXHULL',  'COS', 'COT', 'COUNT', 'CRC32', 'CROSSES', 'CURDATE', 'CURRENT_DATE', 'CURRENT_TIME', 'CURRENT_TIMESTAMP', 'CURRENT_USER',
        'CURTIME', 'DATABASE', 'DATE', 'DATEDIFF', 'DATE_ADD', 'DATE_DIFF', 'DATE_FORMAT', 'DATE_SUB', 'DAY', 'DAYNAME', 'DAYOFMONTH', 'DAYOFWEEK',
        'DAYOFYEAR', 'DECODE', 'DEFAULT', 'DEGREES', 'DES_DECRYPT', 'DES_ENCRYPT', 'DIFFERENCE', 'DIMENSION', 'DISJOINT', 'DISTANCE', 'ELT', 'ENCODE',
        'ENCRYPT', 'ENDPOINT', 'ENVELOPE', 'EQUALS', 'EXP', 'EXPORT_SET', 'EXTERIORRING', 'EXTRACT', 'EXTRACTVALUE', 'FIELD', 'FIND_IN_SET', 'FLOOR',
        'FORMAT', 'FOUND_ROWS', 'FROM_DAYS', 'FROM_UNIXTIME', 'GEOMCOLLFROMTEXT', 'GEOMCOLLFROMWKB', 'GEOMETRYCOLLECTION', 'GEOMETRYCOLLECTIONFROMTEXT',
        'GEOMETRYCOLLECTIONFROMWKB', 'GEOMETRYFROMTEXT', 'GEOMETRYFROMWKB', 'GEOMETRYN', 'GEOMETRYTYPE', 'GEOMFROMTEXT', 'GEOMFROMWKB', 'GET_FORMAT',
        'GET_LOCK', 'GLENGTH', 'GREATEST', 'GROUP_CONCAT', 'GROUP_UNIQUE_USERS', 'HEX', 'HOUR', 'IF', 'IFNULL', 'INET_ATON', 'INET_NTOA', 'INSERT', 'INSTR',
        'INTERIORRINGN', 'INTERSECTION', 'INTERSECTS',  'INTERVAL', 'ISCLOSED', 'ISEMPTY', 'ISNULL', 'ISRING', 'ISSIMPLE', 'IS_FREE_LOCK', 'IS_USED_LOCK',
        'LAST_DAY', 'LAST_INSERT_ID', 'LCASE', 'LEAST', 'LEFT', 'LENGTH', 'LINEFROMTEXT', 'LINEFROMWKB', 'LINESTRING', 'LINESTRINGFROMTEXT', 'LINESTRINGFROMWKB',
        'LN', 'LOAD_FILE', 'LOCALTIME', 'LOCALTIMESTAMP', 'LOCATE', 'LOG', 'LOG10', 'LOG2', 'LOWER', 'LPAD', 'LTRIM', 'MAKEDATE', 'MAKETIME', 'MAKE_SET',
        'MASTER_POS_WAIT', 'MAX', 'MBRCONTAINS', 'MBRDISJOINT', 'MBREQUAL', 'MBRINTERSECTS', 'MBROVERLAPS', 'MBRTOUCHES', 'MBRWITHIN', 'MD5', 'MICROSECOND',
        'MID', 'MIN', 'MINUTE', 'MLINEFROMTEXT', 'MLINEFROMWKB', 'MOD', 'MONTH', 'MONTHNAME', 'MPOINTFROMTEXT', 'MPOINTFROMWKB', 'MPOLYFROMTEXT', 'MPOLYFROMWKB',
        'MULTILINESTRING', 'MULTILINESTRINGFROMTEXT', 'MULTILINESTRINGFROMWKB', 'MULTIPOINT',  'MULTIPOINTFROMTEXT', 'MULTIPOINTFROMWKB', 'MULTIPOLYGON',
        'MULTIPOLYGONFROMTEXT', 'MULTIPOLYGONFROMWKB', 'NAME_CONST', 'NULLIF', 'NUMGEOMETRIES', 'NUMINTERIORRINGS',  'NUMPOINTS', 'OCT', 'OCTET_LENGTH',
        'OLD_PASSWORD', 'ORD', 'OVERLAPS', 'PASSWORD', 'PERIOD_ADD', 'PERIOD_DIFF', 'PI', 'POINT', 'POINTFROMTEXT', 'POINTFROMWKB', 'POINTN', 'POINTONSURFACE',
        'POLYFROMTEXT', 'POLYFROMWKB', 'POLYGON', 'POLYGONFROMTEXT', 'POLYGONFROMWKB', 'POSITION', 'POW', 'POWER', 'QUARTER', 'QUOTE', 'RADIANS', 'RAND',
        'RELATED', 'RELEASE_LOCK', 'REPEAT', 'REPLACE', 'REVERSE', 'RIGHT', 'ROUND', 'ROW_COUNT', 'RPAD', 'RTRIM', 'SCHEMA', 'SECOND', 'SEC_TO_TIME',
        'SESSION_USER', 'SHA', 'SHA1', 'SIGN', 'SIN', 'SLEEP', 'SOUNDEX', 'SPACE', 'SQRT', 'SRID', 'STARTPOINT', 'STD', 'STDDEV', 'STDDEV_POP', 'STDDEV_SAMP',
        'STRCMP', 'STR_TO_DATE', 'SUBDATE', 'SUBSTR', 'SUBSTRING', 'SUBSTRING_INDEX', 'SUBTIME', 'SUM', 'SYMDIFFERENCE', 'SYSDATE', 'SYSTEM_USER', 'TAN',
        'TIME', 'TIMEDIFF', 'TIMESTAMP', 'TIMESTAMPADD', 'TIMESTAMPDIFF', 'TIME_FORMAT', 'TIME_TO_SEC', 'TOUCHES', 'TO_DAYS', 'TRIM', 'TRUNCATE', 'UCASE',
        'UNCOMPRESS', 'UNCOMPRESSED_LENGTH', 'UNHEX', 'UNIQUE_USERS', 'UNIX_TIMESTAMP', 'UPDATEXML', 'UPPER', 'USER', 'UTC_DATE', 'UTC_TIME', 'UTC_TIMESTAMP',
        'UUID', 'VARIANCE', 'VAR_POP', 'VAR_SAMP', 'VERSION', 'WEEK', 'WEEKDAY', 'WEEKOFYEAR', 'WITHIN', 'X', 'Y', 'YEAR', 'YEARWEEK'
    );
        
    // Punctuation that can be used as a boundary between other tokens
    protected static \$boundaries = array(',', ';',':', ')', '(', '.', '=', '<', '>', '+', '-', '*', '/', '!', '^', '%', '|', '&', '#');
        
    // For HTML syntax highlighting
    // Styles applied to different token types
    public static \$quote_attributes = 'style=\"color: blue;\"';
    public static \$backtick_quote_attributes = 'style=\"color: purple;\"';
    public static \$reserved_attributes = 'style=\"font-weight:bold;\"';
    public static \$boundary_attributes = '';
    public static \$number_attributes = 'style=\"color: green;\"';
    public static \$word_attributes = 'style=\"color: #333;\"';
    public static \$error_attributes = 'style=\"background-color: red;\"';
    public static \$comment_attributes = 'style=\"color: #aaa;\"';
    public static \$variable_attributes = 'style=\"color: orange;\"';
    public static \$pre_attributes = 'style=\"color: black; background-color: white;\"';
        
    // Boolean - whether or not the current environment is the CLI
    // This affects the type of syntax highlighting
    // If not defined, it will be determined automatically
    public static \$cli;
        
    // For CLI syntax highlighting
    public static \$cli_quote = \"\x1b[34;1m\";
    public static \$cli_backtick_quote = \"\x1b[35;1m\";
    public static \$cli_reserved = \"\x1b[37m\";
    public static \$cli_boundary = \"\";
    public static \$cli_number = \"\x1b[32;1m\";
    public static \$cli_word = \"\";
    public static \$cli_error = \"\x1b[31;1;7m\";
    public static \$cli_comment = \"\x1b[30;1m\";
    public static \$cli_functions = \"\x1b[37m\";
    public static \$cli_variable = \"\x1b[36;1m\";
        
    // The tab character to use when formatting SQL
    public static \$tab = '  ';
        
    // This flag tells us if queries need to be enclosed in <pre> tags
    public static \$use_pre = true;
        
    // This flag tells us if SqlFormatted has been initialized
    protected static \$init;
        
    // Regular expressions for tokenizing
    protected static \$regex_boundaries;
    protected static \$regex_reserved;
    protected static \$regex_reserved_newline;
    protected static \$regex_reserved_toplevel;
    protected static \$regex_function;
        
    // Cache variables
    // Only tokens shorter than this size will be cached.  Somewhere between 10 and 20 seems to work well for most cases.
    public static \$max_cachekey_size = 15;
    protected static \$token_cache = array();
    protected static \$cache_hits = 0;
    protected static \$cache_misses = 0;
        
    /**
     * Get stats about the token cache
     * @return Array An array containing the keys 'hits', 'misses', 'entries', and 'size' in bytes
     */
    public static function getCacheStats()
    {
        return array(
            'hits'=>self::\$cache_hits,
            'misses'=>self::\$cache_misses,
            'entries'=>count(self::\$token_cache),
            'size'=>strlen(serialize(self::\$token_cache))
        );
    }
        
    /**
     * Stuff that only needs to be done once.  Builds regular expressions and sorts the reserved words.
     */
    protected static function init()
    {
        if (self::\$init) return;
        
        // Sort reserved word list from longest word to shortest, 3x faster than usort
        \$reservedMap = array_combine(self::\$reserved, array_map('strlen', self::\$reserved));
        arsort(\$reservedMap);
        self::\$reserved = array_keys(\$reservedMap);
        
        // Set up regular expressions
        self::\$regex_boundaries = '('.implode('|',array_map(array(__CLASS__, 'quote_regex'),self::\$boundaries)).')';
        self::\$regex_reserved = '('.implode('|',array_map(array(__CLASS__, 'quote_regex'),self::\$reserved)).')';
        self::\$regex_reserved_toplevel = str_replace(' ','\\s+','('.implode('|',array_map(array(__CLASS__, 'quote_regex'),self::\$reserved_toplevel)).')');
        self::\$regex_reserved_newline = str_replace(' ','\\s+','('.implode('|',array_map(array(__CLASS__, 'quote_regex'),self::\$reserved_newline)).')');
        
        self::\$regex_function = '('.implode('|',array_map(array(__CLASS__, 'quote_regex'),self::\$functions)).')';
        
        self::\$init = true;
    }
        
    /**
     * Return the next token and token type in a SQL string.
     * Quoted strings, comments, reserved words, whitespace, and punctuation are all their own tokens.
     *
     * @param String \$string   The SQL string
     * @param array  \$previous The result of the previous getNextToken() call
     *
     * @return Array An associative array containing the type and value of the token.
     */
    protected static function getNextToken(\$string, \$previous = null)
    {
        // Whitespace
        if (preg_match('/^\s+/',\$string,\$matches)) {
            return array(
                self::TOKEN_VALUE => \$matches[0],
                self::TOKEN_TYPE=>self::TOKEN_TYPE_WHITESPACE
            );
        }
        
        // Comment
        if (\$string[0] === '#' || (isset(\$string[1])&&(\$string[0]==='-'&&\$string[1]==='-') || (\$string[0]==='/'&&\$string[1]==='*'))) {
            // Comment until end of line
            if (\$string[0] === '-' || \$string[0] === '#') {
                \$last = strpos(\$string, \"\n\");
                \$type = self::TOKEN_TYPE_COMMENT;
            } else { // Comment until closing comment tag
                \$last = strpos(\$string, \"*/\", 2) + 2;
                \$type = self::TOKEN_TYPE_BLOCK_COMMENT;
            }
        
            if (\$last === false) {
                \$last = strlen(\$string);
            }
        
            return array(
                self::TOKEN_VALUE => substr(\$string, 0, \$last),
                self::TOKEN_TYPE  => \$type
            );
        }
        
        // Quoted String
        if (\$string[0]==='\"' || \$string[0]==='\'' || \$string[0]==='`' || \$string[0]==='[') {
            \$return = array(
                self::TOKEN_TYPE => ((\$string[0]==='`' || \$string[0]==='[')? self::TOKEN_TYPE_BACKTICK_QUOTE : self::TOKEN_TYPE_QUOTE),
                self::TOKEN_VALUE => self::getQuotedString(\$string)
            );
        
            return \$return;
        }
        
        // User-defined Variable
        if ((\$string[0] === '@' || \$string[0] === ':') && isset(\$string[1])) {
            \$ret = array(
                self::TOKEN_VALUE => null,
                self::TOKEN_TYPE => self::TOKEN_TYPE_VARIABLE
            );
        
            // If the variable name is quoted
            if (\$string[1]==='\"' || \$string[1]==='\'' || \$string[1]==='`') {
                \$ret[self::TOKEN_VALUE] = \$string[0].self::getQuotedString(substr(\$string,1));
            }
            // Non-quoted variable name
            else {
                preg_match('/^('.\$string[0].'[a-zA-Z0-9\._\\$]+)/',\$string,\$matches);
                if (\$matches) {
                    \$ret[self::TOKEN_VALUE] = \$matches[1];
                }
            }
        
            if(\$ret[self::TOKEN_VALUE] !== null) return \$ret;
        }
        
        // Number (decimal, binary, or hex)
        if (preg_match('/^([0-9]+(\.[0-9]+)?|0x[0-9a-fA-F]+|0b[01]+)(\$|\s|\"\'`|'.self::\$regex_boundaries.')/',\$string,\$matches)) {
            return array(
                self::TOKEN_VALUE => \$matches[1],
                self::TOKEN_TYPE=>self::TOKEN_TYPE_NUMBER
            );
        }
        
        // Boundary Character (punctuation and symbols)
        if (preg_match('/^('.self::\$regex_boundaries.')/',\$string,\$matches)) {
            return array(
                self::TOKEN_VALUE => \$matches[1],
                self::TOKEN_TYPE  => self::TOKEN_TYPE_BOUNDARY
            );
        }
        
        // A reserved word cannot be preceded by a '.'
        // this makes it so in \"mytable.from\", \"from\" is not considered a reserved word
        if (!\$previous || !isset(\$previous[self::TOKEN_VALUE]) || \$previous[self::TOKEN_VALUE] !== '.') {
            \$upper = strtoupper(\$string);
            // Top Level Reserved Word
            if (preg_match('/^('.self::\$regex_reserved_toplevel.')(\$|\s|'.self::\$regex_boundaries.')/', \$upper,\$matches)) {
                return array(
                    self::TOKEN_TYPE=>self::TOKEN_TYPE_RESERVED_TOPLEVEL,
                    self::TOKEN_VALUE=>substr(\$string,0,strlen(\$matches[1]))
                );
            }
            // Newline Reserved Word
            if (preg_match('/^('.self::\$regex_reserved_newline.')(\$|\s|'.self::\$regex_boundaries.')/', \$upper,\$matches)) {
                return array(
                    self::TOKEN_TYPE=>self::TOKEN_TYPE_RESERVED_NEWLINE,
                    self::TOKEN_VALUE=>substr(\$string,0,strlen(\$matches[1]))
                );
            }
            // Other Reserved Word
            if (preg_match('/^('.self::\$regex_reserved.')(\$|\s|'.self::\$regex_boundaries.')/', \$upper,\$matches)) {
                return array(
                    self::TOKEN_TYPE=>self::TOKEN_TYPE_RESERVED,
                    self::TOKEN_VALUE=>substr(\$string,0,strlen(\$matches[1]))
                );
            }
        }
        
        // A function must be suceeded by '('
        // this makes it so \"count(\" is considered a function, but \"count\" alone is not
        \$upper = strtoupper(\$string);
        // function
        if (preg_match('/^('.self::\$regex_function.'[(]|\s|[)])/', \$upper,\$matches)) {
            return array(
                self::TOKEN_TYPE=>self::TOKEN_TYPE_RESERVED,
                self::TOKEN_VALUE=>substr(\$string,0,strlen(\$matches[1])-1)
            );
        }
        
        // Non reserved word
        preg_match('/^(.*?)(\$|\s|[\"\'`]|'.self::\$regex_boundaries.')/',\$string,\$matches);
        
        return array(
            self::TOKEN_VALUE => \$matches[1],
            self::TOKEN_TYPE  => self::TOKEN_TYPE_WORD
        );
    }
        
    protected static function getQuotedString(\$string)
    {
        \$ret = null;
        
        // This checks for the following patterns:
        // 1. backtick quoted string using `` to escape
        // 2. square bracket quoted string (SQL Server) using ]] to escape
        // 3. double quoted string using \"\" or \" to escape
        // 4. single quoted string using '' or \' to escape
    if ( preg_match('/^(((`[^`]*(\$|`))+)|((\[[^\]]*(\$|\]))(\][^\]]*(\$|\]))*)|((\"[^\"\\\\]*(?:\\\\.[^\"\\\\]*)*(\"|\$))+)|((\'[^\'\\\\]*(?:\\\\.[^\'\\\\]*)*(\'|\$))+))/s', \$string, \$matches)) {
        \$ret = \$matches[1];
    }
    
    return \$ret;
}

/**
 * Takes a SQL string and breaks it into tokens.
 * Each token is an associative array with type and value.
 *
 * @param String \$string The SQL string
 *
 * @return Array An array of tokens.
 */
protected static function tokenize(\$string)
{
    self::init();
    
    \$tokens = array();
    
    // Used for debugging if there is an error while tokenizing the string
    \$original_length = strlen(\$string);
    
    // Used to make sure the string keeps shrinking on each iteration
    \$old_string_len = strlen(\$string) + 1;
    
    \$token = null;
    
    \$current_length = strlen(\$string);
    
    // Keep processing the string until it is empty
    while (\$current_length) {
        // If the string stopped shrinking, there was a problem
        if (\$old_string_len <= \$current_length) {
            \$tokens[] = array(
                self::TOKEN_VALUE=>\$string,
                self::TOKEN_TYPE=>self::TOKEN_TYPE_ERROR
            );
            
            return \$tokens;
        }
        \$old_string_len =  \$current_length;
        
        // Determine if we can use caching
        if (\$current_length >= self::\$max_cachekey_size) {
            \$cacheKey = substr(\$string,0,self::\$max_cachekey_size);
        } else {
            \$cacheKey = false;
        }
        
        // See if the token is already cached
        if (\$cacheKey && isset(self::\$token_cache[\$cacheKey])) {
            // Retrieve from cache
            \$token = self::\$token_cache[\$cacheKey];
            \$token_length = strlen(\$token[self::TOKEN_VALUE]);
            self::\$cache_hits++;
        } else {
            // Get the next token and the token type
            \$token = self::getNextToken(\$string, \$token);
            \$token_length = strlen(\$token[self::TOKEN_VALUE]);
            self::\$cache_misses++;
            
            // If the token is shorter than the max length, store it in cache
            if (\$cacheKey && \$token_length < self::\$max_cachekey_size) {
                self::\$token_cache[\$cacheKey] = \$token;
            }
        }
        
        \$tokens[] = \$token;
        
        // Advance the string
        \$string = substr(\$string, \$token_length);
        
        \$current_length -= \$token_length;
    }
    
    return \$tokens;
}

/**
 * Format the whitespace in a SQL string to make it easier to read.
 *
 * @param String  \$string    The SQL string
 * @param boolean \$highlight If true, syntax highlighting will also be performed
 *
 * @return String The SQL string with HTML styles and formatting wrapped in a <pre> tag
 */
public static function format(\$string, \$highlight=true)
{
    // This variable will be populated with formatted html
    \$return = '';
    
    // Use an actual tab while formatting and then switch out with self::\$tab at the end
    \$tab = \"\t\";
        
        \$indent_level = 0;
        \$newline = false;
        \$inline_parentheses = false;
        \$increase_special_indent = false;
        \$increase_block_indent = false;
        \$indent_types = array();
        \$added_newline = false;
        \$inline_count = 0;
        \$inline_indented = false;
        \$clause_limit = false;
        
        // Tokenize String
        \$original_tokens = self::tokenize(\$string);
        
        // Remove existing whitespace
        \$tokens = array();
        foreach (\$original_tokens as \$i=>\$token) {
            if (\$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_WHITESPACE) {
                \$token['i'] = \$i;
                \$tokens[] = \$token;
            }
        }
        
        // Format token by token
        foreach (\$tokens as \$i=>\$token) {
            // Get highlighted token if doing syntax highlighting
            if (\$highlight) {
                \$highlighted = self::highlightToken(\$token);
            } else { // If returning raw text
                \$highlighted = \$token[self::TOKEN_VALUE];
            }
        
            // If we are increasing the special indent level now
            if (\$increase_special_indent) {
                \$indent_level++;
                \$increase_special_indent = false;
                array_unshift(\$indent_types,'special');
            }
            // If we are increasing the block indent level now
            if (\$increase_block_indent) {
                \$indent_level++;
                \$increase_block_indent = false;
                array_unshift(\$indent_types,'block');
            }
        
            // If we need a new line before the token
            if (\$newline) {
                \$return .= \"\n\" . str_repeat(\$tab, \$indent_level);
                \$newline = false;
                \$added_newline = true;
            } else {
                \$added_newline = false;
            }
        
            // Display comments directly where they appear in the source
            if (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_COMMENT || \$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_BLOCK_COMMENT) {
                if (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_BLOCK_COMMENT) {
                    \$indent = str_repeat(\$tab,\$indent_level);
                    \$return .= \"\n\" . \$indent;
                    \$highlighted = str_replace(\"\n\",\"\n\".\$indent,\$highlighted);
                }
        
                \$return .= \$highlighted;
                \$newline = true;
                continue;
            }
        
            if (\$inline_parentheses) {
                // End of inline parentheses
                if (\$token[self::TOKEN_VALUE] === ')') {
                    \$return = rtrim(\$return,' ');
        
                    if (\$inline_indented) {
                        array_shift(\$indent_types);
                        \$indent_level --;
                        \$return .= \"\n\" . str_repeat(\$tab, \$indent_level);
                    }
        
                    \$inline_parentheses = false;
        
                    \$return .= \$highlighted . ' ';
                    continue;
                }
        
                if (\$token[self::TOKEN_VALUE] === ',') {
                    if (\$inline_count >= 30) {
                        \$inline_count = 0;
                        \$newline = true;
                    }
                }
        
                \$inline_count += strlen(\$token[self::TOKEN_VALUE]);
            }
        
            // Opening parentheses increase the block indent level and start a new line
            if (\$token[self::TOKEN_VALUE] === '(') {
                // First check if this should be an inline parentheses block
                // Examples are \"NOW()\", \"COUNT(*)\", \"int(10)\", key(`somecolumn`), DECIMAL(7,2)
                // Allow up to 3 non-whitespace tokens inside inline parentheses
                \$length = 0;
                for (\$j=1;\$j<=250;\$j++) {
                    // Reached end of string
                    if (!isset(\$tokens[\$i+\$j])) break;
        
                    \$next = \$tokens[\$i+\$j];
        
                    // Reached closing parentheses, able to inline it
                    if (\$next[self::TOKEN_VALUE] === ')') {
                        \$inline_parentheses = true;
                        \$inline_count = 0;
                        \$inline_indented = false;
                        break;
                    }
        
                    // Reached an invalid token for inline parentheses
                    if (\$next[self::TOKEN_VALUE]===';' || \$next[self::TOKEN_VALUE]==='(') {
                        break;
                    }
        
                    // Reached an invalid token type for inline parentheses
                    if (\$next[self::TOKEN_TYPE]===self::TOKEN_TYPE_RESERVED_TOPLEVEL || \$next[self::TOKEN_TYPE]===self::TOKEN_TYPE_RESERVED_NEWLINE || \$next[self::TOKEN_TYPE]===self::TOKEN_TYPE_COMMENT || \$next[self::TOKEN_TYPE]===self::TOKEN_TYPE_BLOCK_COMMENT) {
                        break;
                    }
        
                    \$length += strlen(\$next[self::TOKEN_VALUE]);
                }
        
                if (\$inline_parentheses && \$length > 30) {
                    \$increase_block_indent = true;
                    \$inline_indented = true;
                    \$newline = true;
                }
        
                // Take out the preceding space unless there was whitespace there in the original query
                if (isset(\$original_tokens[\$token['i']-1]) && \$original_tokens[\$token['i']-1][self::TOKEN_TYPE] !== self::TOKEN_TYPE_WHITESPACE) {
                    \$return = rtrim(\$return,' ');
                }
        
                if (!\$inline_parentheses) {
                    \$increase_block_indent = true;
                    // Add a newline after the parentheses
                    \$newline = true;
                }
        
            }
        
            // Closing parentheses decrease the block indent level
            elseif (\$token[self::TOKEN_VALUE] === ')') {
                // Remove whitespace before the closing parentheses
                \$return = rtrim(\$return,' ');
        
                \$indent_level--;
        
                // Reset indent level
                while (\$j=array_shift(\$indent_types)) {
                    if (\$j==='special') {
                        \$indent_level--;
                    } else {
                        break;
                    }
                }
        
                if (\$indent_level < 0) {
                    // This is an error
                    \$indent_level = 0;
        
                    if (\$highlight) {
                        \$return .= \"\n\".self::highlightError(\$token[self::TOKEN_VALUE]);
                        continue;
                    }
                }
        
                // Add a newline before the closing parentheses (if not already added)
                if (!\$added_newline) {
                    \$return .= \"\n\" . str_repeat(\$tab, \$indent_level);
                }
            }
        
            // Top level reserved words start a new line and increase the special indent level
            elseif (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_RESERVED_TOPLEVEL) {
                \$increase_special_indent = true;
        
                // If the last indent type was 'special', decrease the special indent for this round
                reset(\$indent_types);
                if (current(\$indent_types)==='special') {
                    \$indent_level--;
                    array_shift(\$indent_types);
                }
        
                // Add a newline after the top level reserved word
                \$newline = true;
                // Add a newline before the top level reserved word (if not already added)
                if (!\$added_newline) {
                    \$return .= \"\n\" . str_repeat(\$tab, \$indent_level);
                }
                // If we already added a newline, redo the indentation since it may be different now
                else {
                    \$return = rtrim(\$return,\$tab).str_repeat(\$tab, \$indent_level);
                }
        
                // If the token may have extra whitespace
                if (strpos(\$token[self::TOKEN_VALUE],' ')!==false || strpos(\$token[self::TOKEN_VALUE],\"\n\")!==false || strpos(\$token[self::TOKEN_VALUE],\"\t\")!==false) {
                    \$highlighted = preg_replace('/\s+/',' ',\$highlighted);
                }
                //if SQL 'LIMIT' clause, start variable to reset newline
                if (\$token[self::TOKEN_VALUE] === 'LIMIT' && !\$inline_parentheses) {
                    \$clause_limit = true;
                }
            }
        
            // Checks if we are out of the limit clause
            elseif (\$clause_limit && \$token[self::TOKEN_VALUE] !== \",\" && \$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_NUMBER && \$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_WHITESPACE) {
                \$clause_limit = false;
            }
        
            // Commas start a new line (unless within inline parentheses or SQL 'LIMIT' clause)
            elseif (\$token[self::TOKEN_VALUE] === ',' && !\$inline_parentheses) {
                //If the previous TOKEN_VALUE is 'LIMIT', resets new line
                if (\$clause_limit === true) {
                    \$newline = false;
                    \$clause_limit = false;
                }
                // All other cases of commas
                else {
                    \$newline = true;
                }
            }
        
            // Newline reserved words start a new line
            elseif (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_RESERVED_NEWLINE) {
                // Add a newline before the reserved word (if not already added)
                if (!\$added_newline) {
                    \$return .= \"\n\" . str_repeat(\$tab, \$indent_level);
                }
        
                // If the token may have extra whitespace
                if (strpos(\$token[self::TOKEN_VALUE],' ')!==false || strpos(\$token[self::TOKEN_VALUE],\"\n\")!==false || strpos(\$token[self::TOKEN_VALUE],\"\t\")!==false) {
                    \$highlighted = preg_replace('/\s+/',' ',\$highlighted);
                }
            }
        
            // Multiple boundary characters in a row should not have spaces between them (not including parentheses)
            elseif (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_BOUNDARY) {
                if (isset(\$tokens[\$i-1]) && \$tokens[\$i-1][self::TOKEN_TYPE] === self::TOKEN_TYPE_BOUNDARY) {
                    if (isset(\$original_tokens[\$token['i']-1]) && \$original_tokens[\$token['i']-1][self::TOKEN_TYPE] !== self::TOKEN_TYPE_WHITESPACE) {
                        \$return = rtrim(\$return,' ');
                    }
                }
            }
        
            // If the token shouldn't have a space before it
            if (\$token[self::TOKEN_VALUE] === '.' || \$token[self::TOKEN_VALUE] === ',' || \$token[self::TOKEN_VALUE] === ';') {
                \$return = rtrim(\$return, ' ');
            }
        
            \$return .= \$highlighted.' ';
        
            // If the token shouldn't have a space after it
            if (\$token[self::TOKEN_VALUE] === '(' || \$token[self::TOKEN_VALUE] === '.') {
                \$return = rtrim(\$return,' ');
            }
        
            // If this is the \"-\" of a negative number, it shouldn't have a space after it
            if(\$token[self::TOKEN_VALUE] === '-' && isset(\$tokens[\$i+1]) && \$tokens[\$i+1][self::TOKEN_TYPE] === self::TOKEN_TYPE_NUMBER && isset(\$tokens[\$i-1])) {
                \$prev = \$tokens[\$i-1][self::TOKEN_TYPE];
                if(\$prev !== self::TOKEN_TYPE_QUOTE && \$prev !== self::TOKEN_TYPE_BACKTICK_QUOTE && \$prev !== self::TOKEN_TYPE_WORD && \$prev !== self::TOKEN_TYPE_NUMBER) {
                    \$return = rtrim(\$return,' ');
                }
            }
        }
        
        // If there are unmatched parentheses
        if (\$highlight && array_search('block',\$indent_types) !== false) {
            \$return .= \"\n\".self::highlightError(\"WARNING: unclosed parentheses or section\");
        }
        
        // Replace tab characters with the configuration tab character
        \$return = trim(str_replace(\"\t\",self::\$tab,\$return));
        
        if (\$highlight) {
            \$return = self::output(\$return);
        }
        
        return \$return;
    }
        
    /**
     * Add syntax highlighting to a SQL string
     *
     * @param String \$string The SQL string
     *
     * @return String The SQL string with HTML styles applied
     */
    public static function highlight(\$string)
    {
        \$tokens = self::tokenize(\$string);
        
        \$return = '';
        
        foreach (\$tokens as \$token) {
            \$return .= self::highlightToken(\$token);
        }
        
        return self::output(\$return);
    }
        
    /**
     * Split a SQL string into multiple queries.
     * Uses \";\" as a query delimiter.
     *
     * @param String \$string The SQL string
     *
     * @return Array An array of individual query strings without trailing semicolons
     */
    public static function splitQuery(\$string)
    {
        \$queries = array();
        \$current_query = '';
        \$empty = true;
        
        \$tokens = self::tokenize(\$string);
        
        foreach (\$tokens as \$token) {
            // If this is a query separator
            if (\$token[self::TOKEN_VALUE] === ';') {
                if (!\$empty) {
                    \$queries[] = \$current_query.';';
                }
                \$current_query = '';
                \$empty = true;
                continue;
            }
        
            // If this is a non-empty character
            if (\$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_WHITESPACE && \$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_COMMENT && \$token[self::TOKEN_TYPE] !== self::TOKEN_TYPE_BLOCK_COMMENT) {
                \$empty = false;
            }
        
            \$current_query .= \$token[self::TOKEN_VALUE];
        }
        
        if (!\$empty) {
            \$queries[] = trim(\$current_query);
        }
        
        return \$queries;
    }
        
    /**
     * Remove all comments from a SQL string
     *
     * @param String \$string The SQL string
     *
     * @return String The SQL string without comments
     */
    public static function removeComments(\$string)
    {
        \$result = '';
        
        \$tokens = self::tokenize(\$string);
        
        foreach (\$tokens as \$token) {
            // Skip comment tokens
            if (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_COMMENT || \$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_BLOCK_COMMENT) {
                continue;
            }
        
            \$result .= \$token[self::TOKEN_VALUE];
        }
        \$result = self::format( \$result,false);
        
        return \$result;
    }
        
    /**
     * Compress a query by collapsing white space and removing comments
     *
     * @param String \$string The SQL string
     *
     * @return String The SQL string without comments
     */
    public static function compress(\$string)
    {
        \$result = '';
        
        \$tokens = self::tokenize(\$string);
        
        \$whitespace = true;
        foreach (\$tokens as \$token) {
            // Skip comment tokens
            if (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_COMMENT || \$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_BLOCK_COMMENT) {
                continue;
            }
            // Remove extra whitespace in reserved words (e.g \"OUTER     JOIN\" becomes \"OUTER JOIN\")
            elseif (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_RESERVED || \$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_RESERVED_NEWLINE || \$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_RESERVED_TOPLEVEL) {
                \$token[self::TOKEN_VALUE] = preg_replace('/\s+/',' ',\$token[self::TOKEN_VALUE]);
            }
        
            if (\$token[self::TOKEN_TYPE] === self::TOKEN_TYPE_WHITESPACE) {
                // If the last token was whitespace, don't add another one
                if (\$whitespace) {
                    continue;
                } else {
                    \$whitespace = true;
                    // Convert all whitespace to a single space
                    \$token[self::TOKEN_VALUE] = ' ';
                }
            } else {
                \$whitespace = false;
            }
        
            \$result .= \$token[self::TOKEN_VALUE];
        }
        
        return rtrim(\$result);
    }
        
    /**
     * Highlights a token depending on its type.
     *
     * @param Array \$token An associative array containing type and value.
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightToken(\$token)
    {
        \$type = \$token[self::TOKEN_TYPE];
        
        if (self::is_cli()) {
            \$token = \$token[self::TOKEN_VALUE];
        } else {
            if (defined('ENT_IGNORE')) {
              \$token = htmlentities(\$token[self::TOKEN_VALUE],ENT_COMPAT | ENT_IGNORE ,'UTF-8');
            } else {
              \$token = htmlentities(\$token[self::TOKEN_VALUE],ENT_COMPAT,'UTF-8');
            }
        }
        
        if (\$type===self::TOKEN_TYPE_BOUNDARY) {
            return self::highlightBoundary(\$token);
        } elseif (\$type===self::TOKEN_TYPE_WORD) {
            return self::highlightWord(\$token);
        } elseif (\$type===self::TOKEN_TYPE_BACKTICK_QUOTE) {
            return self::highlightBacktickQuote(\$token);
        } elseif (\$type===self::TOKEN_TYPE_QUOTE) {
            return self::highlightQuote(\$token);
        } elseif (\$type===self::TOKEN_TYPE_RESERVED) {
            return self::highlightReservedWord(\$token);
        } elseif (\$type===self::TOKEN_TYPE_RESERVED_TOPLEVEL) {
            return self::highlightReservedWord(\$token);
        } elseif (\$type===self::TOKEN_TYPE_RESERVED_NEWLINE) {
            return self::highlightReservedWord(\$token);
        } elseif (\$type===self::TOKEN_TYPE_NUMBER) {
            return self::highlightNumber(\$token);
        } elseif (\$type===self::TOKEN_TYPE_VARIABLE) {
            return self::highlightVariable(\$token);
        } elseif (\$type===self::TOKEN_TYPE_COMMENT || \$type===self::TOKEN_TYPE_BLOCK_COMMENT) {
            return self::highlightComment(\$token);
        }
        
        return \$token;
    }
        
    /**
     * Highlights a quoted string
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightQuote(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_quote . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$quote_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a backtick quoted string
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightBacktickQuote(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_backtick_quote . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$backtick_quote_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a reserved word
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightReservedWord(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_reserved . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$reserved_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a boundary token
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightBoundary(\$value)
    {
        if (\$value==='(' || \$value===')') return \$value;
        
        if (self::is_cli()) {
            return self::\$cli_boundary . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$boundary_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a number
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightNumber(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_number . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$number_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights an error
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightError(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_error . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$error_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a comment
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightComment(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_comment . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$comment_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a word token
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightWord(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_word . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$word_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Highlights a variable token
     *
     * @param String \$value The token's value
     *
     * @return String HTML code of the highlighted token.
     */
    protected static function highlightVariable(\$value)
    {
        if (self::is_cli()) {
            return self::\$cli_variable . \$value . \"\x1b[0m\";
        } else {
            return '<span ' . self::\$variable_attributes . '>' . \$value . '</span>';
        }
    }
        
    /**
     * Helper function for building regular expressions for reserved words and boundary characters
     *
     * @param String \$a The string to be quoted
     *
     * @return String The quoted string
     */
    private static function quote_regex(\$a)
    {
        return preg_quote(\$a,'/');
    }
        
    /**
     * Helper function for building string output
     *
     * @param String \$string The string to be quoted
     *
     * @return String The quoted string
     */
    private static function output(\$string)
    {
        if (self::is_cli()) {
            return \$string.\"\n\";
        } else {
            \$string=trim(\$string);
            if (!self::\$use_pre) {
                return \$string;
            }
        
            return '<pre '.self::\$pre_attributes.'>' . \$string . '</pre>';
        }
    }
        
    private static function is_cli()
    {
        if (isset(self::\$cli)) return self::\$cli;
        else return php_sapi_name() === 'cli';
    }
        
}
";
    
    gravar(LIBS."SqlFormatter.php", $str);
}

function getBase() {
    $str= "<?php

use engine\Hosts;

define('METHOD', \$_SERVER['REQUEST_METHOD']);
define('URI', \$_SERVER['REQUEST_URI']);
define('TIME_FLOAT', \$_SERVER['REQUEST_TIME_FLOAT']);

define('BARRA', DIRECTORY_SEPARATOR);



/*
 * Allow from any origin.
 */
if (isset(\$_SERVER[\"HTTP_ORIGIN\"])) {
    header(\"Access-Control-Allow-Origin: \" . \$_SERVER[\"HTTP_ORIGIN\"]);
    header(\"Access-Control-Allow-Credentials: true\");
    header(\"Access-Control-Max-Age: 86400\"); // cache for 1 day    
}

/*
 * Access-Control headers are received during OPTIONS requests.
 */
if (\$_SERVER[\"REQUEST_METHOD\"] == \"OPTIONS\") {
	
    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_METHOD\"]))
        header(\"Access-Control-Allow-Methods: GET, POST, OPTIONS\");

    if (isset(\$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]))
        header(\"Access-Control-Allow-Headers: \" . \$_SERVER[\"HTTP_ACCESS_CONTROL_REQUEST_HEADERS\"]);

    exit(0);
}


if(METHOD == \"PUT\"){
	function validPut(\$listkeys,\$listValues){
		
		\$valid = false;
		\$control = array();
		
		for (\$i = 0; \$i < sizeof(\$listkeys); \$i++) {
			
			if(\$_GET[\$listkeys[\$i]] == \$listValues[\$listkeys[\$i]]){
				\$valid = true;
			}
			
		}
		
		return \$valid;
	}
	
	function getParametersPUT(){
		parse_str(file_get_contents(\"php://input\"),\$post_vars);
		return \$post_vars;
	}
}

?>
";
    gravar(INTERACTOR."base.php", $str);
}

function getHtAccess() {
	$str = "Options -Indexes

RewriteEngine On
RewriteBase /".PROJECT."/

RewriteRule ^api/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=api [NC,L,QSA]

RewriteRule ^web/(\w+)/(\w+)/?$ engine/Router.php?class=$1&method=$2&param=web [NC,L]

RewriteRule ^barramento/?$ barramento.php [NC,L]
";
	gravar(".htaccess", $str);
}

function getRouter() {
	$str="<?php
	use engine\Hosts;

	include_once 'interactor/base.php';
	include_once '../Autoload.php';
	
	if(\$_GET[\"param\"] == 'api'){
		
		\$Hosts = new Hosts();
		
		if(!\$Hosts->getShowDebug()){
			header(\"Content-type: application/json; charset=UTF-8\");
		}
		
		if(file_exists(\"interactor/\".\$_GET[\"class\"].'.php')){
			include_once \"interactor/\".\$_GET[\"class\"].'.php';
		}
	}


//     else if(\$_GET[\"param\"] == 'web'){
// 		if(file_exists(\"web/\".\$_GET[\"class\"].'.php')){
// 			include_once \"web/\".\$_GET[\"class\"].'.php';
// 		}
// 	}
	
	//--------------------------------------------------------------------------
	
	
	\$permission = Array();
	";
	
	
	$tables = getAllTables();
	
	while ($table = $tables->fetch()) {
		$str .= "
		
		//".strtoupper($table[0])."
		\$permission = setRouter(\"".strtolower($table[0])."\",\"POST\"  ,\"findAll\",\$permission);
		\$permission = setRouter(\"".strtolower($table[0])."\",\"GET\"   ,\"get\"    ,\$permission);
		\$permission = setRouter(\"".strtolower($table[0])."\",\"DELETE\",\"delete\" ,\$permission);
		\$permission = setRouter(\"".strtolower($table[0])."\",\"PUT\"   ,\"put\"    ,\$permission);
		\$permission = setRouter(\"".strtolower($table[0])."\",\"POST\"  ,\"insert\" ,\$permission);
		";
	}
    
	$str .="
	
	run(\$permission);
	
	
	//--------------------------------------------------------------------------
	
	function setRouter(\$url,\$type,\$method,\$permission) {	

		\$len = count(\$permission);
		
		\$permission[\$len][0] = \$type;
		\$permission[\$len][1] = \$method;
		\$permission[\$len][2] = \$url;		

		return \$permission;
	}
	
	function run(\$permission){
			
		ob_start();
		
		\$acess  = false;
		
		for (\$i = 0; \$i < count(\$permission); \$i++) {
			
			if(METHOD == (\$permission[\$i][0])){ 
		      if(\$_GET[\"method\"] == \$permission[\$i][1]){
				if(\$_GET[\"class\"] == \$permission[\$i][2]){				
				
					echo call_user_func(\$permission[\$i][1]);
					\$acess = true;

				}
			  }
			}
		}
		if(\$acess){
			return \$this_string = ob_get_contents();
		}else{
			echo \"ACESSO NEGADO!\";
			return \$this_string = ob_get_contents();
		}
		ob_end_clean();
	}
?>

	
";
	gravar(FOLDER."/Router.php", $str);
}

function getResponse() {
	$str = "<?php
namespace engine\utils;

class ResponseDelete implements \JsonSerializable
{

    private \$status;
    private \$size;

    
    public function jsonSerialize()
    {
        return ['status' => \$this->getStatus(),
            'size' => \$this->getSize()        		
        ];
    }

    // STATUS
    function getStatus()
    {
        return \$this->status;
    }

    function setStatus(\$status)
    {
    	return \$this->status= \$status;
    }

    // SIZE
    function getSize()
    {
        return \$this->size;
    }

    function setSize(\$size)
    {
    	return \$this->size= \$size;
    }

}
?>
";
	gravar(UTILS."ResponseDelete.php", $str);
	
}


function getChromePhp() {
	$str = "<?php
class ChromePhp
{
    /**
     * @var string
     */
    const VERSION = '4.1.0';

    /**
     * @var string
     */
    const HEADER_NAME = 'X-ChromeLogger-Data';

    /**
     * @var string
     */
    const BACKTRACE_LEVEL = 'backtrace_level';

    /**
     * @var string
     */
    const LOG = 'log';

    /**
     * @var string
     */
    const WARN = 'warn';

    /**
     * @var string
     */
    const ERROR = 'error';

    /**
     * @var string
     */
    const GROUP = 'group';

    /**
     * @var string
     */
    const INFO = 'info';

    /**
     * @var string
     */
    const GROUP_END = 'groupEnd';

    /**
     * @var string
     */
    const GROUP_COLLAPSED = 'groupCollapsed';

    /**
     * @var string
     */
    const TABLE = 'table';

    /**
     * @var string
     */
    protected \$_php_version;

    /**
     * @var int
     */
    protected \$_timestamp;

    /**
     * @var array
     */
    protected \$_json = array(
        'version' => self::VERSION,
        'columns' => array('log', 'backtrace', 'type'),
        'rows' => array()
    );

    /**
     * @var array
     */
    protected \$_backtraces = array();

    /**
     * @var bool
     */
    protected \$_error_triggered = false;

    /**
     * @var array
     */
    protected \$_settings = array(
        self::BACKTRACE_LEVEL => 1
    );

    /**
     * @var ChromePhp
     */
    protected static \$_instance;

    /**
     * Prevent recursion when working with objects referring to each other
     *
     * @var array
     */
    protected \$_processed = array();

    /**
     * constructor
     */
    private function __construct()
    {
        \$this->_php_version = phpversion();
        \$this->_timestamp = \$this->_php_version >= 5.1 ? \$_SERVER['REQUEST_TIME'] : time();
        \$this->_json['request_uri'] = \$_SERVER['REQUEST_URI'];
    }

    /**
     * gets instance of this class
     *
     * @return ChromePhp
     */
    public static function getInstance()
    {
        if (self::\$_instance === null) {
            self::\$_instance = new self();
        }
        return self::\$_instance;
    }

    /**
     * logs a variable to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function log()
    {
        \$args = func_get_args();
        return self::_log('', \$args);
    }

    /**
     * logs a warning to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function warn()
    {
        \$args = func_get_args();
        return self::_log(self::WARN, \$args);
    }

    /**
     * logs an error to the console
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function error()
    {
        \$args = func_get_args();
        return self::_log(self::ERROR, \$args);
    }

    /**
     * sends a group log
     *
     * @param string value
     */
    public static function group()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP, \$args);
    }

    /**
     * sends an info log
     *
     * @param mixed \$data,... unlimited OPTIONAL number of additional logs [...]
     * @return void
     */
    public static function info()
    {
        \$args = func_get_args();
        return self::_log(self::INFO, \$args);
    }

    /**
     * sends a collapsed group log
     *
     * @param string value
     */
    public static function groupCollapsed()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_COLLAPSED, \$args);
    }

    /**
     * ends a group log
     *
     * @param string value
     */
    public static function groupEnd()
    {
        \$args = func_get_args();
        return self::_log(self::GROUP_END, \$args);
    }

    /**
     * sends a table log
     *
     * @param string value
     */
    public static function table()
    {
        \$args = func_get_args();
        return self::_log(self::TABLE, \$args);
    }

    /**
     * internal logging call
     *
     * @param string \$type
     * @return void
     */
    protected static function _log(\$type, array \$args)
    {
        // nothing passed in, don't do anything
        if (count(\$args) == 0 && \$type != self::GROUP_END) {
            return;
        }

        \$logger = self::getInstance();

        \$logger->_processed = array();

        \$logs = array();
        foreach (\$args as \$arg) {
            \$logs[] = \$logger->_convert(\$arg);
        }

        \$backtrace = debug_backtrace(false);
        \$level = \$logger->getSetting(self::BACKTRACE_LEVEL);

        \$backtrace_message = 'unknown';
        if (isset(\$backtrace[\$level]['file']) && isset(\$backtrace[\$level]['line'])) {
            \$backtrace_message = \$backtrace[\$level]['file'] . ' : ' . \$backtrace[\$level]['line'];
        }

        \$logger->_addRow(\$logs, \$backtrace_message, \$type);
    }

    /**
     * converts an object to a better format for logging
     *
     * @param Object
     * @return array
     */
    protected function _convert(\$object)
    {
        // if this isn't an object then just return it
        if (!is_object(\$object)) {
            return \$object;
        }

        //Mark this object as processed so we don't convert it twice and it
        //Also avoid recursion when objects refer to each other
        \$this->_processed[] = \$object;

        \$object_as_array = array();

        // first add the class name
        \$object_as_array['___class_name'] = get_class(\$object);

        // loop through object vars
        \$object_vars = get_object_vars(\$object);
        foreach (\$object_vars as \$key => \$value) {

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }
            \$object_as_array[\$key] = \$this->_convert(\$value);
        }

        \$reflection = new ReflectionClass(\$object);

        // loop through the properties and add those
        foreach (\$reflection->getProperties() as \$property) {

            // if one of these properties was already added above then ignore it
            if (array_key_exists(\$property->getName(), \$object_vars)) {
                continue;
            }
            \$type = \$this->_getPropertyKey(\$property);

            if (\$this->_php_version >= 5.3) {
                \$property->setAccessible(true);
            }

            try {
                \$value = \$property->getValue(\$object);
            } catch (ReflectionException \$e) {
                \$value = 'only PHP 5.3 can access private/protected properties';
            }

            // same instance as parent object
            if (\$value === \$object || in_array(\$value, \$this->_processed, true)) {
                \$value = 'recursion - parent object [' . get_class(\$value) . ']';
            }

            \$object_as_array[\$type] = \$this->_convert(\$value);
        }
        return \$object_as_array;
    }

    /**
     * takes a reflection property and returns a nicely formatted key of the property name
     *
     * @param ReflectionProperty
     * @return string
     */
    protected function _getPropertyKey(ReflectionProperty \$property)
    {
        \$static = \$property->isStatic() ? ' static' : '';
        if (\$property->isPublic()) {
            return 'public' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isProtected()) {
            return 'protected' . \$static . ' ' . \$property->getName();
        }

        if (\$property->isPrivate()) {
            return 'private' . \$static . ' ' . \$property->getName();
        }
    }

    /**
     * adds a value to the data array
     *
     * @var mixed
     * @return void
     */
    protected function _addRow(array \$logs, \$backtrace, \$type)
    {
        // if this is logged on the same line for example in a loop, set it to null to save space
        if (in_array(\$backtrace, \$this->_backtraces)) {
            \$backtrace = null;
        }

        // for group, groupEnd, and groupCollapsed
        // take out the backtrace since it is not useful
        if (\$type == self::GROUP || \$type == self::GROUP_END || \$type == self::GROUP_COLLAPSED) {
            \$backtrace = null;
        }

        if (\$backtrace !== null) {
            \$this->_backtraces[] = \$backtrace;
        }

        \$row = array(\$logs, \$backtrace, \$type);

        \$this->_json['rows'][] = \$row;
        \$this->_writeHeader(\$this->_json);
    }

    protected function _writeHeader(\$data)
    {
        header(self::HEADER_NAME . ': ' . \$this->_encode(\$data));
    }

    /**
     * encodes the data to be sent along with the request
     *
     * @param array \$data
     * @return string
     */
    protected function _encode(\$data)
    {
        return base64_encode(utf8_encode(json_encode(\$data)));
    }

    /**
     * adds a setting
     *
     * @param string key
     * @param mixed value
     * @return void
     */
    public function addSetting(\$key, \$value)
    {
        \$this->_settings[\$key] = \$value;
    }

    /**
     * add ability to set multiple settings in one call
     *
     * @param array \$settings
     * @return void
     */
    public function addSettings(array \$settings)
    {
        foreach (\$settings as \$key => \$value) {
            \$this->addSetting(\$key, \$value);
        }
    }

    /**
     * gets a setting
     *
     * @param string key
     * @return mixed
     */
    public function getSetting(\$key)
    {
        if (!isset(\$this->_settings[\$key])) {
            return null;
        }
        return \$this->_settings[\$key];
    }
}
?>
";
	
	gravar(LIBS."ChromePhp.php", $str);
	
}


function getFilterWhere() {
	$str ="<?php
namespace engine\utils;

class FilterWhere{
	private \$collum    = \"\";
	private \$condition = \"=\";
	private \$value     = \"\";
	
	function getCollum()
	{
		return \$this->collum;		
	}
	
	function getCondition()
	{
		return \$this->condition;		
	}
	
	function getValue()
	{
		return \$this->value;		
	}
		
	function setCollum(\$collum)
	{
		\$this->collum = \$collum;
	}
	
	function setCondition(\$condition)
	{
		\$this->condition = \$condition;
	}
	
	function setValue(\$value)
	{		
		\$this->value = \$value;
	}
	
}

?>";
	gravar(UTILS."FilterWhere.php", $str);
}

//-----------------------RESOURCES-------------------------------------
//-----------------------SQL_STRUCT--------------------------------------

function getConection() {
    
	if(MAPPING_DATABASE == "TESTE"){
    	$pdo_ = new PDO ( 'mysql:dbname=' . BANCO_T . ';host=' . IP_T, USUARIO_T, SENHA_T);
    }else{
    	$pdo_ = new PDO ( 'mysql:dbname=' . BANCO . ';host=' . IP, USUARIO, SENHA );
    }
    
    $pdo_->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    return $pdo_;
}

function getAllTables() {
    
    $pdo_ = getConection();
    $query = ' SHOW TABLES ';
    $sth = $pdo_->prepare($query);
    $sth->execute();
    
    return $sth;
}

function showColum($table) {
    
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM ' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table;
    $sth = $pdo_->prepare( $query );
    $sth->execute ();
    
    return $sth;
}

function getFk($table) {
    $pdo_ = getConection();
    $query = 'select
				table_name as \'tabela\',
    			column_name as \'coluna\',
				referenced_table_name as \'tabela_referencia\' ,
    			referenced_column_name as \'coluna_referencia\'
			  from
    			information_schema.key_column_usage
			  where	TABLE_NAME = \'' . $table . '\'
			  AND 	referenced_table_name is not null';
        
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;
}

function getFkTable($table,$fk) {
    $pdo_ = getConection();
    $query = '
    SELECT
        table_name AS tabela,
        column_name AS coluna,
        referenced_table_name AS tabela_referencia,
        referenced_column_name AS coluna_referencia
    FROM
        information_schema.key_column_usage
    WHERE
        TABLE_NAME = \''.$table.'\'
    AND referenced_table_name IS NOT NULL
    AND column_name = \''.$fk.'\'';
    
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;
}

function getPrimaryKeys($table) {
    $pdo_ = getConection();
    $sql = 'SHOW KEYS FROM '. (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table.'  WHERE Key_name = \'PRIMARY\'';  
    $sth = $pdo_->prepare( $sql );
    $sth->execute();
    
    return $sth;
}

function getColum($table) {
    
    $pdo_ = getConection();
    $query = 'SHOW COLUMNS FROM ' . (MAPPING_DATABASE =="TESTE"?BANCO_T:BANCO). '.' . $table;
    $sth = $pdo_->prepare( $query );
    $sth->execute();
    
    return $sth;    
}
//-----------------------SQL_STRUCT-------------------------------------
//-----------------------UTILS--------------------------------------

function gravar($arquivo,$texto,$replace = false){
    
    if ($replace || !file_exists($arquivo)) {
        
        //Variavel $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "a+");
        
        //Escreve no arquivo aberto.
        fwrite($fp, $texto);
        
        //Fecha o arquivo.
        fclose($fp);
    }
}

function ler($arquivo){
	//Variavel $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "r");
    
    //Le o conteudo do arquivo aberto.
    $conteudo = fread($fp, filesize($arquivo));
    
    //Fecha o arquivo.
    fclose($fp);
    
    //retorna o conteudo.
    return $conteudo;
}

//-----------------------UTILS-------------------------------------?>