<!DOCTYPE HTML>
<html>
<head>

<style text="css">
	div {	color:green;
			font-size:30px;}
	.div1 {	color:red;
			font-size:50px;}

</style>

</head>
<body>

	<div>
	<?php
		
		interface Menu{
			
			function addItem($item,$prize);
			function removeItem($item);
			function setPrize($item,$prize);
			function getPrize($item);
			function printMenu();
			
		}
		
		class CafeMenu implements Menu{
		
			private $MenuList = array();
		
			function __construct(){
			
				$this->MenuList["coffee"] = 1.20;
				$this->MenuList["tea"] = 0.60;
				$this->MenuList["cola"] = 2.00;
			
			}
		
			function addItem($item,$prize){
				$this->MenuList[$item] = $prize;
			}
			
			function removeItem($item){
				unset($this->MenuList[$item]);
			}
			
			function setPrize($item,$prize){
				$this->MenuList[$item] = $prize;
			}
			
			function getPrize($item){
				return $this->MenuList[$item];
			}
			
			function printMenu(){
				$arr1 = array_keys($this->MenuList);
				$arr2 = array_values($this->MenuList);
				
				$length = count($this->MenuList);
				
				echo "<div class=\"div1\">Menu :</div><br>";
				for($i=0; $i < $length; $i++){
					echo "The ".$arr1[$i]." is ".$arr2[$i]." lv<br>";
				}
			}
		
		}
		
		
		//This is our PROXY, which acts as a representative for the object CafeMenu
		class Proxy implements Menu{
		
			private $CafeMenu = null;
			
			function __construct(){}
			
			function createCafeMenu(){
				$this->CafeMenu = new CafeMenu();
			}
		
			function addItem($item,$prize){
				if($this->CafeMenu == null){
					$this->createCafeMenu();
				}
				$this->CafeMenu->addItem($item,$prize);
			}
			function removeItem($item){
				if($this->CafeMenu == null){
					$this->createCafeMenu();
				}
				$this->CafeMenu->removeItem($item);
			}
			function setPrize($item,$prize){
				if($this->CafeMenu == null){
					$this->createCafeMenu();
				}
				$this->CafeMenu->setPrize($item,$prize);
			}
			function getPrize($item){
				if($this->CafeMenu == null){
					$this->createCafeMenu();
				}
				return $this->CafeMenu->getPrize($item);
			}
			function printMenu(){
				if($this->CafeMenu == null){
					$this->createCafeMenu();
				}
				$this->CafeMenu->printMenu();
			}
		
		}
		
		
		//TEST DRIVE
		$test = new Proxy();
		$test->printMenu();
		echo "<br><div class=\"div1\">The new menu is:</div><br>";
		$test->removeItem("tea");
		$test->addItem("milk",1);
		$test->addItem("water",0.50);
		$test->printMenu();
	
	?>
	</div>
	
</body>
</html>