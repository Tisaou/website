<?php
class Auth{
	static function Connect(){
		if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['pseudo']) && isset($_SESSION['Auth']['mdp'])){
			return true ;
		}
		else{
			return false;
		}
		
	} 
	
}
?>