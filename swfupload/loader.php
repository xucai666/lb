<?php
function  __autoload($classname){
	$path = dirname(__file__).'/libs/';
    $classpath=$path.$classname.'.class.php';
	 if(file_exists($classpath)){
	  require_once($classpath);
	 }
	 else{
	  echo 'class file'.$classpath.'not found!';
	 }
}
class loader{
	private static $_instance;


 	function __construct(){
 		
 		//new instance
 		 		
 		self::$_instance = $this;
 			
 		
 	}
	 	 
	 public static function &getInstance(){
	 
		  if(!(self::$_instance instanceof self)){
		   
		   self::$_instance = new loader();
		  }
		  return self::$_instance;
		 }







	public   function load_class($name){
		if(is_array($name)){
			foreach($name as $v){
					if(isset($this->$v)){
						return $this->$v;
					}else{
						$this->$v = new $v();
					}
			}
		}else{
			if(isset($this->$name)){
				return $this->$name;
			}else{
				$this->$name = new $name();
			}
		}
		
	}
	
}

function &get_loader(){	
	return loader::getInstance();
} 
	

$loader = get_loader();

?>