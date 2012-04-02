<!DOCTYPE HTML>
<html>
<head>

<style text="css">
	.sofia {color:red;
			font-size:50px;}
	.varna {color:blue;
			font-size:50px;}


</style>

</head>
<body>
	
	<form action="" method="post">
		<div>Choose your pizza</div>
		<div>type:	<input type="radio" name="mypizza" value="cheese" >cheese</input>
					<input type="radio" name="mypizza" value="pepperoni" >pepperoni</input><br>
		</div><br>
		<div>style:	<input type="radio" name="PizzaStyle" value="Sofia">Sofia-Style</input>
					<input type="radio" name="PizzaStyle" value="Varna">Varna-Style</input><br>
		</div><br>
		<input type="submit" name="Submit" value="Order"/><br>
	</form>

	<?php
		
		//This is the "abstract creator" class with an abstract factory method that the subclasses will implement
		abstract class PizzaStore{
		
			function orderPizza($type){
				$pizza = $this->createPizza($type);
				return $pizza;
			}
			
			protected abstract function createPizza($type);
			
		}
		
		//This is one "concrete creator" class which implements the factory method createPizza()
		class SofiaPizzaStore extends PizzaStore{
		
			function createPizza($type){
				if($type == "cheese"){
					return new SofiaCheesePizza();
				}
				if($type == "pepperoni"){
					return new SofiaPepperoniPizza();
				}
			}
		}
		
		//This is another "concrete creator" class which implements the factory method createPizza()
		class VarnaPizzaStore extends PizzaStore{
				
			function createPizza($type){
				
					if($type == "cheese"){
						return new VarnaCheesePizza();
					}
					if($type == "pepperoni"){
						return new VarnaPepperoniPizza();
					}
			}
		}
		
		//The Pizza interface
		interface Pizza{}
			
		//Some concrete pizza	
		class SofiaCheesePizza implements Pizza{
		
			function __construct(){
				echo "<div class=\"sofia\"> You ordered Sofia-style cheese pizza!!!</div>";
			}
		}
		//Some concrete pizza
		class SofiaPepperoniPizza implements Pizza{
		
			function __construct(){
				echo "<div class=\"sofia\"> You ordered Sofia-style pepperoni pizza!!!</div>";
			}
		}
		//Some concrete pizza
		class VarnaCheesePizza implements Pizza{
			
			function __construct(){
				echo "<divc class=\"varna\"> You ordered Varna-style cheese pizza!!!</div>";
			}
		}
		//Some concrete pizza
		class VarnaPepperoniPizza implements Pizza{
			
			function __construct(){
				echo "<div class=\"varna\"> You ordered Varna-style pepperoni pizza!!!</div>";
			}
		}
		
		//The function that collects the order information from the FORM and give a responce
		function responce(){
			if(isset($_POST["mypizza"]) and isset($_POST["PizzaStyle"])){
				
				$type = $_POST["mypizza"];
				$style = $_POST["PizzaStyle"];
				
				if($style == "Sofia"){
					$pizza = new SofiaPizzaStore();
				}
				if($style == "Varna"){
					$pizza = new VarnaPizzaStore();
				}
				
				if($type == "cheese"){
					$pizza->orderPizza("cheese");
				}
				if($type == "pepperoni"){
					$pizza->orderPizza("pepperoni");
				}
			}	
		}

		//If the client has chosen a pizza, then we respond to his choice
		if(isset($_POST["Submit"])) responce();
			
	?>
	
	
</body>
</html>