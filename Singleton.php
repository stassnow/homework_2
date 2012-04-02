<!DOCTYPE HTML>
<html>
<head>

<style text="css">
	div {	color:red;
			font-size:50px;}


</style>

</head>
<body>

	<div>
	<?php
		
		//As PHP don't have Threads, we don't have to make the class "Thread-safe"
		class Singleton{
			
			private static $uniqueInstance;	
			
			private $name = "Ivan";
			
			private function __construct(){}
			
			static function getInstance(){
				if(self::$uniqueInstance == null){
					self::$uniqueInstance = new Singleton();
				}
				return self::$uniqueInstance;
			}
			
			function getName(){
				return $this->name;
			}
			function setName($name){
				$this->name = $name;
			}
			
		}
		
		//We now test the Singleton class.  
		$s1 = Singleton::getInstance();
		echo "s1 has a name : ".$s1->getName()."<br>";
		
		$s2 = Singleton::getInstance();
		$s2->setName("Maria");
		echo "s2 has a name : ".$s2->getName()."<br>";
		
		echo "s1 has a name : ".$s1->getName()."<br>";
		//Or we could just do this check:
		if($s1 === $s2) echo "s1 and s2 \"point\" to one instance";
		//The result proves that there can be only one instance of the class, 
		//which is the purpose of the Singleton Pattern
	
	?>
	</div>
	
</body>
</html>